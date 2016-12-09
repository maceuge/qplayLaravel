@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/login.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Recupera la Contraseña <i class="fa fa-asterisk"></i></p>
@endsection


@section('content')
<div class="container-fluid login">
    <div class="row">
         <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
         <h3 class="text-center font-comfortaa logtit">Renovar Contraseña</h3>
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="token" value="{{ $token }}">
                  @if ($errors->has('email'))
                      <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                          </span>
                  @endif
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <input id="email" type="email" class="form-control" name="email"
                                  value="{{ $email or old('email') }}" placeholder="Email"
                                  required autofocus>
                  </div>

                  @if ($errors->has('password'))
                      <span class="help-block">
                                 <strong>{{ $errors->first('password') }}</strong>
                            </span>
                  @endif
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="password" type="password" class="form-control"
                             name="password" placeholder="Contraseña" required>
                  </div>

                  @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                       <input id="password-confirm" type="password" class="form-control"
                              name="password_confirmation" placeholder="Repetir Contraseña" required>
                  </div>

                  <button type="submit" class="btn btn-login center-block">Renovar la contraseña</button>
              </form>
         </div>
    </div>
</div>
@endsection
