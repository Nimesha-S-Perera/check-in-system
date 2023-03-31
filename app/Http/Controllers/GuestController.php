<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestResource;
use App\Models\guest;
use App\Http\Requests\StoreguestRequest;
use App\Http\Requests\UpdateguestRequest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = guest::all();
        return GuestResource::collection($guests);
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
    public function store(StoreguestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateguestRequest $request, int $id)
    {
        $update_guest = guest::Find($id);
        $update_guest->update($request->all());
        $update_guest->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guest $guest)
    {
        //
    }
}
