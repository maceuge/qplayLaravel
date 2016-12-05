@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/usuario.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Perfil del Amigo! <i class="fa fa-angellist"></i></p>
@endsection

@section('content')
<!-- COMIENZO DE LA FOTO -->
<div class="container usercover">
    <div class="row pull-bottom">
         <div class="col-md-2 col-sm-12">
              <img src="/{{ $friend->avatar }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
         </div>
         <div class="col-md-6 col-sm-12">
             <p class="username">{{ $friend->name.' '.$friend->surname }}</p>
             <p class="mail">{{ $friend->email }}</p>
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
                                            <div class="col-sm-8">{{ $friend->birthday }}</div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Email</span></div>
                                            <div class="col-sm-8">{{ $friend->email }}</div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Sexo</span></div>
                                            <div class="col-sm-8">----</div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Direccion</span></div>
                                            <div class="col-sm-8">----</div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Usuario</span></div>
                                            <div class="col-sm-8">----</div>
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
                                    @forelse($friend->band as $band)
                                        <li class="padding-v-5">
                                            <div class="row">
                                                <div class="col-sm-4"><span class="text-muted">Banda</span></div>
                                                <div class="col-sm-8">{{ $band->band }}</div>
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
                                    @forelse($friend->instrument as $instrument)
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
                                <h3 class="widget-caption">Amigos</h3>
                            </div>
                            <div class="widget-body bordered-top  bordered-red">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="img-grid" style="margin: 0 auto;">
                                           {{-- @for($i = 0; $i < count($friends); $i++)
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ $friends[$i]->avatar }}" alt="image" width="65" height="65">
                                                    </a>
                                                </li>
                                            @endfor --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="col-md-8 col-sm-12">
     @forelse($posts as $post)
         <div class="box box-widget bordered-info">
             <div class="box-header with-border">
                  <div class="user-block">
                       <img class="img-circle" src="/{{ $friend->avatar }}" alt="User Image">
                       <span class="usernamebox"><a href="#">{{ $friend->name.' '.$friend->surname }}.</a></span>
                       <span class="description">Publicado - {{ $post->created_at  }}</span>
                  </div>
             </div>
             <div class="box-body" style="display: block;">
                 <p>{{ $post->post }}</p>
                 <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                 <span class="pull-right text-muted">0 Comentarios</span>
             </div>
             <div class="box-footer" style="display: block;">
                 <form action="#" method="post">
                     <img class="img-responsive img-circle img-sm" src="/{{ $user->avatar }}" alt="Alt Text">
                     <div class="img-push">
                         <input type="text" class="form-control input-sm" placeholder="Presiona Enter para comentar">
                     </div>
                 </form>
             </div>
         </div>
@empty
    <p>Sin posts actualmente</p>
@endforelse

        </div><!-- fin de la columna del medio -->
    </div>  {{--fin del row del post--}}
</div> {{--fin del contenedor del post--}}
@endsection

@section('plugin')
   <script type="text/javascript" src="/js/navanim.js"></script>
@endsection