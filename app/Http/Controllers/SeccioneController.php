<?php

namespace App\Http\Controllers;

use App\Seccione;
use Illuminate\Http\Request;

class SeccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $secciones         = Seccione::all();
        return  $secciones;
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
     * @param  \App\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function show(Seccione $seccione)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccione $seccione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccione $seccione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccione  $seccione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccione $seccione)
    {
        //
    }
}
