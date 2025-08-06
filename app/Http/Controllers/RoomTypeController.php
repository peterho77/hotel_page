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

        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'min:1|max:10',
            'hourly_rate' => 'required|numeric|lt:overnight_rate',
            'full_day_rate' => 'required|numeric|gt:overnight_rate',
            'overnight_rate' => 'required|numeric|gt:hourly_rate|lt:full_day_rate',
            'status' => 'required|max:50',
            'branch_id' => 'required'
        ]);

        $newRoomType = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'hourly_rate' => $request->hourly_rate,
            'full_day_rate' => $request->full_day_rate,
            'overnight_rate' => $request->overnight_rate,
            'status' => $request->status,
            'branch_id' => $request->branch_id
        ];


        RoomType::create($newRoomType);

        return redirect()->route('room_type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // lấy array id của các chi nhánh
        $selectedIds = $request->input('branches');
        $branches = Branch::whereIn('id',$selectedIds)->get();

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
