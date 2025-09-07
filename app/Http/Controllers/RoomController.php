<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Branch;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roomList = Room::all();
        if ($roomList->isNotEmpty()) {
            $firstItem = $roomList->first();
            $columns = array_keys($firstItem->getAttributes());
            $columns = array_diff($columns, ['id', 'branch_id']);
        };
        $roomTypeList = RoomType::all();
        $branchList = Branch::all();
        return view('pages.admin.room_management', ["roomList" => $roomList, "columns" => $columns, "branchList" => $branchList, "roomTypeList" => $roomTypeList, "activeTab" => "room"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',
            'status' => 'required|max:50',
            'room_type_id' => 'required',
            'branch_id' => 'required'
        ]);

        $newRoom = [
            'name' => $request->name,
            'area' => $request->area,
            'status' => $request->status,
            'note' => $request->note,
            'room_type_id' => $request->room_type_id,
            'branch_id' => $request->branch_id
        ];

        Room::create($newRoom);

        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
