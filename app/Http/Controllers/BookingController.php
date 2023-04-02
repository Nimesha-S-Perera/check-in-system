<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Http\Resources\RoomWithGuestResource;
use App\Models\booking;
use App\Http\Requests\StorebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
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
                    DB::raw('IFNULL(guests.contact_number, null) as contact_number'))
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
            'contact_number' => 'required|string|20',
            'userID' => 'required|integer',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date',
            'stayType' => 'required|integer',
        ];
    }
    //To add new check in
    public function store(StorebookingRequest $request)
    {
        //Data to insert to guests table
        $name = $request->input('name');
        $nic = $request->input('nic');
        $contactNumber = $request->input('contact_number');

        //Data to insert to bookings table
        $userID = $request->input('userID');
        $checkInDate = $request->input('checkInDate');
        $checkOutDate = $request->input('checkOutDate');
        $actualCheckOutDate = null;
        //0 = FB, 1 == BB
        $stayType = $request->input('stayType');

        //To insert roomNo
        $roomID = $request->input('roomID');

        DB::transaction(function () use ($roomID, $userID, $checkOutDate, $stayType, $actualCheckOutDate, $checkInDate, $contactNumber, $nic, $name) {
            //To insert guest data and get the id
            $guest = DB::table('guests')->insertGetId([
                'name' => $name,
                'nic' => $nic,
                'contact_number' => $contactNumber
            ]);

            //To see available rooms with the correct room suite
          /*  $room = DB::table('rooms')
                //0 = available, 1 = booked
                ->where('status', '=', 0)
                ->where('roomSuite', '=', $roomSuite)
                //0 = standard, 1 = deluxe
                ->get()->first()->roomNo;
*/
            //to insert data to booking table
            DB::table('bookings')->insertGetId([
                'roomID' => $roomID,
                'guestID' => $guest,
                'userID' => $userID,
                'checkInDate' => $checkInDate,
                'checkOutDate' => $checkOutDate,
                'actualCheckOutDate' => $actualCheckOutDate,
                'stayType' => $stayType,
            ]);

            //to update the status of the room
            DB::table('rooms')
                ->where('roomNo', '=', $roomID)
                ->update(['status' => 1]);
        });
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
