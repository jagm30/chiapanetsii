<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\Cliente;
use App\Departamento;
use App\Catservicio;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets    = DB::table('tickets')
                    ->select('tickets.id','fecha','solicitante','ubicacion','tipo','descripcion','fechafin','status','name','departamentos.nombre','departamentos.seccion','prioridad')
                    ->join('users', 'tickets.solicitante', '=', 'users.id')
                    ->join('departamentos', 'tickets.ubicacion', '=', 'departamentos.id')
                    ->join('catservicios', 'tickets.tipo', '=', 'catservicios.id')
                    ->get();
        $clientes       = Cliente::all();
        $departamentos  = Departamento::all();
        $catservicios   = Catservicio::all();
        //return $usuarios;
        return view("tickets.index",compact('tickets','clientes','departamentos','catservicios'));
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
        $tickets                   = new Ticket;        
        $tickets->solicitante      = $request->solicitante;
        $tickets->fecha            = $request->fecha;
        $tickets->ubicacion        = $request->ubicacion;
        $tickets->tipo             = $request->tipo;
        $tickets->descripcion      = $request->descripcion;
        $tickets->fechafin         = $request->fechafin;
        $tickets->id_usuario       = 1;
        $tickets->status           = 'activo';
        
        $tickets->save();
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {        
        $tickets    = DB::table('tickets')
                    ->select('tickets.id','fecha','solicitante','ubicacion','tipo','descripcion','fechafin','status','name','departamentos.nombre','departamentos.seccion','prioridad','servicio')
                    ->join('users', 'tickets.solicitante', '=', 'users.id')
                    ->join('departamentos', 'tickets.ubicacion', '=', 'departamentos.id')
                    ->join('catservicios', 'tickets.tipo', '=', 'catservicios.id')
                    ->where('tickets.id',$id)
                    ->first();
        return view('tickets.show',compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
