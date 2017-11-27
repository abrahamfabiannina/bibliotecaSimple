@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Usuario</h2>
			 <a href="{{ url('users/')}}" class="btn btn-success"><span class="glyphicon glyphicon-menu-left"></span> Volver</a>
  </div>

<div class="panel-body">
<div class="row">
	<div class="col-xs-12 col-md-4" style="text-align: center">
			<img src="{{ '/imgFotos/'. $res->foto }}" class="img img-rounded img-thumbnail" style="max-width: 180px; max-height: 180px;">

            <a href="{{ url('users/'.$res->email.'/edit') }}">Editar Perfil</a>

            <p></p>
	</div>
	<div class="col-xs-12 col-md-8">
        <table class="table table-borderless">
            <tbody>
                <tr>
                	<th> Nombre </th><td> {{ $res->nombre }} </td>
                </tr>
                <tr>
                	<th> apellido </th><td> {{ $res->apellido }} </td></tr>
                <tr>
                	<th> email </th><td> {{ $res->email }} </td>
            	</tr>
            	<tr>
                	<th> rol </th><td> {{ $res->rol }} </td>
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
