<?php

namespace App\Http\Controllers;
use App\Abono;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Ventaarticulo;
use App\Venta;
use App\Producto;
use App\Promocion;
use App\Inventario;
use Illuminate\Support\Facades\DB;
use APP\Providers\Auth;
class VentaarticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "ventaaarticulos";
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
        //consulta cantidad en inventario 
        //$productos              = Inventario::sum('cantidad')->where('id_producto',$request->id_producto)->where('id_sucursal',session('sessionsucursal'))->first();
        $inventario = Inventario::where('id_producto', $request->id_producto)->where('id_sucursal',session('sessionsucursal'))->sum('cantidad');

        //return $productos;
      //  $cantidad_disponible =  $inventario->cantidad;
        //
        if($inventario>=$request->cantidad){
            $cantidad = number_format($request->cantidad);
            if($request->id_promocion >0){
                $promocion= Promocion::findOrFail($request->id_promocion);
                if($promocion->tipo=='porcentaje'){
                    $request["precio_venta"]= ($promocion->cantidad*$request->costo_unitario)/100;
                    $request["precio_venta"]= $request->costo_unitario - $request["precio_venta"];
                }else{
                    $request["precio_venta"] = $request->costo_unitario-$promocion->cantidad; 
                }
            }else{
                if($cantidad>=$request->mayoreo_apartir){
                    $producto = Producto::where('id',$request->id_producto)->first();
                    if($producto->mayoreo==1){
                        $request["precio_venta"]=$request->precio_mayoreo;
                    }else{
                        $request["precio_venta"]=$request->costo_unitario;    
                    }
                }else{
                    $request["precio_venta"]=$request->costo_unitario;
                }
            }

            Ventaarticulo::create($request->all());
            return json_encode(array(
                "Estado"=>"Agregado correctamente".$cantidad
            ));
        }else{
            return json_encode(array(
                "Estado"=>"El producto no se pudo agregar,no cuenta con suficientes existencias..."
            ));
        }

        return json_encode(array(
                "Estado"=>"El producto no se pudo agregar,no cuenta con suficientes existencias...".$productos
            ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,  $id)
    {
        //
        /*$ventaarticulo          = Ventaarticulo::findOrFail($id);
        return $ventaarticulo;*/
        if ($request->ajax()) {
            // $data = Entradaproducto::all();
             return datatables()->of(DB::table('ventaarticulos')->select('ventaarticulos.id','ventaarticulos.id_venta','ventaarticulos.id_producto','ventaarticulos.cantidad','ventaarticulos.created_at','ventaarticulos.id_sucursal','nombre_producto')
             ->leftJoin('productos', 'ventaarticulos.id_producto', '=', 'productos.id')
             ->where('ventaarticulos.id_producto',$id)
             ->where('ventaarticulos.id_sucursal',session('sessionsucursal'))         
             ->where('ventaarticulos.status','finalizado')
             ->get())
             ->addColumn('action', function($data){
            
                 $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_venta.'" id="btn-ventakardexpro" name="btn-ventakardexpro" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Ver</i></a>';
              
               
                return $btn;                 
 
             })
             ->rawColumns(['action'])
             ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ventaarticulo  = Ventaarticulo::findOrFail($id);
        $venta          = Venta::findOrFail($ventaarticulo->id_venta);    
        if($venta->status=='finalizado'){
            $mensaje = 'La factura esta finalizada';
        }else{
            $ventaarticulo->delete();
            $mensaje = 'Eliminado correctamente';
        }
       
        return Response()->json(['mensaje'=>$mensaje]);
    }
    public function finalizar(Request $request, $id)
    {
    	$fecha_actual   = Carbon::now()->format('Y-m-d');

        $venta = Venta::find($id);
        if($venta->status!='finalizado'){
            $venta->status      = 'finalizado';
            $venta->forma_pago  = $request->forma_pago;
            $venta->paga_con    = $request->paga_con;
            $venta->save();       
            DB::table('ventaarticulos')->where('id_venta',$id)->update(['status' => 'finalizado']);

            //
            $abonos                   	= new Abono;        
            $abonos->id_venta   	 	= $id;
            $abonos->fecha 				= $fecha_actual;
            $abonos->cantidad_abonada   = $request->pendiente_pago;
            $abonos->paga_con           = $request->paga_con;
            $abonos->forma_pago         = $request->forma_pago;
            $abonos->status            	= 'finalizado';
            $abonos->parcialidad    	= 0;
            $abonos->id_usuario       	= auth()->id();
            $abonos->save();
            //
            $mensaje = 'finalizado correctamente . . .';
        }else{
            $mensaje = 'La venta ya estaba finalizada...';
        }

            return Response()->json(['mensaje'=>$mensaje]);
    }
    public function obtener(Request $request, $id)
    {
        
        $ventaarticulo          = Ventaarticulo::findOrFail($id);
        return $ventaarticulo;
        
        
    }
}
