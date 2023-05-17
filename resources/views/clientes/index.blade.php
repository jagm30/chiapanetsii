@extends("layout.plantilla")
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section("contenidoprincipal")
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-content row">
            <form method="POST" action="/clientes">
                @csrf
                <div class="form-group has-success col-md-5">
                    <label class="control-label" for="inputSuccess1">Nombre</label>                     
                    <input id="nombre" type="text" class="form-control" name="nombre"  required  autofocus>

                </div>
                <div class="form-group has-warning col-md-4">
                    <label class="control-label" for="inputWarning1">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-error col-md-3">
                    <label class="control-label" for="inputError1">Seccion</label>
                    <select id="seccion" name="seccion" class="form-control">
                        @foreach($secciones as $seccion)
                            <option value="{{$seccion->nombre}}">{{$seccion->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-success col-md-2">
                    <label class="control-label" for="inputSuccess1">Salon</label>                    
                    <select id="salon" name="salon" class="form-control" required>
                        @foreach($departamentos as $departamento)
                            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-error col-md-3">
                    <label class="control-label" for="inputError1">Puesto</label>
                    <input id="puesto" type="text" class="form-control" name="puesto"  required  autofocus>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Fecha de nacimiento</label>
                    <input id="fecha_nac" type="date" class="form-control"  name="fecha_nac" required >
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">-</label>
                    <button type="submit" class="form-control btn btn-success">Registrar</button>
                </div>
            </form>
            </div>
              <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i>Registros</h2>                                
                </div>
                <div class="box-content">   
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Seccion</th>
                            <th>Salon</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 11pt">
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td width="350"><img class="dashboard-avatar" alt="Usman"
                                         src="/img/clientes/{{$cliente->id}}.jpg?s=50"> {{$cliente->nombre}} {{$cliente->id}}</td>
                                    <td width="200" class="center">{{$cliente->email}}</td>
                                    <td width="150" class="center">{{$cliente->seccion}}</td>
                                    <td width="150" class="center">{{$cliente->salon}}</td>
                                    <td class="center">
                                        <a href="#" class="btn btn-info btn-editar_cliente" onclick="cargarDato({{$cliente->id}})">Editar</a>
                                        <a class="btn btn-info btn-danger" href="#">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        
                        </tbody>
                </table>  
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Edicion</h3>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/clientes">
                        @csrf
                        <input id="id_cliente" type="hidden" class="form-control" name="id_cliente">
                        <div class="form-group has-success col-md-6">
                            <label class="control-label" for="inputSuccess1">Nombre</label>                     
                            <input id="nombre-e" type="text" class="form-control" name="nombre-e"  required  autofocus>

                        </div>
                        <div class="form-group has-warning col-md-6">
                            <label class="control-label" for="inputWarning1">Email</label>
                            <input id="email-e" type="email" class="form-control @error('email') is-invalid @enderror" name="email-e" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group has-error col-md-6">
                            <label class="control-label" for="inputError1">Seccion</label>
                            <select id="seccion-e" name="seccion-e" class="form-control">
                                @foreach($secciones as $seccion)
                                    <option value="{{$seccion->nombre}}">{{$seccion->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-success col-md-6">
                            <label class="control-label" for="inputSuccess1">Salon</label>                    
                            <select id="salon-e" name="salon-e" class="form-control" required>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-error col-md-6">
                            <label class="control-label" for="inputError1">Puesto</label>
                            <input id="puesto-e" type="text" class="form-control" name="puesto-e"  required  autofocus>
                        </div>
                        <div class="form-group has-success col-md-6">
                            <label class="control-label" for="inputSuccess1">Fecha de nacimiento</label>
                            <input id="fecha_nac-e" type="date" class="form-control"  name="fecha_nac-e" required >
                        </div>
                       
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                    <a id="btn_guardarcambio" name="btn_guardarcambio" href="#" class="btn btn-primary">Guardar cambios</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scriptpersonal")
<script type="text/javascript">    
    function cargarDato(id_usuario){
        $.ajax({
             url:"/clientes/"+id_usuario,
             async: false,
             dataType:"json",
             success:function(html){                
                $("#id_cliente").val(html.id);
                $("#nombre-e").val(html.nombre);
                $("#email-e").val(html.email); 
                $("#seccion-e option[value='"+ html.seccion +"']").attr("selected",true);
                $("#salon-e option[value='"+ html.salon +"']").attr("selected",true);
                $("#puesto-e").val(html.puesto); 
                $("#fecha_nac-e").val(html.fecha_nac); 

             }
          })
    } 
    $('#btn_guardarcambio').click(function() {
        alert("guardar");
      
      /*$.ajax({
         url:"/cobros/guardarcobro/"+json,
         dataType:"json",
         contentType: "application/json",
         success:function(html){
            alert(html.data);
            actualizaTabla();
            //$("#formmodal")[0].reset();
           // $('#modal-success').modal('toggle');
         }
      })*/

    });  
</script>
@endsection("scriptpersonal")