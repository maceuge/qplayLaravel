<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Cabin|Comfortaa|Exo|Farsan|Kaushan+Script|Poiret+One|Righteous|Russo+One|Antic|Maven+Pro|Poppins|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/css/homex.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-awesome.css" type="text/css" />
    @yield('css')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<!-- COMIENZO DEL NAVBAR Y SU CONTENIDO -->
<!-- el yield del navbar trae la barra de navegacion fixed o no segun la pagina -->

@yield('navbar')
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if (Auth::guest())
            <a class="navbar-brand font-poiret logo" href="{{ url('/') }}">{{ config('app.name') }}</a>

            @else
                <a class="navbar-brand font-poiret logo" href="{{ url('/userlog') }}">{{ config('app.name') }}</a>
            @endif

            @yield('slogan')
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a class="btn btn-nav font-ubuntu" href="{{ url('/login') }}"><i class="fa fa-user-circle-o fa-lg"></i> Conectate </a></li>
                <li><a class="btn btn-nav font-ubuntu" href="{{ url('/register') }}"><i class="fa fa-pencil-square-o fa-lg"></i> Registrate </a></li>
                @else
                    <li>
                        <a class="btn navicon" href="{{ url('/userlog') }}">
                            <i class="fa fa-user-circle-o fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="btn navicon" href="#">
                            <i class="fa fa-calendar fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="btn navicon" href="#">
                            <i class="fa fa-comments fa-lg"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="img-circle subuser" src="{{ $user->avatar.' ' }}" alt="user" width="40" height="40">&nbsp;&nbsp;
                            {{ Auth::user()->name.' '.Auth::user()->surname }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/searchfriends"><i class="fa fa-users"></i> Buscar Amigos</a></li>
                            <li><a href="/userlog"><i class="fa fa-list"></i> Mi Muro</a></li>
                            <li><a href="#"><i class="fa fa-unlock-alt"></i> Privacidad</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Configuración</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="fa fa-sign-out"></i> Salir
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


    @yield('content')


<!-- COMIENZO DEL FOOTER -->
@if (Auth::guest())
<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-12">
            <ul class="list-inline text-center">
                <li><a href="{{ url('/login') }}" class="footlink">Conectate</a></li>
                <li><p></p></li>
                <li><a href="{{ url('/register') }}" class="footlink">Registrate</a></li>
                <li><p></p></li>
                <li><a href="/faqs" class="footlink">Preguntas Frecuentes</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-maven footp text-center">Diseñado y desarollado por: Eugenio Vorontsov - Maggie Tobar - Sebastian Crosta</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center footlog">
                <i class="fa fa-html5"></i>
                <i class="fa fa-css3"></i>
                <i class="fa fa-github"></i>
                <i class="fa fa-git-square"></i>
                <i class="fa fa-font-awesome"></i>
                <i class="fa fa-stack-overflow"></i>
                <i class="fa fa-apple"></i>
                <i class="fa fa-android"></i>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="line center-block"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-maven text-center footp">Copyright <i class="fa fa-copyright"></i> 2016 QPlay <i class="fa fa-registered"></i> All Rights Reserved.</p>
        </div>
    </div>
</div>
@else
    <div class="container footeru">
        <div class="row">
            <div class="col-md-3">
                <p class="text-center footlog">
                    <i class="fa fa-html5"></i>
                    <i class="fa fa-css3"></i>
                    <i class="fa fa-github"></i>
                    <i class="fa fa-git-square"></i>
                    <i class="fa fa-font-awesome"></i>
                    <i class="fa fa-stack-overflow"></i>
                    <i class="fa fa-apple"></i>
                    <i class="fa fa-android"></i>
                </p>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-5">
                <p class="font-maven text-center footp">Copyright <i class="fa fa-copyright"></i> 2016 QPlay <i class="fa fa-registered"></i> All Rights Reserved.</p>
            </div>
        </div>
    </div>
@endif
<!-- FIN DEL FOOTER -->


<!-- COMIENZO DE JAVASCRIPT PLUGINS -->
{{--GENEREC PLUGIN--}}
<script type="text/javascript" src="/js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/botcolaps.js"></script>
{{--ADDITIONAL PLUGIN--}}
@yield('plugin')
{{--<script type="text/javascript" src="/js/app.js"></script>--}}

</body>
</html>