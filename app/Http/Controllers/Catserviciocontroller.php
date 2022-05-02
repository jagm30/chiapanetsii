<?php

namespace App\Http\Controllers;

use App\Catservicio;
use Illuminate\Http\Request;

class Catserviciocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catservicios = Catservicio::all();
        return $catservicios;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catservicio  $catservicio
     * @return \Illuminate\Http\Response
     */
    public function show(Catservicio $catservicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catservicio  $catservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Catservicio $catservicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catservicio  $catservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catservicio $catservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catservicio  $catservicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catservicio $catservicio)
    {
        //
    }
}
