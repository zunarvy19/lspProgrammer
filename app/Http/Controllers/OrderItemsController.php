<?php

namespace App\Http\Controllers;

use App\Models\orderItems;
use App\Http\Requests\StoreorderItemsRequest;
use App\Http\Requests\UpdateorderItemsRequest;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreorderItemsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(orderItems $orderItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orderItems $orderItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderItemsRequest $request, orderItems $orderItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orderItems $orderItems)
    {
        //
    }
}
