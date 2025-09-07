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
        $roomTypeList = RoomType::all();
        if ($roomTypeList->isNotEmpty()) {
            $firstItem = $roomTypeList->first();
            $columns = array_keys($firstItem->getAttributes());
            $columns = array_diff($columns, ['id']);
        }
        $branchList = Branch::all();
        return view('pages.admin.room_management', ["roomTypeList" => $roomTypeList, "columns" => $columns, "branchList" => $branchList, "activeTab" => "roomType"]);
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
        $inputBranchIds = $request->input('branch_id');
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

        $roomType = RoomType::find($id);
        $roomType->update($validated);

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
            $validBranchIds = $inputBranchIds->filter(fn($id) => $branchIds->contains($id));

            if ($validBranchIds->isNotEmpty()) {
                $roomType->branches()->sync($validBranchIds->toArray());
            }
        } else {
            $branchId = (int)$inputBranchIds;
            if ($branchIds->contains($branchId)) {
                $roomType->branches()->sync($branchId);
            }
        }
        return redirect()->route('room_type.index');
    }

    public function status(string $id)
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
        $roomType = RoomType::where('id', $id)->first();
        $roomType->delete();
        return redirect()->route('room_type.index');
    }
}
