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
        <div class="col-md-6 col-md-offset-3">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Nuevo Libro</h2>
  </div>
<div class="panel-body">
<form role="form" method="POST" action="{{ url('libros')}}" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}

<div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label for="descripcion">Descripcion:</label>
      <input type="text" class="mat-input form-control" name="descripcion" >
      @if($errors->has('descripcion'))
      <span style="color:red;">{{ $errors->first('descripcion')}}</span>
      @endif

</div>



<div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label  for="cantidad">Cantidad:</label>
      <input type="text" class="form-control" name="cantidad" >
      @if($errors->has('cantidad'))
      <span style="color:red;">{{ $errors->first('cantidad')}}</span>
      @endif
</div>

<div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label  for="existencia" >Existencia:</label>
      <input type="text" class="form-control" name="existencia"  >
      @if($errors->has('existencia'))
      <span style="color:red;">{{ $errors->first('existencia')}}</span>
      @endif
</div>

<div class="form-group pmd-textfield">
    <label for="foto" class="col-md-4 control-label">Foto:</label>
    <div class="col-md-6">
     <input type="file" name="fotoImg" class="form-control" required>
     </div>
     @if($errors->has('fotoImg'))
     <span style="color:red;">{{ $errors->first('fotoImg')}}</span>
     @endif
</div>


 <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="btn-group">
          <button type="submit" class="btn  btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span>  Crear</button>
          <a href="{{ url('libros/')}}" class="btn btn-success"><span class="glyphicon glyphicon-menu-left"></span> Volver</a>
        </div>
    </div>
 </div>


</form>
</div>
</div>
</div>
</div>
</div>
@endsection
