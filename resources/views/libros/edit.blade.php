@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Editar Libro</h2>
  </div>
<div class="panel-body">


    <form role="form" method="POST" action="{{ route('libros.update', $res->id) }}" enctype="multipart/form-data" class="form-horizontal">
     <input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }}

     <div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label for="descripcion">Descripcion:</label>
      <input type="text" class="form-control" name="descripcion" value="{{$res->descripcion}}">
      @if($errors->has('descripcion'))
      <span style="color:red;">{{ $errors->first('descripcion')}}</span>
      @endif
    </div>

    <div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label  for="cantidad">Cantidad:</label>
      <input type="text" class="form-control" name="cantidad"   value="{{$res->cantidad}}">
      @if($errors->has('cantidad'))
      <span style="color:red;">{{ $errors->first('cantidad')}}</span>
      @endif
</div>

<div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label  for="existencia">Existencia:</label>
      <input type="text" class="form-control" name="existencia"  value="{{$res->existencia}}">
      @if($errors->has('cantidad'))
      <span style="color:red;">{{ $errors->first('cantidad')}}</span>
      @endif
</div>
<div class="form-group pmd-textfield">
    <label for="foto" class="col-md-4 control-label">Foto:</label>
    <div class="col-md-6">
     <input type="file" name="fotoImg" class="form-control" title="Selecciona una Foto" required >
     </div>

</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="btn-group">
          <button type="submit" class="btn  btn-primary">Modificar</button>
          <a href="{{ url('libros')}}" class="btn btn-success">Volver</a>
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
