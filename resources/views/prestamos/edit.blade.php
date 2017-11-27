@extends('layouts.app')

@section('content')


@if(session()->has('msj'))
<div class="alert alert-success" roler="alert">{{ session('msj') }}</div>
@endif
@if(session()->has('errormsj'))
<div class="alert alert-danger" roler="alert">Error al guardar los datos</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Libros</h2>
			 <a href="{{ url('prestamos/')}}" class="btn btn-success"><span class="glyphicon glyphicon-menu-left"></span> Volver</a>
  </div>

<div class="panel-body">
<div class="row">
  <div class="col-xs-12 col-md-4">

  <img src="{{ '/fotosLibro/'.$res->foto}}" class="img img-thumbnail">


  </div>
  <div class="col-xs-12 col-md-8">
        <table class="table table-borderless">
            <tbody>
                <tr>
                  <th> Titulo </th><td> {{ $res->descripcion}} </td>
                </tr>
                <tr>
                  <th> Cantidad </th><td> {{ $res->cantidad}}</td></tr>
                <tr>
                  <th> Existencia </th><td>  {{ $res->existencia}}</td>
              </tr>
            </tbody>
        </table>
    </div>
        <div class="col-xs-12 col-md-8">
            <form role="form" method="POST" action="{{ url('prestamos') }}" enctype="multipart/form-data" class="form-horizontal">
           <input name="_method" type="hidden" value="POST">
        {{ csrf_field() }}
                        <input type="hidden"  name="fkLibro"  value="{{ $res->id}}">
                       <div class="form-group pmd-textfield pmd-textfield-floating-label">
                             <label for="idUsuario" >Nro de Documento:(CI, Diploma, Libreta)</label>
                               <input type="text" class="form-control" name="fkUsuario"  >
                               @if($errors->has('idUsuario'))
                               <span style="color:red;">{{ $errors->first('idUsuario')}}</span>
                               @endif
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="col-md-6 col-md-offset-6">
                                <div class="btn-group">
                                  <button type="submit" class="btn  btn-primary ">Realizar Prestamo</button>
                                </div>
                            </div>
                         </div>
                        </div>
            </form>

        </div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection
