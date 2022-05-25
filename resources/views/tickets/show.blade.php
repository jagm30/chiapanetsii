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
                                         src="/img/clientes/{{$tickets->id_cliente}}.jpg?s=50"></a>
                            <strong>Solicitante:</strong> <a href="#">{{$tickets->nomcliente}}
                            </a><br><br><br><br>
                            <strong>Fecha:</strong>{{$tickets->fecha}}<br>
                            <strong>Seccion:</strong>{{$tickets->seccion}}<br>
                            <strong>Lugar:</strong>{{$tickets->nombre}}<br>
                            <strong>Status:</strong> <span class=" @if($tickets->status=='activo')label-success @else label-danger @endif label label-default">{{$tickets->status}}</span>
                            <br>
                            <strong>Tipo de servicio:</strong>{{$tickets->servicio}}<br>
                            <strong>Descripción:</strong>{{$tickets->descripcion}}<br>
                            <br>
                            @if($tickets->status=='activo') 
                                <a href="#" class="btn btn-primary btn-setting" >Seguimiento</a>
                                <a href="#" id="btn-finalizarticket" class="btn btn-danger" data-id="{{$tickets->id}}" >Finalizar Ticket</a> <br><br>
                                
                            @else @endif
                            @if($numseguimiento >0)
                                <a href="#" id="btn-hojaservicio" data-id="{{$tickets->id}}" class="btn btn-warning" data-id="{{$tickets->id}}" >Imprimir Hoja de Servicio</a>
                            @else
                                <a href="#" id="btn-hojaservicio" data-id="{{$tickets->id}}" class="btn btn-success btn-modalhojaservicio" data-id="{{$tickets->id}}" >Generar Hoja de Servicio</a>
                            @endif
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
                                         src="/img/users/{{$row->id_usuario}}.jpg?s=50"></a>
                                <strong>Soporte:</strong> <a href="#">{{$row->name}}
                                </a><br>
                                <strong>Fecha:</strong>{{$row->fecha}}<br>
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
                        <input id="fecha" name="fecha" type="date" class="form-control" required value="{{$fecha_actual}}" >
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

<div class="modal fade" id="myModalHojaServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
            <form id="form-hojaservicio">
            <input type="hidden" name="_token" id="csrf2" value="{{Session::token()}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 style="color: #002B7F;">Hoja de servicios</h3>
                </div>
                <div class="modal-body">

                    <div class="form-group has-warning col-md-4">
                        <label class="control-label" for="inputWarning1">Fecha</label>
                        <input id="fecha" name="fecha" type="date" class="form-control" required value="{{$fecha_actual}}" >
                    </div>
                    <div class="form-group has-warning col-md-4">
                        <label class="control-label" for="inputWarning1">Folio</label>
                        <input id="folio" name="folio" type="text" class="form-control" placeholder="Ej. folio de solicitud de servicio" required>
                    </div>
                    <div class="form-group has-warning col-md-4">
                        <label class="control-label" for="inputWarning1">Motivo</label>
                        <input id="motivo" name="motivo" type="text" class="form-control" required placeholder="Ej. Cronograma. ticket, etc">
                    </div>

                    <div class="form-group has-warning col-md-6">
                        <label class="control-label">Tipo de Servicio</label>
                        <select id="tipo_servicio" name="tipo_servicio" class="form-control select">
                            <option  value="">Seleccione</option>
                            <option>Preventivo</option>
                            <option>Correctivo</option>
                            <option>Revision</option>
                            <option>Reparación</option>
                            <option>N/A</option>
                        </select>
                    </div>
                    <div class="form-group has-warning col-md-6">
                        <label class="control-label" for="inputWarning1">Equipo</label>
                        <select id="id_equipo" name="id_equipo" class="form-control select">
                            <option value="">Seleccione</option>
                            <option value="1">PC M58 Intel core 2 duo, N/S_ mj68a7s8d7</option>
                            <option value="2">PC M58 Intel core 2 duo, N/S_ mj68a3n42jn</option>
                            <option value="3">PC M58 Intel core 2 duo, N/S_ mj68sdfds4</option>
                            <option value="4">PC M58 Intel core 2 duo, N/S_ mj68a7dfew</option>
                        </select>
                    </div>
                    <div class="form-group has-success col-md-12">
                        <label class="control-label" for="inputSuccess1">Detalles</label>
                        <input id="detalle" type="text" class="form-control"  name="detalle" required >
                    </div>               
                    <div class="form-group has-success col-md-12">
                        <label class="control-label" for="inputSuccess1">Detalles, Servicio Realizado</label>
                        <input id="solucion" type="text" class="form-control"  name="solucion" required >
                    </div>  
                    <div class="form-group has-warning col-md-6">
                        <label class="control-label" for="inputWarning1">Fecha de entrega</label>
                        <input id="fecha_entrega" name="fecha_entrega" type="date" class="form-control" required value="{{$fecha_actual}}" >
                    </div>
                    <div class="form-group has-warning col-md-6">
                        <label class="control-label" for="inputWarning1">Proximo mantenimiento</label>
                        <input id="proximoservicio" name="proximoservicio" type="date" class="form-control" required value="{{$fecha_actual}}" >
                    </div>             
                    <br><br><br><br><br><br><br><br><br>
                </div>
                <div class="modal-footer">
                    <a   class="btn btn-default" data-dismiss="modal">Cerrar</a>
                    <a href="#" data-id="{{$tickets->id}}" id="btn-guardarhojaservicio" class="btn btn-primary" >Guardar</a>
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
    //  alert(id_usuario);
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
                location.reload();                  

            }
        });    
    });
    $('#btn-finalizarticket').on('click', function() {        
      if (confirm("Realmente desea finaliza el ticket") == true) {
        var id_ticket         = $(this).attr('data-id');
        var id_usuario      = <?php echo auth()->id(); ?>;
        $.ajax({
            url: "/tickets/finalizar/"+id_ticket,
            type: "GET",
            data: {                
                id_ticket     : id_ticket
            },
            cache: false,
            success: function(dataResult){              
                alert(dataResult);   
                location.reload();                  
            }
        });  
      }         
    });
    $('#btn-guardarhojaservicio').on('click', function() {        
      if (confirm("Realmente desea generar la hoja de servicio") == true) {
        var id_ticket       = $(this).attr('data-id');
        var id_usuario      = <?php echo auth()->id(); ?>;
        var id_cliente      = <?php echo $tickets->id_cliente; ?>;
        var ubicacion       = <?php echo $tickets->ubicacion; ?>;
        var fecha           = $('#fecha').val();
        var folio           = $('#folio').val();
        var motivo          = $('#motivo').val();
        var tipo_servicio   = $('#tipo_servicio').val();
        var id_equipo       = $('#id_equipo').val();
        var detalle         = $('#detalle').val();
        var solucion        = $('#solucion').val();
        var fecha_entrega   = $('#fecha_entrega').val();
        var proximoservicio = $('#proximoservicio').val();
        if(folio== '' || motivo == '' || tipo_servicio == '' || solucion == '' || id_equipo == ''){
            $("#folio").focus();$("#motivo").focus();$("#tipo_servicio").focus();$("#solucion").focus();$("#id_equipo").focus();
            alert("complete los campos faltantes...");
        }else{
            $.ajax({
            url: "/hojaservicios",
            type: "POST",
            data: {
                _token: $("#csrf2").val(),
                type: 1,
                id_ticket     : id_ticket,
                fecha         : fecha,
                folio         : folio,
                motivo        : motivo,
                tipo_servicio : tipo_servicio,
                id_equipo     : id_equipo,
                id_cliente    : id_cliente,
                ubicacion     : ubicacion,
                detalle       : detalle,
                solucion      : solucion,
                fecha_entrega : fecha_entrega,
                proximoservicio: proximoservicio,
                status        : 'activo',                
                id_usuario    : id_usuario
            },
            cache: false,
            success: function(dataResult){              
                alert(dataResult);   
                location.reload();                  

            }
            });   
        }
      }         
    });
</script>
@endsection