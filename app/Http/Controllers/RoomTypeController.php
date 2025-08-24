<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Branch;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (session()->has('room_type_list')) {
            $room_type_list = session('room_type_list');
        } else {
            // Nếu không có, lấy toàn bộ
            $room_type_list = RoomType::all();
        }
        $branches = Branch::all();
        return view('pages.admin.room_type', ["room_type_list" => $room_type_list, "branches" => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'min:1|max:10',
            'hourly_rate' => 'required|numeric|lt:overnight_rate',
            'full_day_rate' => 'required|numeric|gt:overnight_rate',
            'overnight_rate' => 'required|numeric|gt:hourly_rate|lt:full_day_rate',
            'status' => 'required|max:50',
        ]);

        $newRoomType = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'hourly_rate' => $request->hourly_rate,
            'full_day_rate' => $request->full_day_rate,
            'overnight_rate' => $request->overnight_rate,
            'status' => $request->status,
        ];

        // Tạo và gán lại biến model
        $newRoomTypeModel = RoomType::create($newRoomType);

        // Lấy danh sách branch id hợp lệ
        $branchIds = Branch::pluck('id');

        // Lấy input từ request (nếu là mảng thì xử lý mảng, nếu 1 id thì xử lý 1 id)
        $inputBranchIds = $request->input('tags-list');
        // ép kiểu sang int tất cả phần tử
        $inputBranchIds = array_map('intval', explode(',', $inputBranchIds));
      
        if (is_array($inputBranchIds)) {
            // lọc các id hợp lệ
            $validBranchIds = collect($inputBranchIds)->filter(fn($id) => $branchIds->contains($id));
    
            if ($validBranchIds->isNotEmpty()) {
                $newRoomTypeModel->branches()->attach($validBranchIds->toArray());
            }
        } else {
            $branchId = (int)$inputBranchIds;
            if ($branchIds->contains($branchId)) {
                $newRoomTypeModel->branches()->attach($branchId);
            }
        }

        return redirect()->route('room_type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // lấy array id của các chi nhánh
        session(['filter_branches' => $request->input('filter_branches')]);
        $selectedIds = $request->input('filter_branches');
        $branches = Branch::whereIn('id', $selectedIds)->get();

        //lấy tên của các hạng phòng thuộc chi nhánh lọc thành array không trùng lặp
        $room_type_names = [];
        foreach ($branches as $branch) {
            foreach ($branch->room_types->pluck('name') as $room_type_name) {
                $room_type_names[] = $room_type_name;
            }
        }
        $room_type_names = array_unique($room_type_names);

        // lấy được collection danh sách các hạng phòng
        $room_type_list = RoomType::whereIn('name', $room_type_names)->get();

        return redirect()->route('room_type.index')->with('room_type_list', $room_type_list);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'min:1|max:10',
            'hourly_rate' => 'required|numeric|lt:overnight_rate',
            'full_day_rate' => 'required|numeric|gt:overnight_rate',
            'overnight_rate' => 'required|numeric|gt:hourly_rate|lt:full_day_rate',
            'status' => 'required|max:50',
        ]);

        $room_type = RoomType::find($id);
        $room_type->update($validated);

        // update các chi nhánh nếu có thay đổi
        // Lấy danh sách branch id hợp lệ
        $branchIds = Branch::pluck('id');

        // Lấy input từ request là string 
        $inputBranchIds = $request->input('tags-list');

        // ép kiểu sang int tất cả phần tử
        $inputBranchIds = array_map('intval', explode(',', $inputBranchIds));

        if (is_array($inputBranchIds)) {
            // ép kiểu sang int tất cả phần tử
            $inputBranchIds = collect($inputBranchIds)->map(fn($id) => (int) $id);

            // lọc các id hợp lệ
            $validBranchIds = $inputBranchIds->filter(fn($id) => $branchIds ->contains($id));

            if ($validBranchIds->isNotEmpty()) {
                $room_type->branches()->sync($validBranchIds->toArray());
            }
        } else {
            $branchId = (int)$inputBranchIds;
            if ($branchIds->contains($branchId)) {
                $room_type->branches()->sync($branchId);
            }
        }
        return redirect()->route('room_type.index');
    }

    public function update_status(string $id)
    {
        $roomType = RoomType::find($id);

        if (!$roomType) {
            return redirect()->back()->with('error', 'Không tìm thấy Room Type');
        }

        // Toggle trạng thái
        $roomType->status = $roomType->status === 'Đang kinh doanh' ? 'Ngừng kinh doanh' : 'Đang kinh doanh';
        $roomType->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $room_type = RoomType::where('id', $id)->first();
        $room_type->delete();
        return redirect()->route('room_type.index');
    }
}
