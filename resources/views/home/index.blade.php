@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/animations.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Tu Red Musical <i class="fa fa-music"></i></p>
@endsection


@section('content')
    <!-- COMIENZO DE JUMBOTRON -->
    <div class="jumbotron text-center">
        <h1 class="font-russo">Un lugar para disfrutar toda la música!</h1>
        <p class="font-exo">Descubrí bandas, recitales, conciertos, meetups, peñas y mucho más!!!</p>
    </div>
    <!-- FIN DEL JUMBOTRON -->

    <!-- COMIENZO DEL SPOT -->
    <div class="container-fluid">
        <div class="row gray">
            <div class="col-md-1 col-md-offset-2">
                <div id="object" class="tossing">
                    <p class="text-center"><i class="fa fa-music fa-5" aria-hidden="true"></i></p>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-2">
                <h1 class="font-comfortaa">La música se disfruta más si es con amigos</h1>
                <p class="font-maven"><span class="font-poiret logspot">QPlay</span> te ayuda a conocer gente que comparte tus intereses musicales, ya sea para armar una banda, o ir a escuchar un buen recital!</p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <!-- FIN DEL SPOT -->

    <!-- COMIENZO DEL CONTENEDOR GRUPOS Y EVENTOS -->
    <div class="container-fluid event">
        <div class="row image">
            <div class="col-sm-6">
                <h3 class="text-center font-comfortaa">Músicos y Bandas</h3>

                <img src="img/img1.jpg" alt="..." class="img-squarex" width="160" height="160">
                <img src="img/img2.jpg" alt="..." class="img-squarex" width="160" height="160">
                <img src="img/img3.jpg" alt="..." class="img-squarex" width="160" height="160">

                <img src="img/img4.jpg" alt="..." class="img-squarex" width="160" height="160">
                <img src="img/img5.jpg" alt="..." class="img-squarex" width="160" height="160">
                <img src="img/img6.jpg" alt="..." class="img-squarex" width="160" height="160">

            </div>
            <div class="col-sm-6">
                <h3 class="text-center font-comfortaa">Eventos</h3>
                <div class="event-info">
                    <h3 class="font-comfortaa">Guitarreada en Parque Nacional</h3>
                    <i class="fa fa-share fa-lg"></i>
                    <p class="font-maven">Este viernes acercate con tu instrumento al parque desde las 22 hs. para pasar una noche diferente, tocando temas populares.</p>
                </div>
                <div class="event-info">
                    <h3 class="font-comfortaa">Rock & Roll en Luna Park</h3>
                    <i class="fa fa-share fa-lg"></i>
                    <p class="font-maven">A puro rock en el Luna! Inscribí tu banda!</p>
                </div>
                <div class="event-info">
                    <h3 class="font-comfortaa">Festival de Folklore</h3>
                    <i class="fa fa-share fa-lg"></i>
                    <p class="font-maven">Para todos los amantes de la tradición, se están organizando micros para ir a Jesús María. Reserva tu lugar!!!</p>
                </div>
                {{--<div class="event-info">
                    <h3 class="font-comfortaa">Tu vida como un Electo</h3>
                    <i class="fa fa-share fa-lg"></i>
                    <p class="font-maven">Venite a disfrutar de los mejores DJs</p>
                </div>--}}
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENEDOR GRUPOS Y EVENTOS -->

    <!-- COMIENZO DEL CONTENEDOR CELULAR RESPONSIVE -->
    <div class="container-fluid">
        <div class="row gray2">
            <div class="col-md-6 col-md-offset-1 col-sm-12">
                <h1 class="font-comfortaa">Conectate sin límites, estés donde estés.</h1>
                <p class="font-maven">Ahora podés estar conectado con tu tablet o celular desde cualquier navegador móvil!
                    <i class="fa fa-mobile fa-tel"></i>
                </p>
                <p class="text-center">
                    <i class="fa fa-safari logpage"><span class="inlogo">Safari</span></i>
                    <i class="fa fa-firefox logpage"><span class="inlogo">Firefox</span></i>
                    <i class="fa fa-chrome logpage"><span class="inlogo">Chrome</span></i>
                    <i class="fa fa-edge logpage"><span class="inlogo">Edge</span></i>
                </p>
            </div>
            <div class="col-md-5  col-sm-12">
                <img src="img/celView3.fw.png" class="img-responsive center-block cellview" width="375" height="300">
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENEDOR CELULAR RESPONSIVE -->

@endsection

@section('plugin')
    <script type="text/javascript" src="/js/navanim.js"></script>
    <script type="text/javascript" src="/js/animation.js"></script>
@endsection