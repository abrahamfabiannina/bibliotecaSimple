@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Libros</h2>
			 <a href="{{ url('libros/')}}" class="btn btn-success"><span class="glyphicon glyphicon-menu-left"></span> Volver</a>
  </div>


<div class="panel-body">
<div class="row">
	<div class="col-xs-12 col-md-4">

	<img src="{{ '/fotosLibro/'.$res->foto}}" class="img img-thumbnail">

	</div>
	<div class="col-xs-12 col-md-6">
        <table class="table table-">
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
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
