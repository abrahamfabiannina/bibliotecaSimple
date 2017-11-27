@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Card header -->
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Register</h2>
                </div>
                <div class="pmd-card-body">
                      <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" >
                        {{ csrf_field() }}


                        

                         <!--div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('cuenta') ? ' has-error' : '' }}">
                           <label for="cuenta" class="control-label">
                             Cuenta
                           </label>
                           <input id="cuenta" type="cuenta" class="form-control" name="cuenta" value="{{ old('cuenta') }}" required>
                           @if ($errors->has('cuenta'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('cuenta') }}</strong>
                               </span>
                           @endif
                        </div-->

                        <!-- Password Input -->
                        <!--div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="control-label">
                            Password
                          </label>
                          <input id="password" type="password" class="form-control" name="password" required>
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>

                        <!-- Password Confirm Input -->
                        <!--div class="form-group pmd-textfield pmd-textfield-floating-label">
                          <label for="password-confirm" class="control-label">
                            Confirm Password
                          </label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div-->

                        <!-- Regular Input with Floating labels -->
                        <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('nombre') ? ' has-error' : '' }}">
                           <label for="nombre" class="control-label">
                             Nombre
                           </label>
                           <input id="nombre" type="Text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                           @if ($errors->has('nombre'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('nombre') }}</strong>
                               </span>
                           @endif
                        </div>

                        <!-- Regular Input with Floating labels -->
                        <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('apellido') ? ' has-error' : '' }}">
                           <label for="apellido" class="control-label">
                             Apellido
                           </label>
                           <input id="apellido" type="Text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>
                           @if ($errors->has('apellido'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('apellido') }}</strong>
                               </span>
                           @endif
                        </div>

                        <!-- Regular Input with Floating labels -->
                        <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">
                             E-Mail Address
                           </label>
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                        </div>
                        
                        <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('foto') ? ' has-error' : '' }}">
                           <label for="foto" class="control-label">
                             foto
                           </label>
                             <input id="foto" type="file" class="form-control" name ="foto" value="{{ old('foto') }}" required >
                           @if ($errors->has('foto'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('foto') }}</strong>
                               </span>
                           @endif
                        </div>

                      <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('foto') ? ' has-error' : '' }}">
                          <label for="rol" class="control-label">

                          </label>
                               <select id="rol" class="form-control" name="rol" value="{{ old('rol') }}" required autofocus >
                                 <option>Administrador</option>
                                 <option>Bibliotecario</option>
                                 <option>Estudiante</option>
                               </select>
                               @if ($errors->has('rol'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('rol') }}</strong>
                                   </span>
                               @endif
                       </div>


                        <div class="form-group">
                            <button type="submit" class="btn pmd-btn-raised btn-primary">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
