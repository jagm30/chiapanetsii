<?php

namespace App\Http\Controllers;

use App\Hojaservicio;
use Illuminate\Http\Request;
use PDF;
class HojaservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "ok";
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
        //return "ok";
        $hojaservicio                   = new Hojaservicio;
        $hojaservicio->id_ticket        = $request->id_ticket;
        $hojaservicio->folio            = $request->folio;
        $hojaservicio->motivo           = $request->motivo;
        $hojaservicio->fecha            = $request->fecha;
        $hojaservicio->id_cliente       = $request->id_cliente;
        $hojaservicio->id_usuario       = $request->id_usuario;
        $hojaservicio->ubicacion        = $request->ubicacion;        
        $hojaservicio->tipo_servicio    = $request->tipo_servicio;
        $hojaservicio->id_equipo        = $request->id_equipo;                
        $hojaservicio->detalle          = $request->detalle;
        $hojaservicio->solucion         = $request->solucion;
        $hojaservicio->proximoservicio  = $request->proximoservicio;
        $hojaservicio->fecha_entrega    = $request->fecha_entrega;        
        $hojaservicio->status           = $request->status;
        
        
        
        $hojaservicio->save();
        return json_encode(array(
            "Estado"=>"Hoja de servicio registrada correctamente..."
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hojaservicio  $hojaservicio
     * @return \Illuminate\Http\Response
     */
    public function show(Hojaservicio $hojaservicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hojaservicio  $hojaservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Hojaservicio $hojaservicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hojaservicio  $hojaservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hojaservicio $hojaservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hojaservicio  $hojaservicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hojaservicio $hojaservicio)
    {
        //
    }
    public function reportePDF(Request $request, $id){
        $data = [
            'titulo' => 'Styde.net'
        ];

       /* $view = \View::make('tickets.hojaserviciopdf', $data);
        $pdf        = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');*/


        $pdf = PDF::setOptions([
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true
    ])->loadView('tickets.hojaserviciopdf', $data);         
        return $pdf->stream();

    }
}
