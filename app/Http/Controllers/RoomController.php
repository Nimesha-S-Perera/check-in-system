<?php

namespace App\Http\Controllers;

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

    //To get the available rooms
    public function to_get_the_available_rooms(StoreroomRequest $request)
    {
        //to get the roomsuite
        $roomSuite = $request->input('roomSuite');

        $availableRooms = Room::where('status', 0)
            ->where('roomSuite', $roomSuite)
            ->pluck('roomNo');

        $availableRoomCollection = collect($availableRooms);

        return $availableRoomCollection;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroomRequest $request, room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room $room)
    {
        //
    }
}
