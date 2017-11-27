@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <!-- Card header -->
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Login</h2>
                </div>
                <div class="pmd-card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}



                        <div class="form-group pmd-textfield pmd-textfield-floating-label form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login" class="control-label">E-Mail o Nombre</label>

                                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>

                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group pmd-textfield pmd-textfield-floating-label form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>                         
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                            
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline pmd-checkbox pmd-checkbox-ripple-effect">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="pmd-checkbox"> Remember Me</span> 
                            </label>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn pmd-btn-raised btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                        </div>


                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
