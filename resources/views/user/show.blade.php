@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/usuario.css" type="text/css" />
    <link rel="stylesheet" href="/css/file-input.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Te da la Bienvenida! <i class="fa fa-angellist"></i></p>
@endsection

@section('content')

    <?php
       $fullname = $user->name.' '.$user->surname;
       $bands = $user->band;
       $inst = $user->instrument;
    ?>

    <!-- COMIENZO DE LA FOTO -->
<div class="container usercover">
    <div class="row pull-bottom">
        <div class="col-md-2 col-sm-12">
            <img src="{{ $user->avatar }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
        </div>
        <div class="col-md-6 col-sm-12">
            <p class="username">{{ $fullname }}</p>
            <p class="mail">{{ $user->email }}</p>
            <form action="/avatarUpload" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="btn-group" role="group" aria-label="...">
                    <input type="file" name="avatar" data-filename-placement="inside" style="left: -254px; top: 12px;">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-arrow-circle-o-up fa-lg"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN DE LA FOTO -->

<!-- Comienzo del cuerpo de la info y posteo -->
<div class="container post">
    <div class="row">
        {{-- seccion izquirda con las bandas instrumentos y info personal--}}
        <div class="col-md-4 col-sm-12">
        <div class="widget">
            <div class="widget-header">
                <h3 class="widget-caption titleover">Sobre Mi</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
                <ul class="list-unstyled profile-about margin-none">
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Nacimiento</span></div>
                            <div class="col-sm-8">{{ $user->birthday }}</div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Email</span></div>
                            <div class="col-sm-8">{{ $user->email }}</div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Sexo</span></div>
                            <div class="col-sm-8">{{ $user->gender }}</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

            {{--Bandas que te gustan--}}
            <div class="widget">
                <div class="widget-header">
                    <h3 class="widget-caption titleover">Bandas</h3>
                </div>
                <div class="widget-body bordered-top bordered-palegreen">
                    <ul class="list-unstyled profile-about margin-none">

                        @forelse($bands as $band)
                        <li class="padding-v-5">
                            <div class="row">
                                {{--<div class="col-sm-6"><span class="text-muted">Banda</span></div>--}}
                                <div class="col-sm-6">{{ $band->band }}</div>
                            </div>
                        </li>
                        @empty
                        <li class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Banda</span></div>
                                <div class="col-sm-8">Sin Registro</div>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>

            {{--Instrumentos que te gustan--}}
            <div class="widget">
                <div class="widget-header">
                    <h3 class="widget-caption titleover">Instrumentos</h3>
                </div>
                <div class="widget-body bordered-top bordered-yellow">
                    <ul class="list-unstyled profile-about margin-none">
                        @forelse($inst as $instrument)
                        <li class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">{{ $instrument->instrument }}</span></div>
                                <div class="col-sm-8"> Nivel {{ $instrument->level }}</div>
                            </div>
                        </li>
                        @empty
                        <li class="padding-v-5">
                            <div class="row">
                                <div class="col-sm-4"><span class="text-muted">Instrumento</span></div>
                                <div class="col-sm-8">Sin Registro</div>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>

            {{-- lista de amigos --}}
            <div class="widget widget-friends">
                <div class="widget-header">
                    <h3 class="widget-caption">Siguiendo</h3>
                </div>
                <div class="widget-body bordered-top  bordered-red">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="img-grid" style="margin: 0 auto;">
                                <li>
                                    <a href="/searchfriends">
                                        <img src="/img/add.jpg" alt="Add Friend" width="65" height="65">
                                    </a>
                                </li>
                                @for($i = 0; $i < count($friends); $i++)
                                    @if ($friends[$i]->id != $user->id)
                                    <li>
                                        <a href="/friend/{{ $friends[$i]->id }}">
                                            <img src="{{ $friends[$i]->avatar }}" alt="image" width="65" height="65">
                                        </a>
                                    </li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-8 col-sm-12">
            {{-- Barra principal del POST--}}
            <div class="box profile-info n-border-top">
                <form action="/posting" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <textarea class="form-control input-lg p-text-area" name="post" rows="2" placeholder="Que cuentas hoy?" maxlength="254"></textarea>
                    <div class="box-footer box-form">
                        <button type="submit" class="btn btn-success pull-right"> Comentar</button>
                        <ul class="nav nav-pills">
                            {{--<li><a href="#"><i class="fa fa-map-marker"></i></a></li>--}}
                            <li><a href="#"><i class="fa fa-camera"></i></a></li>
                            <li><a href="#"><i class=" fa fa-film"></i></a></li>
                            {{--<li><a href="#"><i class="fa fa-microphone"></i></a></li>--}}
                        </ul>
                    </div>
                </form>
            </div>

    @if(!empty($post))
        @for($i = 0;$i < count($post);$i++)
            <div class="box box-widget {{ ($post[$i]->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}">
                <div class="box-header with-border {{ ($post[$i]->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}">
                    <div class="user-block">
                        <img class="img-circle" src="{{ $post[$i]->user->avatar }}" alt="User Image">
                        <span class="usernamebox">{{ $post[$i]->user->name.' '.$post[$i]->user->surname }}</span>
                        <span class="description">Publicado - {{ $post[$i]->created_at }}</span>
                    </div>
                </div>

                <div class="box-body" style="display: block;">
                    <p id="contenido{{$post[$i]->id}}">{{ $post[$i]->post }}</p>
                    @if ($post[$i]->user->id == $user->id)
                    <button id="edit{{$post[$i]->id}}" class="btn btn-warning btn-xs botonEditar"><i class="fa fa-edit"></i> Editar</button>
                    <a href="/delete/{{ $post[$i]->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                    @else
                    <a href="" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up"></i> Like</a>
                    @endif
                    <span class="pull-right text-muted">{{ count($post[$i]->coment) }} Comentarios</span>
                </div>

                @foreach($post[$i]->coment as $coments)
                <div class="box-footer box-comments" style="display: block;">
                    <div class="box-comment">
                        <img class="img-circle img-sm" src="{{ $coments->user->avatar }}" alt="User Image">
                        <div class="comment-text">
                            <span class="usernamebox">{{ $coments->user->name.' '.$coments->user->surname }}
                                <span class="text-muted pull-right">{{ $coments->created_at }}</span>
                            </span>
                            {{ $coments->coment }}
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="box-footer" style="display: block;">
                    <form action="/addcoment/{{$post[$i]->id}}" method="post">
                        {{ csrf_field() }}
                        <img class="img-responsive img-circle img-sm" src="{{ $user->avatar }}" alt="Alt Text">
                        <div class="img-push">
                            <input type="text" name="coment" class="form-control input-sm {{ ($post[$i]->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}" placeholder="Presiona Enter para comentar">
                        </div>
                    </form>
                </div>
            </div>
        @endfor
    @else
        <p>Sin posts actualmente</p>
    @endif

        </div><!-- fin de la columna del medio -->
    </div>  {{--fin del row del post--}}
</div> {{--fin del contenedor del post--}}

@endsection

@section('plugin')
   <script type="text/javascript" src="/js/navanim.js"></script>
            <script>
                $(document).ready(function(){
                    $('input[type=file]').bootstrapFileInput();
                });
            </script>
   <script type="text/javascript" src="/js/bootstrap_file-input.js"></script>
   <script type="text/javascript" src="/js/edit.js"></script>
@endsection