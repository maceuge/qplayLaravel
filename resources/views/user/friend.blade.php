@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/usuario.css') }}" type="text/css" />
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
             @if($friend->avatar)
                 <img src="/{{ $friend->avatar }}" class="img-square center-block user" alt="Usuario" width="150" height="150">
             @else
                 @if ($friend->gender == 'Hombre')
                     <img src="{{ asset('img/default_male.jpg') }}" class="img-square center-block user" alt="Usuario" width="150" height="150">
                 @elseif ($friend->gender == 'Mujer' )
                     <img src="{{ asset('img/default_female.jpg') }}" class="img-square center-block user" alt="Usuario" width="150" height="150">
                 @else
                     <img src="{{ asset('img/default_other.jpg') }}" class="img-square center-block user" alt="Usuario" width="150" height="150">
                 @endif
             @endif
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
                      @if ($post->user->avatar)
                          <img src="/{{ $post->user->avatar }}" class="img-circle"  alt="User Image">
                      @else
                          @if ($post->user->gender == 'Hombre')
                              <img src="{{ asset('img/default_male.jpg') }}"  class="img-circle"  alt="User Image">
                          @elseif ($post->user->gender == 'Mujer' )
                              <img src="{{ asset('img/default_female.jpg') }}" class="img-circle"  alt="User Image">
                          @else
                              <img src="{{ asset('img/default_other.jpg') }}" class="img-circle"  alt="User Image">
                          @endif
                      @endif
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
                         @if($coments->user->avatar)
                             <img src="/{{ $coments->user->avatar }}" class="img-circle img-sm" alt="User Image">
                         @else
                             @if ($coments->user->gender == 'Hombre')
                                 <img src="{{ asset('img/default_male.jpg') }}"  class="img-circle img-sm" alt="User Image">
                             @elseif ($coments->user->gender == 'Mujer' )
                                 <img src="{{ asset('img/default_female.jpg') }}" class="img-circle img-sm" alt="User Image">
                             @else
                                 <img src="{{ asset('img/default_other.jpg') }}" class="img-circle img-sm" alt="User Image">
                             @endif
                         @endif
                         <div class="comment-text">
                            <span class="usernamecom">{{ $coments->user->name.' '.$coments->user->surname }}
                                @if ($coments->user->id == $user->id)
                                    <span><a class="clcoment" href="{{ url('delcoment/'.$coments->id) }}"><i class="fa fa-close fright fa-lg"></i></a></span>
                                @endif
                                <span class="text-muted pull-right">{{ $coments->created_at }}</span>
                            </span>
                             {{ $coments->coment }}
                         </div>
                     </div>
                 </div>
             @endforeach

             <div id="new-comment">
                 <!-- new Ajax comment here -->
             </div>

             <div class="box-footer" style="display: block;">
                 <form action="{{ route('comment.add', $post->id) }}" method="post" id="form-add-comment">
                     {{ csrf_field() }}
                     @if($user->avatar)
                         <img  src="/{{ $user->avatar }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                     @else
                         @if ($user->gender == 'Hombre')
                             <img src="{{ asset('img/default_male.jpg') }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                         @elseif ($user->gender == 'Mujer' )
                             <img src="{{ asset('img/default_female.jpg') }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                         @else
                             <img src="{{ asset('img/default_other.jpg') }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                         @endif
                     @endif<div class="img-push">
                         <input id="add-comment" type="text" name="coment" class="form-control input-sm {{ ($post->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}" placeholder="Presiona Enter para comentar">
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
<script>
    var token = '{{ Session::token() }}';
    var assetImg = '{{ asset('/img') }}';
    var urlDelComment = '{{ route('delcoment',':commentId') }}';
</script>
@endsection

@section('plugin')
    <script type="text/javascript" src="{{ asset('/js/navanim.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/closepost.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/delete_post.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/add_comment.js') }}"></script>
@endsection