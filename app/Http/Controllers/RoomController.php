<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StorebookingRequest;
use App\Http\Resources\RoomResource;
use App\Models\room;
use App\Http\Requests\StoreroomRequest;
use App\Http\Requests\UpdateroomRequest;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //To view all rooms
    public function index()
    {
        $rooms = room::all();
        return RoomResource::collection($rooms);
    }

    /**
     * Display the specified resource.
     */
    //To get the available rooms
    public function show(StoreroomRequest $request)
    {
        //to get the roomsuite
        $roomType = $request->input('roomType');

        $availableRooms = Room::where('status', 'Available')
            ->where('roomType', $roomType)
            ->pluck('roomNo');

        $availableRoomCollection = collect($availableRooms);

        return $availableRoomCollection;
    }

    /**
     * Update the specified resource in storage.
     */
    //To update the room status after checkout
    public function update(UpdateroomRequest $request, room $room)
    {
        //$checkOutDate = $request->input('checkOutDate');
        //$dateTime = Carbon::now()->format('Y-m-d');

        //if checkout date == today
        $Room = $room->findOrFail($request->input('roomNo'));
        $Room->status = 0;
        $Room->save();
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
    public function store(StoreroomRequest $request)
    {
        room::create($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room $room,int $id)
    {
        $room::destroy($id);
    }
}
