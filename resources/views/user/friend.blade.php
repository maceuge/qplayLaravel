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
              <img src="{{ $friend->avatar }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
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
                                            <div class="col-sm-8">{{ $friend->gender }}</div>
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
                                                <div class="col-sm-8"><span class="text-muted">{{ $instrument->instrument }}</span></div>
                                                <div class="col-sm-4"> {{ $instrument->level }}</div>
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
                    </div>

<div class="col-md-8 col-sm-12">
     @forelse($posts as $post)
         <div class="box box-widget bordered-info">
             <div class="box-header with-border">
                  <div class="user-block">
                       <img class="img-circle" src="{{ $friend->avatar }}" alt="User Image">
                       <span class="usernamebox"><a href="#">{{ $friend->name.' '.$friend->surname }}.</a></span>
                       <span class="description">Publicado - {{ $post->created_at  }}</span>
                  </div>
             </div>

             <div class="box-body" style="display: block;">
                 <p class="posted">{{ $post->post }}</p>
                 <a href="" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up"></i> Me Gusta</a>
                 <a href="" class="btn btn-warning btn-xs"><i class="fa fa-thumbs-down"></i> No me Gusta</a>
                 <span class="pull-right text-muted"><span class="badge">{{ count($post->coment) }}</span> Comentarios</span>
             </div>

             @foreach($post->coment as $coments)
                 <div class="box-footer box-comments" style="display: block;">
                     <div class="box-comment">
                         <img class="img-circle img-sm" src="{{ $coments->user->avatar }}" alt="User Image">
                         <div class="comment-text">
                            <span class="usernamecom">{{ $coments->user->name.' '.$coments->user->surname }}
                                <span class="text-muted pull-right">{{ $coments->created_at }}</span>
                            </span>
                             {{ $coments->coment }}
                         </div>
                     </div>
                 </div>
             @endforeach

             <div class="box-footer" style="display: block;">
                 <form action="/addcomentfriend/{{$post->id}}/frd/{{ $friend->id }}" method="post">
                     {{ csrf_field() }}
                     <img class="img-responsive img-circle img-sm" src="{{ $user->avatar }}" alt="Alt Text">
                     <div class="img-push">
                         <input type="text" name="coment" class="form-control input-sm {{ ($post->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}" placeholder="Presiona Enter para comentar">
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