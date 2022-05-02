@extends("layout.plantilla")
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section("contenidoprincipal")
<div class="row">
    
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Registro de usuario</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
            <form method="POST" action="/usuarios">
                @csrf
                <div class="form-group has-success col-md-5">
                    <label class="control-label" for="inputSuccess1">Nombre</label>                     
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                    <label class="control-label" for="inputError1">Tipo de Usuario</label>
                    <select id="tipo_usuario" name="tipo_usuario" class="form-control">
                        <option>Administrador</option>
                        <option>Asesor</option>
                    </select>
                </div>
                <div class="form-group has-success col-md-4">
                    <label class="control-label" for="inputSuccess1">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-warning col-md-4">
                    <label class="control-label" for="inputWarning1">Confirma tu contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group has-warning col-md-4">
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
                    <th>Username</th>
                    <th>Date registered</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td class="center">{{$user->email}}</td>
                            <td class="center">{{$user->tipo_usuario}}</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                            <td class="center" width="120">                                
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
                <!--/span-->            
            </div><!--/row-->
        </div>
    </div>
</div>
@endsection