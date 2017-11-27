@extends('layouts.app')

@section('content')


@if(session()->has('msj'))
<div class="alert alert-success" roler="alert">{{ session('msj') }}</div>
@endif
@if(session()->has('errormsj'))
<div class="alert alert-danger" roler="alert">Error al guardar los datos</div>
@endif



<div class="panel-heading">Descargar Material</div>
<div class="panel-body">
<div class="row">
	<div class="col-xs-12 col-md-4">
		
	<img src="{{ '/fotosLibro/'.$res->foto}}" class="img img-thumbnail">
	

	</div>
	<div class="table-responsive col-xs-12 col-md-8">
        <table class="table table-borderless">
            <tbody>	
                <tr>
                	<th> Titulo </th><td> {{ $res->descripcion}} </td>
                </tr>
                <tr>
                	<th> Autor </th><td> {{ $res->cantidad}}</td></tr>
                <tr>
                	<th> Descripcion </th><td>  {{ $res->existencia}}</td>
            	</tr>
            </tbody>
        </table>
    </div>
        <div class="col-xs-12 col-md-8">
            <form role="form" method="POST" action="{{ url('prestamos'/$res->id)}}" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <input name="text" type="" name="idLibro"  value="1">
                       <div class="form-group">
                             <label for="idUsuario" class="col-md-4 control-label">Nro de Documento:</label>    
                             <div class="col-md-6">
                               <input type="text" class="form-control" name="idUsuario"  placeholder="Nro Documento">    
                               @if($errors->has('idUsuario'))
                               <span style="color:red;">{{ $errors->first('idUsuario')}}</span>
                               @endif
                        </div>
                        </div>   

                        <div class="form-group">
                            <div>
                                <div class="col-md-6 col-md-offset-6">
                                <div class="btn-group">
                                  <button type="submit" class="btn  btn-primary ">Realizar Prestamo</button>  
                                  <a href="" class="btn btn-success ">Volver</a>
                                </div>
                            </div>
                         </div>
                        </div>
            </form>
           
        </div>
</div>
</div>


@endsection