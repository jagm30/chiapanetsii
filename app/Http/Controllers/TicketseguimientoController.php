<?php

namespace App\Http\Controllers;

use App\Ticketseguimiento;
use Illuminate\Http\Request;

class TicketseguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketseguimientos = Ticketseguimiento::all();
        //return $usuarios;
        return $ticketseguimientos;
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
        Ticketseguimiento::create($request->all());
            return json_encode(array(
                "Estado"=>"Agregado correctamente"                
            ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticketseguimiento  $ticketseguimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Ticketseguimiento $ticketseguimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticketseguimiento  $ticketseguimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketseguimiento $ticketseguimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticketseguimiento  $ticketseguimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticketseguimiento $ticketseguimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticketseguimiento  $ticketseguimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticketseguimiento $ticketseguimiento)
    {
        //
    }
}
