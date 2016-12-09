@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/usuario.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/css/bscuser.css') }}" type="text/css" />
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
    @forelse($users as $user)
        @if($user->id != $userLoggedIn->id)

    <div class="row rowline">
        <div class="col-md-2 col-md-offset-2">
            @if($user->avatar)
                <img src="{{ $user->avatar }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
            @else
                @if ($user->gender == 'hombre')
                    <img src="{{ asset('/img/default_male.jpg') }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
                @elseif ($user->gender == 'mujer' )
                    <img src="{{ asset('/img/default_female.jpg') }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
                @else
                    <img src="{{ asset('/img/default_other.jpg') }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
                @endif
            @endif
        </div>
        <div class="col-md-5">
            <p class="single">Nombre: <b>{{ $user->name.' '.$user->surname }}</b></p>
            <p class="single">Mail: <b>{{ $user->email }}</b></p>
            <p class="single">Bandas:
            @forelse($user->band as $userBand)
                <b>{{ $userBand->band }} @if ($userBand != $user->band->last()) - @endif </b>
            @empty
                <b>No tiene bandas favoritas.</b>
            @endforelse
            </p>

            <p class="single">Instrumentos:
            @forelse($user->instrument as $userInst)
                <b>{{ $userInst->instrument }} @if ($userInst != $user->instrument->last()) -  @endif </b>
            @empty
                <b>No toca ningun instrumento.</b>
            @endforelse
            </p>
        </div>
        <div class="col-md-3">
                @if (! $isFriend[$user->id])
                <a href="/addfriend/{{ $user->id }}" class="btn btn-info">Seguir <i class="fa fa-arrow-circle-o-right"></i></a>
                @else
                <a href="/delfriend/{{ $user->id }}" class="btn btn-danger">Dejar de Seguir <i class="fa fa-window-close-o"></i></a>
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