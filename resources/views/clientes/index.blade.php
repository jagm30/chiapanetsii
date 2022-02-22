@extends("layout.plantilla")
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section("contenidoprincipal")
<div>
    <ul class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/usuarios">Usuarios</a>
        </li>
    </ul>
</div>


<div class="row">
    
    <div class="box col-md-12">        
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
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>Chris Jack</td>
                            <td class="center">2012/01/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
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
                <!--/span-->            
            </div><!--/row-->
        </div>
    </div>
</div>
@endsection