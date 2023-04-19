<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Package $package)
    {
        $packages = $package::all();
        return PackageResource::collection($packages);
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
    public function store(StorePackageRequest $request, Package $package)
    {
        $package::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, int $id, Package $package)
    {
        $updatePackage = $package::Find($id);
        $updatePackage->update($request->all());
        $updatePackage->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package, int $id)
    {
        $package::destroy($id);
    }
}
