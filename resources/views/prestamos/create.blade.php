@extends('layouts.app')

@section('content')


@if(session()->has('msj'))
<div class="alert alert-success" roler="alert">{{ session('msj') }}</div>
@endif
@if(session()->has('errormsj'))
<div class="alert alert-danger" roler="alert">Error al guardar los datos</div>
@endif

<div class="panel-heading"><h4>Nuevo Libro</h4></div>
<div class="panel-body">

<form role="form" method="POST" action="{{ url('libros')}}" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}   
<div class="form-group">
    <label for="descripcion" class="col-md-4 control-label">Descripcion:</label>    
    <div class="col-md-6">
      <input type="text" class="form-control" name="descripcion"  placeholder="descripcion">    
      @if($errors->has('descripcion'))
      <span style="color:red;">{{ $errors->first('descripcion')}}</span>
      @endif
    </div>
</div>
<div class="form-group">
    <label  for="cantidad" class="col-md-4 control-label">Cantidad:</label>    
    <div class="col-md-6">
      <input type="text" class="form-control" name="cantidad"  placeholder="Cantidad">  
      @if($errors->has('cantidad'))
      <span style="color:red;">{{ $errors->first('cantidad')}}</span>
      @endif   
    </div> 
</div>
<div class="form-group">
    <label  for="existencia" class="col-md-4 control-label">Existencia:</label> 
    <div class="col-md-6">   
      <input type="text" class="form-control" name="existencia"  placeholder="Existencia">  
      @if($errors->has('cantidad'))
      <span style="color:red;">{{ $errors->first('cantidad')}}</span>
      @endif   
    </div> 
</div>
<div class="form-group">
    <label for="foto" class="col-md-4 control-label">Foto:</label>  
    <div class="col-md-6"> 
     <input type="file" name="fotoImg" class="form-control">  
     </div>
    
</div>


 <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="btn-group">
          <button type="submit" class="btn  btn-primary btn-lg">  Crear</button>  
          <a href="{{ url('libros/')}}" class="btn btn-success btn-lg">Volver</a>
        </div>
    </div>
 </div>
 
         
</form>
</div>

@endsection
