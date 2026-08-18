<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use App\Http\Resources\BusinessResource;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::with("user")->get();
        return BusinessResource::collection($businesses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessRequest $request)
    {
        $business = Business::create($request->validationData());
        $business->load("user");
        return new BusinessResource($business);
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        $business->load("user");
        return new BusinessResource($business);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusinessRequest $request, Business $business)
    {
        $business->update($request->validated());
        $business->load("user");
        return new BusinessResource($business);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return response()->json(null, 204);
    }
}
