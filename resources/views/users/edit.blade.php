@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Editar Usuario</h2>
  </div>
<div class="panel-body">


    <form role="form" method="POST" action="{{ route('users.update', $res->id) }}" enctype="multipart/form-data" class="form-horizontal">
     <input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }}

     

    <div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label  for="nombre">Nombre:</label>
      <input type="text" class="form-control" name="nombre"   value="{{$res->nombre}}">
      @if($errors->has('nombre'))
      <span style="color:red;">{{ $errors->first('nombre')}}</span>
      @endif
</div>

<div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label  for="apellido">Apellido:</label>
      <input type="text" class="form-control" name="apellido"  value="{{$res->apellido}}">
      @if($errors->has('apellido'))
      <span style="color:red;">{{ $errors->first('apellido')}}</span>
      @endif
</div>
<div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label for="">Email:</label>
      <input type="text" class="form-control" name="email" value="{{$res->email}}">
      @if($errors->has('email'))
      <span style="color:red;">{{ $errors->first('email')}}</span>
      @endif
    </div>

  <div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label for="">Cuenta:</label>
      <input type="text" class="form-control" name="cuenta" value="{{$res->cuenta}}" disabled="on">
      @if($errors->has('cuenta'))
      <span style="color:red;">{{ $errors->first('cuenta')}}</span>
      @endif
  </div>

  <div class="form-group pmd-textfield pmd-textfield-floating-label">
    <label for="">Password:</label>
      <input type="text" class="form-control" name="password" value="">
      @if($errors->has('password'))
      <span style="color:red;">{{ $errors->first('password')}}</span>
      @endif
  </div>

<div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('rol') ? ' has-error' : '' }}">
                          <label for="rol" class="control-label">

                          </label>
                               <select id="rol" class="form-control" name="rol"  required autofocus >
                               
                                @if($res->rol=='Administrador')
                                 <option selected>Administrador</option>
                                 <option>Bibliotecario</option>
                                 <option >Estudiante</option>
                                @endif
                                @if($res->rol=='Estudiante')
                                 <option>Administrador</option>
                                 <option>Bibliotecario</option>
                                 <option selected>Estudiante</option>
                                @endif
                                @if($res->rol=='Bibliotecario')
                                 <option>Administrador</option>
                                 <option selected>Bibliotecario</option>
                                 <option>Estudiante</option>
                                @endif

                               </select>
                               @if ($errors->has('rol'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('rol') }}</strong>
                                   </span>
                               @endif
                       </div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="btn-group">
          <button type="submit" class="btn  btn-primary">Modificar</button>
          <a href="{{ url('users')}}" class="btn btn-success">Volver</a>
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
