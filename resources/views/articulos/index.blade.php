@extends("layout.plantilla")
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section("contenidoprincipal")
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-content row">
            <form method="POST" action="/articulos">
                @csrf
                <div class="form-group has-success col-md-6">
                    <label class="control-label" for="inputSuccess1">Descripcion</label>                     
                    <input id="descripcion" type="text" class="form-control" name="descripcion"  required  autofocus>

                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Marca</label>
                    <input id="marca" name="marca" type="text" class="form-control" required>
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Modelo</label>
                    <input id="modelo" name="modelo" type="text" class="form-control" required>
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">No. de serie</label>
                    <input id="serie" name="serie" type="text" class="form-control" required>
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Color</label>
                    <input id="color" name="color" type="text" class="form-control" required>
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Status</label>
                    <input id="status" name="status" type="text" class="form-control" required>
                </div>
                <div class="form-group has-warning col-md-3">
                    <label class="control-label" for="inputWarning1">Fecha de compra</label>
                    <input id="fecha_compra" name="fecha_compra" type="date" class="form-control" required>
                </div>
                <div class="form-group has-error col-md-3">
                    <label class="control-label" for="inputError1">Categoria</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <option value="">Seleccione</option>
                        <option>PC de escritorio</option>
                        <option>Laptop</option>
                        <option>Mac</option>
                        <option>iPad</option>
                        <option>Teclado</option>
                        <option>Mouse</option>
                        <option>Webcam</option>
                        <option>Accesorio</option>
                        <option>Impresora</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group has-error col-md-3">
                    <label class="control-label" for="inputError1">Metodologia</label>
                    <select id="metodologia" name="metodologia" class="form-control">
                        <option value="">Seleccione</option>
                        <option>AMCO</option>
                        <option>Santillana Unoi</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group has-success col-md-3">
                    <label class="control-label" for="inputSuccess1">Etiqueta</label>
                    <input id="etiqueta" type="text" class="form-control"  name="etiqueta" required >
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
                            <th>Descripcion</th>
                            <th>No. Serie</th>
                            <th>Etiqueta</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($articulos as $articulo)
                            <tr>
                                <td>{{$articulo->descripcion}}</td>
                                <td>{{$articulo->serie}}</td>
                                <td>{{$articulo->etiqueta}}</td>
                                <td>{{$articulo->status}}</td>
                                <td><a href="#">Ver</a></td>
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