<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\Ticketseguimiento;
use App\Cliente;
use App\Departamento;
use App\Catservicio;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $fecha_actual =  Carbon::now()->format('Y-m-d');
        $tickets    = DB::table('tickets')
                    ->select('tickets.id','fecha','solicitante','ubicacion','tipo','descripcion','fechafin','status','name','departamentos.nombre','departamentos.seccion','prioridad','id_usuario','clientes.nombre as nomcliente','folio')
                    ->leftjoin('users', 'tickets.id_usuario', '=', 'users.id')
                    ->leftjoin('departamentos', 'tickets.ubicacion', '=', 'departamentos.id')
                    ->leftjoin('catservicios', 'tickets.tipo', '=', 'catservicios.id')
                    ->leftjoin('clientes', 'tickets.solicitante', '=', 'clientes.id')
                    ->get();
        $clientes       = Cliente::all();
        $departamentos  = Departamento::all();
        $catservicios   = Catservicio::all();
        //return $usuarios;
        return view("tickets.index",compact('tickets','clientes','departamentos','catservicios','fecha_actual'));
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
        $tickets->folio            = $request->folio;
        
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
        $fecha_actual =  Carbon::now()->format('Y-m-d');
        $tickets    = DB::table('tickets')
                    ->select('tickets.id','tickets.id_usuario','fecha','solicitante','ubicacion','tipo','descripcion','fechafin','status','name','departamentos.nombre','departamentos.seccion','prioridad','servicio','clientes.nombre as nomcliente','clientes.id as id_cliente','folio')
                    ->leftjoin('users', 'tickets.id_usuario', '=', 'users.id')
                    ->leftjoin('clientes', 'tickets.solicitante', '=', 'clientes.id')
                    ->leftjoin('departamentos', 'tickets.ubicacion', '=', 'departamentos.id')
                    ->leftjoin('catservicios', 'tickets.tipo', '=', 'catservicios.id')
                    ->where('tickets.id',$id)
                    ->first();
        $seguimiento= DB::table('ticketseguimientos')
                    ->select('tickets.id','tickets.id_usuario','ticketseguimientos.fecha','ticketseguimientos.descripcion','ticketseguimientos.status','name')
                    ->leftjoin('users', 'ticketseguimientos.id_usuario', '=', 'users.id')
                    ->join('tickets', 'tickets.id', '=', 'ticketseguimientos.id_ticket')
                    ->where('ticketseguimientos.id_ticket',$id)
                    ->get();
        return view('tickets.show',compact('tickets','seguimiento','fecha_actual'));
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
    public function finalizar(Request $request, $id){
       
        $ticket = Ticket::find($id);
        $ticket->status = 'finalizado';
        $ticket->save();
       //DB::table('tickets')->where('id',$id)->update(['status' => 'finalizado']);
        DB::table('ticketseguimientos')->where('id_ticket',$id)->update(['status' => 'finalizado']);
        return json_encode(array(
            "Estado"=>"Finalizado correctamente"
        ));
    }
}
