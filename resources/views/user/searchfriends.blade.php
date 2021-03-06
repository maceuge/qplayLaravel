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

<div class="container post" id="users-list">

    @if(isset($resultado))
        @forelse($resultado as $valor)
            @if($valor->id != $user->id)
                <div class="row rowline">
                    <div class="col-md-2 col-md-offset-2">
                        @if($valor->avatar)
                            <img src="{{ $valor->avatar }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                        @else
                            @if ($valor->gender == 'Hombre')
                                <img src="{{ asset('/img/default_male.jpg') }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                            @elseif ($valor->gender == 'Mujer' )
                                <img src="{{ asset('/img/default_female.jpg') }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                            @else
                                <img src="{{ asset('/img/default_other.jpg') }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                            @endif
                        @endif</div>
                    <div class="col-md-5">
                        <p class="single">Nombre: <b>{{ $valor->name.' '.$valor->surname }}</b></p>
                        <p class="single">Mail: <b>{{ $valor->email }}</b></p>
                        <p class="single">Bandas:
                        @forelse($valor->band as $friendBand)
                            <b>{{ $friendBand->band }} @if ($friendBand != $valor->band->last()) - @endif </b>
                        @empty
                            <b>No tiene bandas favoritas.</b>
                        @endforelse
                        </p>

                        <p class="single">Instrumentos:
                        @forelse($valor->instrument as $friendInst)
                            <b>{{ $friendInst->instrument }} @if ($friendInst != $valor->instrument->last()) -  @endif </b>
                        @empty
                            <b>No toca ningun instrumento.</b>
                        @endforelse
                        </p>
                    </div>
                    <div class="col-md-3" data-id="{{ $valor->id }}">
                        @if(! $isFriend[$valor->id])
                            <a href="#" class="btn btn-info btn-follow show-btn" id="btn-follow">Seguir <i class="fa fa-arrow-circle-o-right"></i></a>
                            <a href="#" class="btn btn-danger btn-dropFollow hide-btn" id="btn-dropFollow">Dejar de Seguir <i class="fa fa-window-close-o"></i></a>
                        @else
                            <a href="#" class="btn btn-info btn-follow hide-btn" id="btn-follow">Seguir <i class="fa fa-arrow-circle-o-right"></i></a>
                            <a href="#" class="btn btn-danger btn-dropFollow show-btn" id="btn-dropFollow">Dejar de Seguir <i class="fa fa-window-close-o"></i></a>
                        @endif
                    </div>
                </div>
            @endif
        @empty
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <p>No se encontraron resultados...</p>
                </div>
            </div>
       @endforelse
    @else
        @forelse($users as $oneUser)
            @if($oneUser->id != $user->id)
                <div class="row rowline">
                    <div class="col-md-2 col-md-offset-2">
                        @if($oneUser->avatar)
                            <img src="{{ $oneUser->avatar }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                        @else
                            @if ($oneUser->gender == 'Hombre')
                                <img src="{{ asset('/img/default_male.jpg') }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                            @elseif ($oneUser->gender == 'Mujer' )
                                <img src="{{ asset('/img/default_female.jpg') }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                            @else
                                <img src="{{ asset('/img/default_other.jpg') }}" class="img-square center-block thumbnail" alt="Usuario" width="150" height="150">
                            @endif
                        @endif
                    </div>
                    <div class="col-md-5">
                        <p class="single">Nombre: <b>{{ $oneUser->name.' '.$oneUser->surname }}</b></p>
                        <p class="single">Mail: <b>{{ $oneUser->email }}</b></p>
                        <p class="single">Bandas:
                        @forelse($oneUser->band as $userBand)
                            <b>{{ $userBand->band }} @if ($userBand != $oneUser->band->last()) - @endif </b>
                        @empty
                            <b>No tiene bandas favoritas.</b>
                        @endforelse
                        </p>

                        <p class="single">Instrumentos:
                        @forelse($oneUser->instrument as $userInst)
                            <b>{{ $userInst->instrument }} @if ($userInst != $oneUser->instrument->last()) -  @endif </b>
                        @empty
                            <b>No toca ningun instrumento.</b>
                        @endforelse
                        </p>
                    </div>
                    <div class="col-md-3" data-id="{{ $oneUser->id }}">
                            @if (! $isFriend[$oneUser->id])
                                <a href="#" class="btn btn-info btn-follow show-btn" id="btn-follow">Seguir <i class="fa fa-arrow-circle-o-right"></i></a>
                                <a href="#" class="btn btn-danger btn-dropFollow hide-btn" id="btn-dropFollow">Dejar de Seguir <i class="fa fa-window-close-o"></i></a>
                            @else
                                <a href="#" class="btn btn-info btn-follow hide-btn" id="btn-follow">Seguir <i class="fa fa-arrow-circle-o-right"></i></a>
                                <a href="#" class="btn btn-danger btn-dropFollow show-btn" id="btn-dropFollow">Dejar de Seguir <i class="fa fa-window-close-o"></i></a>
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
@endif
<!-- The actual snackbar -->
    <div id="snackbar"></div>
</div>

    {!! Form::open(['route' =>['friend.delete', ':Friend_id' ], 'method' => 'DELETE', 'id' => 'form-delete-friend']) !!}

    {!! Form::close() !!}

    {!! Form::open(['route' =>['friend.add', ':Friend_id' ], 'method' => 'POST', 'id' => 'form-add-friend']) !!}

    {!! Form::close() !!}
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('/js/user_follow_dropfollow.js') }}"></script>
@endsection