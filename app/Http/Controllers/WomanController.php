<?php

namespace App\Http\Controllers;

use App\Models\Woman;
use App\Http\Requests\StoreWomanRequest;
use App\Http\Requests\UpdateWomanRequest;

class WomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWomanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWomanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function show(Woman $woman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function edit(Woman $woman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWomanRequest  $request
     * @param  \App\Models\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWomanRequest $request, Woman $woman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Woman  $woman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Woman $woman)
    {
        //
    }
}
