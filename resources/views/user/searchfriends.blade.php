@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/usuario.css" type="text/css" />
    <link rel="stylesheet" href="/css/bscuser.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
@endsection

@section('slogan')
     <p class="navbar-text font-farsan">Conectate con tus amigos <i class="fa fa-users"></i></p>
@endsection


@section('content')

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
{{--            @for($i = 0;$i < count($userfriends);$i++)--}}
    <div class="row rowline">
        <div class="col-md-2 col-md-offset-2">
            <img src="{{ $friend->avatar }}" class="img-square center-block thumbnail" width="150" height="150">
        </div>
        <div class="col-md-5">
            <p class="single">Nombre: <b>{{ $friend->name.' '.$friend->surname }}</b></p>
            <p class="single">Mail: <b>{{ $friend->email }}</b></p>
            <p class="single">Bandas:
            @forelse($friend->band as $friendBand)
                <b>{{ $friendBand->band }} @if ($friendBand != $friend->band->last()) - @endif </b>
            @empty
                <b>No tiene bandas favoritas.</b><
            @endforelse
            </p>

            <p class="single">Instrumentos:
            @forelse($friend->instrument as $friendInst)
                <b>{{ $friendInst->instrument }} @if ($friendInst != $friend->instrument->last()) -  @endif </b>
            @empty
                <b>No toca ningun instrumento</b>
            @endforelse
            </p>
        </div>
        <div class="col-md-3">

                @if(! $isFriend[$friend->id])
                <a href="/addfriend/{{ $friend->id }}" class="btn btn-info">Seguir <i class="fa fa-arrow-circle-o-right"></i></a>
                @else
                <a href="/delfriend/{{ $friend->id }}" class="btn btn-danger">Dejar de Seguir <i class="fa fa-window-close-o"></i></a>
                @endif

        </div>
    </div>
            {{--@endfor--}}
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