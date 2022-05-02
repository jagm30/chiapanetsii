@extends("layout.plantilla")
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section("contenidoprincipal")
<div class="row">
<div class="box col-md-12">        
    <div class="row">
        <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Clientes</h2>                                
    </div>
    <div class="box-content row">
            <form method="POST" action="/tickets">
                @csrf
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Solicitante</label> 
                    <select id="solicitante" name="solicitante" class="form-control">
                        @foreach($clientes as $cliente)
                            <option value="">Seleccione una opcion</option>
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-warning col-md-2">
                    <label class="control-label" for="inputWarning1">Fecha</label>
                    <input id="fecha" name="fecha" type="date" class="form-control" >
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Ubicacion</label>
                    <select id="ubicacion" name="ubicacion" class="form-control">
                        <option>Seleccione</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{$departamento->id}}">{{$departamento->nombre}} - {{$departamento->seccion}}</option>
                        @endforeach                        
                    </select>
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Tipo de servicio</label>
                    <select id="tipo" name="tipo" class="form-control">
                        <option>Seleccione</option>
                        @foreach($catservicios as $catservicio)
                            <option value="{{$catservicio->id}}">{{$catservicio->servicio}}</option>
                        @endforeach 
                    </select>
                </div>                
                <div class="form-group has-success col-md-12">
                    <label class="control-label" for="inputSuccess1">Descripcion</label>
                    <input id="descripcion" type="text" class="form-control"  name="descripcion" required >
                </div>               
                <div class="form-group has-warning col-md-3">                    
                    <button type="submit" class="form-control btn btn-success">Guardar</button>
                </div>
            </form>
            </div>
    <div class="box-content">                
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Lugar</th>
            <th>Descripcion del servicio</th>
            <th>Prioridad</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->fecha}}</td>
                    <td class="center">{{$ticket->name}}</td>
                    <td class="center">{{$ticket->nombre}} {{$ticket->seccion}}</td>
                    <td class="center">{{$ticket->descripcion}}</td>
                    <td class="center" style="background-color: @if($ticket->prioridad=='alto') red @else green @endif; color: white;">{{$ticket->prioridad}}</td>
                    <td class="center" >{{$ticket->status}}</td>
                    <td class="center" width="160">
                        <a class="btn btn-info" href="/tickets/{{$ticket->id}}">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                            Seguimiento
                        </a>
                    </td>
                </tr>
            @endforeach
        
        </tbody>
        </table>
    </div>
        </div>
        </div>
        <!--/span-->            
    </div><!--/row-->
</div>
</div>
</div>
@endsection