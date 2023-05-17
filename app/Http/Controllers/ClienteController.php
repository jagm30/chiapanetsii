<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Departamento;
use App\Seccione;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // return "clientes";
        $departamentos  = Departamento::all();
        $clientes       = Cliente::all();
        $secciones      = Seccione::all();
        //return $usuarios;
        return view("clientes.index",compact('clientes','departamentos','secciones'));
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
        $cliente                   = new Cliente;        
        $cliente->nombre           = $request->nombre;
        $cliente->email            = $request->email;
        $cliente->seccion          = $request->seccion;
        $cliente->salon            = $request->salon;
        $cliente->puesto           = $request->puesto;
        $cliente->fecha_nac        = $request->fecha_nac;        
        
        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $cliente    = DB::table('clientes')                                        
                    ->where('clientes.id',$id)
                    ->first();
            return json_encode($cliente);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
