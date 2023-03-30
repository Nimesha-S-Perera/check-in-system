<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\booking;
use App\Http\Requests\StorebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(){

    }
    //To view all booking details
    public function to_view_all_booking_data()
    {
        $bookings = DB::table('rooms')
            ->leftJoin('bookings', 'rooms.roomNo', '=', 'bookings.roomID')
            ->leftJoin('guests', 'bookings.guestID', '=', 'guests.id')
            ->select('bookings.id','guests.name','guests.nic','guests.contact_number', 'rooms.roomNo', 'rooms.roomSuite', 'rooms.status','bookings.checkInDate','bookings.checkOutDate')
            ->orderBy('bookings.id', 'asc')
            ->get();

        $bookingCollection = collect($bookings);
        return $bookingCollection;
    }

    //To view room details with only current guest details
    public function view_room_details_with_current_guest()
    {
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

        return BookingResource::collection($room_data_with_current_guest);
       // $room_data_with_current_guestCollection = collect($room_data_with_current_guest);
        //return $room_data_with_current_guestCollection;
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
            DB::table('bookings')->insert([
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
