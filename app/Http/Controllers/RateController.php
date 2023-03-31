<?php

namespace App\Http\Controllers;

use App\Http\Resources\RateResource;
use App\Models\rate;
use App\Http\Requests\StorerateRequest;
use App\Http\Requests\UpdaterateRequest;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = rate::all();
        return RateResource::collection($rates);
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
    public function store(StorerateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterateRequest $request, rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rate $rate)
    {
        //
    }
}
