<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaxResource;
use App\Models\Tax;
use App\Http\Requests\StoreTaxRequest;
use App\Http\Requests\UpdateTaxRequest;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxes = Tax::all();
        return TaxResource::collection($taxes);
    }

    /**
     * Display the specified resource.
     */
    //to send tax rate to front end
    public function show()
    {
        $tax = Tax::get();
        return TaxResource::collection($tax);
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
    public function store(StoreTaxRequest $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxRequest $request, int $id)
    {
        $updateTax = Tax::Find($id);
        $updateTax->update($request->all());
        $updateTax->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
