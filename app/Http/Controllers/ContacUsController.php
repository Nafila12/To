<?php

namespace App\Http\Controllers;

use App\Models\contacUs;
use App\Http\Requests\StorecontacUsRequest;
use App\Http\Requests\UpdatecontacUsRequest;

class ContacUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contac');
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
    public function store(StorecontacUsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(contacUs $contacUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contacUs $contacUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecontacUsRequest $request, contacUs $contacUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contacUs $contacUs)
    {
        //
    }
}
