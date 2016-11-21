@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/login.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse">
@endsection

@section('slogan')
     <p class="navbar-text font-farsan">Conectate con tus amigos. <i class="fa fa-users"></i></p>
@endsection

    @section('content')
    <!-- COMIENZO DEL LOGIN -->
    <div class="container-fluid login">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <h3 class="text-center font-comfortaa logtit">Iniciar Sesión</h3>

                <form class="form" id="form" action="{{ url('/login') }}" method="post">
                    {{ csrf_field() }}

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <p class="errcript">{{ $errors->first('email') }}</p>
                        </span>
                    @endif
                    <div class="error"><p class="errcript"></p></div>
                    <div class="form-group {{ $errors->has('email') ? ' onerrorph' : '' }} ">
                        <input class="form-control" type="email" id="mail" name="email" value="{{ old('email') }}" placeholder="Email" maxlength="55" autofocus>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <p class="errcript">{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                    <div class="error"><p class="errcript"></p></div>
                    <div class="form-group {{ $errors->has('password') ? ' onerrorph' : '' }} ">
                        <input type="password" class="form-control" id="pass" name="password" placeholder="Contraseña" maxlength="40">
                    </div>

                    <div class="checkbox">
                        <label class="switch">
                            <input type="checkbox" name="remember" value="1">
                            <div class="slider round"></div> <p class="recordarme"> Recordarme</p>
                        </label>
                        <a href="{{ url('/password/reset') }}" class="olvidcont">Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" class="btn btn-login center-block">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL LOGIN -->
@endsection

@section('plugin')
    <script type="text/javascript" src="/js/logval.js"></script>
@endsection