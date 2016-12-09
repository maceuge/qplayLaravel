@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Recupera la Contraseña <i class="fa fa-asterisk"></i></p>
@endsection

<!-- Main Content -->
@section('content')

{{--<div class="jumbotronlog">--}}
    <div class="container-fluid login">
         <div class="row">
              <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                   <h3 class="text-center font-comfortaa logtit">Recuperar Contraseña</h3>
                   @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                   @endif

                   <form class="form" method="post" action="{{ url('/password/email') }}">
                       {{ csrf_field() }}
                       @if ($errors->has('email'))
                           <span class="help-block">
                                <p class="errcript">{{ $errors->first('email') }}</p>
                           </span>
                       @endif
                       <div class="form-group {{ $errors->has('email') ? ' onerrorph' : '' }}">
                            <input type="email" class="form-control" id="" name="email" value="{{ old('email') }}" placeholder="Email">
                       </div>

                           <button type="submit" class="btn btn-login center-block">Enviar</button>
                   </form>
              </div>
         </div>
    </div>
{{--</div>--}}

@endsection
