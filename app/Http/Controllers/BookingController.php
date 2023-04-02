<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Http\Resources\RoomWithGuestResource;
use App\Models\booking;
use App\Http\Requests\StorebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use App\Models\guest;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request){
        $current_guest_only = $request->get('current_guest_only');

        if ($current_guest_only) {
            $room_data_with_current_guest = DB::table('rooms')
                ->leftJoin('bookings', function($join) {
                    $join->on('rooms.roomNo', '=', 'bookings.roomID')
                        ->where('rooms.status', 1)
                        ->whereRaw('bookings.id = (select max(id) from bookings where bookings.roomID = rooms.roomNo)');
                })
                ->leftJoin('guests', 'bookings.guestID', '=', 'guests.id')
                ->select('rooms.*',
                    DB::raw('IFNULL(guests.name, null) as name'),
                    DB::raw('IFNULL(guests.nic, null) as nic'),
                    DB::raw('IFNULL(guests.contactNumber, null) as contactNumber'))
                ->orderBy('rooms.roomNo', 'asc')
                ->get();

            return RoomWithGuestResource::collection($room_data_with_current_guest);
        } else {
            $bookings = Booking::with('room', 'guest')->get();
            return BookingResource::collection($bookings);
        }
    }

    //To validate check in data when adding a new check in
    public function validation(){
        return[
            'name' => 'required|string|100',
            'nic' => 'required|string|12',
            'contactNumber' => 'required|string|20',
            'userID' => 'required|integer',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date',
            'stayType' => 'required|integer',
        ];
    }
    //To add new check in
    public function store(StorebookingRequest $request, Guest $guest, Booking $booking, Room $room)
    {
        $Guest = $guest->create([
            'name' => $request->input('name'),
            'nic' => $request->input('nic'),
            'contactNumber' => $request->input('contactNumber')
        ]);

        $booking->create([
            'roomID' => $request->input('roomID'),
            'userID' => $request->input('userID'),
            'checkInDate' => $request->input('checkInDate'),
            'checkOutDate' => $request->input('checkOutDate'),
            'stayType' => $request->input('stayType'),
            'actualCheckOutDate' => null,
            'guestID' => $Guest->id
        ]);

        $Room = $room->findOrFail($request->input('roomID'));
        $Room->status = 1;
        $Room->save();

        DB::commit();
    }

    public function create()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebookingRequest $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(booking $booking)
    {
        //
    }
}
