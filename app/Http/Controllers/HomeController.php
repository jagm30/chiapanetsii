<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\Ticketseguimiento;
use App\Cliente;
use App\Departamento;
use App\Catservicio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets    = DB::table('tickets')
                    ->select('tickets.id','fecha','solicitante','ubicacion','tipo','descripcion','fechafin','status','name','departamentos.nombre','departamentos.seccion','prioridad','id_usuario','clientes.nombre as nomcliente','clientes.id as idcliente')
                    ->leftjoin('users', 'tickets.id_usuario', '=', 'users.id')
                    ->leftjoin('departamentos', 'tickets.ubicacion', '=', 'departamentos.id')
                    ->leftjoin('catservicios', 'tickets.tipo', '=', 'catservicios.id')
                    ->leftjoin('clientes', 'tickets.solicitante', '=', 'clientes.id')
                    ->where('status','activo')
                    ->get();
        $clientes       = Cliente::all();
        $cant_clientes  = Cliente::where('nombre', '!=','')->count();
        $total_tickets  = Ticket::where('status', '!=','')->count();
        $total_ticketsf = Ticket::where('status', '=','finalizado')->count();
        $total_ticketsp = Ticket::where('status', '=','activo')->count();
        $departamentos  = Departamento::all();
        $catservicios   = Catservicio::all();
        //return $usuarios;        
        return view('home',compact('tickets','clientes','departamentos','catservicios','cant_clientes','total_ticketsf','total_ticketsp','total_tickets'));
    }
}
