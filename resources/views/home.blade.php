@extends("layout.plantilla")

@section("contenidoprincipal")
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Clientes</div>
            <div>{{$cant_clientes}}</div>
            <span class="notification">{{$cant_clientes}}</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Tickets finalizados</div>
            <div>{{$total_ticketsf}}</div>
            <span class="notification green">{{$total_ticketsf}}</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div>Tickets Pendientes</div>
            <div>{{$total_ticketsp}}</div>
            <span class="notification yellow">{{$total_ticketsp}}</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
            <i class="glyphicon glyphicon-envelope red"></i>

            <div>Total de tickets</div>
            <div>{{$total_tickets}}</div>
            <span class="notification red">{{$total_tickets}}</span>
        </a>
    </div>

    <div class="col-md-12 col-sm-3 col-xs-12">   
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
                    <td class="center"><img class="dashboard-avatar" alt="Usman"
                                         src="/img/clientes/{{$ticket->idcliente}}.jpg?s=50"> {{$ticket->nomcliente}}</td>
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

@endsection