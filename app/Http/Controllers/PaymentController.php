<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreroomRequest;
use App\Http\Resources\PaymentResource;
use App\Models\payment;
use App\Http\Requests\StorepaymentRequest;
use App\Http\Requests\UpdatepaymentRequest;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = payment::all();
        return PaymentResource::collection($payments);
    }

    //To add the total and subtotal to the payment table
    public function to_insert_payment_data(StoreroomRequest $request)
    {
        //to get the roomsuite
        $roomSuite = $request->get('roomSuite');
        $availableRoom = DB::table('rooms')
            //0 = available, 1 = booked
            ->where('status', '=', 0)
            ->where('roomSuite', '=', $roomSuite)
            ->select('roomNo')
            //0 = standard, 1 = deluxe
            ->get();

        $availableRoomCollection = collect($availableRoom);
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
    public function store(StorepaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepaymentRequest $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment $payment)
    {
        //
    }
}
