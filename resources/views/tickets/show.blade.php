
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
                            <strong>Solicitante:</strong> <a href="#">{{$tickets->name}}
                            </a><br><br>
                            <strong>Fecha:</strong>{{$tickets->fecha}}<br>
                            <strong>Seccion:</strong>{{$tickets->seccion}}<br>
                            <strong>Lugar:</strong>{{$tickets->nombre}}<br>
                            <strong>Status:</strong> <span class="label-success label label-default">{{$tickets->status}}</span>
                            <br>
                            <strong>Tipo de servicio:</strong>{{$tickets->servicio}}<br>
                            <strong>Descripción:</strong>{{$tickets->descripcion}}<br>
                            <br>
                            <a href="#" class="btn btn-success btn-setting">Registrar seguimiento</a>
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
                    <ul class="dashboard-list">
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Usman"
                                     src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50"></a>
                            <strong>Soporte:</strong> <a href="#">{{$tickets->name}}
                            </a><br><br>
                            <strong>Fecha:</strong>{{$tickets->fecha}}<br>
                            <strong>Seccion:</strong>{{$tickets->seccion}}<br>
                            <strong>Lugar:</strong>{{$tickets->nombre}}<br>
                            <strong>Status:</strong> <span class="label-success label label-default">{{$tickets->status}}</span>
                            <br>
                            <strong>Tipo de servicio:</strong>{{$tickets->servicio}}<br>
                            <strong>Descripción:</strong>{{$tickets->descripcion}}<br>
                        </li>                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
</div>
@endsection