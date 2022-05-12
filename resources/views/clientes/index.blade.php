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
                        <option>PREESCOLAR</option>
                        <option>PRIMARIA</option>
                        <option>SECUNDARIA</option>
                        <option>PREPARATORIA</option>
                        <option>ADMINISTRACION</option>
                    </select>
                </div>
                <div class="form-group has-success col-md-2">
                    <label class="control-label" for="inputSuccess1">Salon</label>
                    <input id="salon" type="text" class="form-control"  name="salon" required >
                </div>
                <div class="form-group has-error col-md-3">
                    <label class="control-label" for="inputError1">Puesto</label>
                    <select id="puesto" name="puesto" class="form-control">
                        <option>DOCENTE</option>
                        <option>DIRECTOR</option>
                        <option>JEFE DE DEPTO.</option>
                        <option>AUXILIAR</option>
                        <option>ADMINISTRATIVO</option>
                        <option>GERENTE</option>
                    </select>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Fecha de nacimiento</label>
                    <input id="fecha_nac" type="date" class="form-control"  name="fecha_nac" required >
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">-</label>
                    <button type="submit" class="form-control btn btn-success">Guardar</button>
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
                        <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td><img class="dashboard-avatar" alt="Usman"
                                         src="/img/clientes/{{$cliente->id}}.jpg?s=50"> {{$cliente->nombre}} {{$cliente->id}}</td>
                                    <td class="center">{{$cliente->email}}</td>
                                    <td class="center">{{$cliente->seccion}}</td>
                                    <td class="center">{{$cliente->salon}}</td>
                                    <td class="center">
                                        <a class="btn btn-info" href="#">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" href="#">
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
@endsection