@extends("layout.plantilla")

@section("contenidoprincipal")
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Ticket - seguimiento</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="box-content">
                    <ul class="dashboard-list">
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Usman"
                                     src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50"></a>
                            <strong>Solicitante:</strong> <a href="#">{{$tickets->nomcliente}}
                            </a><br><br><br><br>
                            <strong>Fecha:</strong>{{$tickets->fecha}}<br>
                            <strong>Seccion:</strong>{{$tickets->seccion}}<br>
                            <strong>Lugar:</strong>{{$tickets->nombre}}<br>
                            <strong>Status:</strong> <span class="label-success label label-default">{{$tickets->status}}</span>
                            <br>
                            <strong>Tipo de servicio:</strong>{{$tickets->servicio}}<br>
                            <strong>Descripción:</strong>{{$tickets->descripcion}}<br>
                            <br>
                            <a href="#" class="btn btn-success btn-setting" >Registrar seguimiento</a>
                        </li>                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Seguimiento</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="box-content">
                    @foreach($seguimiento as $row)
                        <ul class="dashboard-list">
                            <li>
                                <a href="#">
                                    <img class="dashboard-avatar" alt="Usman"
                                         src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50"></a>
                                <strong>Soporte:</strong> <a href="#">{{$row->name}}
                                </a><br><br><br><br>
                                <strong>Fecha:</strong>{{$row->fecha}}<br>
                                <strong>Status:</strong> <span class="label-success label label-default">{{$row->status}}</span>
                                <br>
                                <strong>Descripción:</strong>{{$row->descripcion}}<br>
                            </li>                       
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
            <form id="form-editar">
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Registro de segimiento</h3>
                </div>
                <div class="modal-body">

                    <div class="form-group has-warning col-md-6">
                        <label class="control-label" for="inputWarning1">Fecha</label>
                        <input id="fecha" name="fecha" type="date" class="form-control" >
                    </div>
                                
                    <div class="form-group has-success col-md-12">
                        <label class="control-label" for="inputSuccess1">Descripcion</label>
                        <input id="descripcion" type="text" class="form-control"  name="descripcion" required >
                    </div>               
                    <br><br><br><br><br><br><br><br><br>
                </div>
                <div class="modal-footer">
                    <a   class="btn btn-default" data-dismiss="modal">Cerrar</a>
                    <a href="#" data-id="{{$tickets->id}}" id="btn-guardarseguimiento" class="btn btn-primary" >Guardar</a>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('scriptpersonal')
<script type="text/javascript">
    $('#btn-guardarseguimiento').on('click', function() {
        
      
      var id_ticket         = $(this).attr('data-id');
      var fecha             = $('#fecha').val();
      var descripcion       = $('#descripcion').val();
      var id_usuario      = <?php echo auth()->id(); ?>;
      alert(id_usuario);
        $.ajax({
            url: "/ticketseguimientos",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                type: 1,
                id_ticket     : id_ticket,
                fecha         : fecha,
                status        : 'activo',
                descripcion   : descripcion,
                id_usuario    : id_usuario
            },
            cache: false,
            success: function(dataResult){              
                alert(dataResult);                     
               /* $('#venta_table').DataTable().ajax.reload();           
                $('#form-editar').trigger("reset");              
                subtotal  = subtotal + (costo_unitario*cantidad);
                iva       = subtotal*0.16;
                $('#subtotal').val(subtotal);
                $('#IVA').val(subtotal*0.16);                
                $('#total').val(subtotal+iva);
                total_p = parseInt($("#total_venta").val());
                sub     = parseInt(costo_unitario*cantidad);
                total   = total_p+sub;
                $("#total_venta").val()  = total;*/
                //alert(total);
               // number_format(subtotal, 2, '.', ',') 

                //alert($('#total').val());
            }
        });    
    });
</script>
@endsection