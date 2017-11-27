@extends('layouts.app')

@section('content')
<div class="panel-heading">Descargar Material</div>
<div class="panel-body">
<div class="row">
	<div class="col-xs-12 col-md-4">
		
	<img src="{{ '/imgPortadas/'.$res->portada}}" class="img img-thumbnail">
	<p>
		<a href="{{ $res->url }}" target="_black" class="btn btn-success">Descargar</a>
	</p>

	</div>
	<div class="table-responsive col-xs-12 col-md-8">
        <table class="table table-borderless">
            <tbody>	
                <tr>
                	<th> Titulo </th><td> {{ $res->titulo}} </td>
                </tr>
                <tr>
                	<th> Autor </th><td> {{ $res->autor}}</td></tr>
                <tr>
                	<th> Descripcion </th><td>  {{ $res->descripcion}}</td>
            	</tr>
            	<tr>
                	<th> Tipo </th><td> {{ $res->tipo}} </td>
            	</tr>
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="panel-heading">Comentarios</div>
<div class="panel-body">

    @include('comentarios.index')

</div>
@endsection