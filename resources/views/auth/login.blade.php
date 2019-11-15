@extends('layouts.app')
@section('content')

<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="{{route("login")}}">
            <span><i class="fa fa-gg"></i></span>
            <span> Admin Panel </span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">     {{ config('app.name', 'GY') }}</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->has('password'))
                <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
            @if ($errors->has('email'))
                <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            <div class="form-group">
                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            </div>


            <div class="form-group">
                <input id="password" type="password" placeholder="{{ __('Password') }}"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>

            <div class="form-group m-b-xl">
                <div class="checkbox checkbox-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="SING IN">
        </form>
    </div>


</div>

@endsection



