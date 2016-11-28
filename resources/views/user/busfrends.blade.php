@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/usuario.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
@endsection

@section('slogan')
     <p class="navbar-text font-farsan">Conectate con tus amigos <i class="fa fa-users"></i></p>
@endsection


@section('content')

    <?php
      $user = Auth::user();
    ?>

<!-- COMIENZO DE LA FOTO -->
<div class="container amicover">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h1></h1>
        </div>
    </div>
</div>
<!-- FIN DE LA FOTO -->
<div class="container post">
    @forelse($buscfrends as $friend)
        @if($friend->id != $user->id)
    <div class="row">
        <div class="col-md-2 col-md-offset-1">
            <img src="{{ $friend->avatar }}" class="img-square center-block" width="150" height="150">
        </div>
        <div class="col-md-4">
            <p>Nombre: {{ $friend->name.' '.$friend->surname }}</p>
            <p>Mail: {{ $friend->email }}</p>
            <p>Bandas: {{ $friend->avatar }}</p>
            <p>Instrumentos: {{ $friend->avatar }}</p>
        </div>
        <div class="col-md-5">
                <a href="/addfriend/{{ $friend->id }}" class="btn btn-info">Agregar <i class="fa fa-plus-circle"></i></a>
        </div>
    </div>
        @endif
    @empty
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>No Hay Amigos para mostrar...</p>
            </div>
        </div>
    @endforelse
</div>

@endsection