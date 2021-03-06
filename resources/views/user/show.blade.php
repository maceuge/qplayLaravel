@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/usuario.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/css/file-input.css') }}" type="text/css" />
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
            @if($user->avatar)
                <img src="{{ $user->avatar }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
            @else
                @if ($user->gender == 'Hombre')
                    <img src="{{ asset('/img/default_male.jpg') }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
                @elseif ($user->gender == 'Mujer' )
                    <img src="{{ asset('/img/default_female.jpg') }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
                @else
                    <img src="{{ asset('/img/default_other.jpg') }}" class="img-square user center-block" alt="Usuario" width="150" height="150">
                @endif
            @endif
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

            {{-- lista de amigos --}}
            <div class="widget widget-friends">
                <div class="widget-header">
                    <h3 class="widget-caption">Amigos</h3>
                </div>
                <div class="widget-body bordered-top  bordered-red">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="img-grid" style="margin: 0 auto;">
                                <li>
                                    <a href="{{ route('searchfriends') }}">
                                        <img src="{{ asset('/img/add.jpg') }}" alt="Add Friend" width="65" height="65">
                                    </a>
                                </li>
                                @for($i = 0; $i < count($friends); $i++)
                                    @if ($friends[$i]->id != $user->id)
                                    <li>
                                        <a href="{{ url('friend/'.$friends[$i]->id) }}">
                                            @if($friends[$i]->avatar)
                                                <img src="{{ $friends[$i]->avatar }}" title="{{$friends[$i]->name}} {{$friends[$i]->surname}}" width="65" height="65">
                                            @else
                                                @if ($friends[$i]->gender == 'Hombre')
                                                    <img src="{{ asset('/img/default_male.jpg') }}" title="{{$friends[$i]->name}} {{$friends[$i]->surname}}" width="65" height="65">
                                                @elseif ($friends[$i]->gender == 'Mujer' )
                                                    <img src="{{ asset('/img/default_female.jpg') }}" title="{{$friends[$i]->name}} {{$friends[$i]->surname}}" width="65" height="65">
                                                @else
                                                    <img src="{{ asset('/img/default_other.jpg') }}" title="{{$friends[$i]->name}} {{$friends[$i]->surname}}" width="65" height="65">
                                                @endif
                                            @endif
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
            <div class="box profile-info n-border-top postbox">
                <form action="{{ route('posting') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <textarea id="post-body" class="form-control input-lg p-text-area posttext" name="post" rows="2" placeholder="Que cuentas hoy?"></textarea>
                    <div class="box-footer box-form">
                        <button type="submit" class="btn btn-qplay pull-right" id="btn-crear-post"> Publicar</button>
                        <ul class="nav nav-pills">
                            {{--<li><a href="#"><i class="fa fa-map-marker"></i></a></li>--}}
                            <li><a href="#"><i class="fa fa-camera"></i></a></li>
                            <li><a href="#"><i class=" fa fa-film"></i></a></li>
                            {{--<li><a href="#"><i class="fa fa-microphone"></i></a></li>--}}
                        </ul>
                    </div>
                </form>
            </div>

            <div id="new-post">
                <!-- new Ajax post here -->
            </div>
            {{-- Contenedor de todos los post --}}
    @if(!empty($post))
        @for($i = 0;$i < count($post);$i++)
            <div class="box box-widget {{ ($post[$i]->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}" id="post-box">
                <div class="box-header with-border {{ ($post[$i]->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}">
                    <div class="user-block" data-idpost="{{$post[$i]->id}}">
                        @if ($post[$i]->user->avatar)
                            <img src="{{ $post[$i]->user->avatar }}" class="img-circle"  alt="User Image">
                        @else
                            @if ($post[$i]->user->gender == 'Hombre')
                                <img src="{{ asset('/img/default_male.jpg') }}"  class="img-circle"  alt="User Image">
                            @elseif ($post[$i]->user->gender == 'Mujer' )
                                <img src="{{ asset('/img/default_female.jpg') }}" class="img-circle"  alt="User Image">
                            @else
                                <img src="{{ asset('/img/default_other.jpg') }}" class="img-circle"  alt="User Image">
                            @endif
                        @endif


                        <span class="usernamebox">{{ $post[$i]->user->name.' '.$post[$i]->user->surname }}</span>
                        @if ($post[$i]->user->id == $user->id)
                            <a class="close clpost" id="closepost" href=""><i class="fa fa-close fright"></i></a>
                        @endif
                        <span class="description">Publicado - {{ $post[$i]->created_at }}</span>
                    </div>
                </div>

                <div class="box-body" style="display: block;" data-postid="{{$post[$i]->id}}">
                    <p class="posted">{{ $post[$i]->post }}</p>
                    @if ($post[$i]->user->id == $user->id)
                    <a href="" class="btn btn-warning btn-xs" id="edit"><i class="fa fa-edit"></i> Editar</a>
                    <span>
                    <a href="" class="btn btn-info btn-xs like">
                        <i class="fa fa-thumbs-up"></i> Me Gusta
                        <span class="badge liked">{{ count($post[$i]->like->where('islike', '==', 1)) }}</span>
                    </a>
                    <a href="" class="btn btn-danger btn-xs like">
                        <i class="fa fa-thumbs-down"></i> No me Gusta
                        <span class="badge disliked">{{ count($post[$i]->like->where('islike', '==', 0)) }}</span>
                    </a>
                    </span>
                    @else
                    <span>
                    <a href="" class="btn btn-info btn-xs like">
                        <i class="fa fa-thumbs-up"></i> Me Gusta
                        <span class="badge liked">{{ count($post[$i]->like->where('islike', '==', 1)) }}</span>
                    </a>
                    <a href="" class="btn btn-danger btn-xs like">
                        <i class="fa fa-thumbs-down"></i> No me Gusta
                        <span class="badge disliked">{{ count($post[$i]->like->where('islike', '==', 0)) }}</span>
                    </a>
                    </span>
                    @endif
                    <span class="pull-right text-muted"><span class="badge comentbadge">{{ count($post[$i]->coment) }}</span> Comentarios</span>
                </div>

                @foreach($post[$i]->coment as $coments)
                <div class="box-footer box-comments" style="display: block;">
                    <div class="box-comment" data-commentId="{{ $coments->id }}">
                        @if($coments->user->avatar)
                            <img src="{{ $coments->user->avatar }}" class="img-circle img-sm" alt="User Image">
                        @else
                            @if ($coments->user->gender == 'Hombre')
                                <img src="{{ asset('/img/default_male.jpg') }}"  class="img-circle img-sm" alt="User Image">
                            @elseif ($coments->user->gender == 'Mujer' )
                                <img src="{{ asset('/img/default_female.jpg') }}" class="img-circle img-sm" alt="User Image">
                            @else
                                <img src="{{ asset('/img/default_other.jpg') }}" class="img-circle img-sm" alt="User Image">
                            @endif
                        @endif
                        <div class="comment-text">
                            <span class="usernamecom">{{ $coments->user->name.' '.$coments->user->surname }}
                                @if ($coments->user->id == $user->id)
                                    <span><a class="clcoment" id="close-comment" href="{{ route('delcoment', $coments->id) }}"><i class="fa fa-close fright fa-lg"></i></a></span>
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

                <div class="box-footer" style="display: block;" data-idpost="{{$post[$i]->id}}">
                    <form action="{{ route('comment.add', $post[$i]->id) }}" method="post" id="form-add-comment">
                        {{ csrf_field() }}
                        @if($user->avatar)
                            <img  src="{{ $user->avatar }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                        @else
                            @if ($user->gender == 'Hombre')
                                <img src="{{ asset('/img/default_male.jpg') }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                            @elseif ($user->gender == 'Mujer' )
                                <img src="{{ asset('/img/default_female.jpg') }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                            @else
                                <img src="{{ asset('/img/default_other.jpg') }}" class="img-responsive img-circle img-sm" alt="Alt Text">
                            @endif
                        @endif
                        <div class="img-push">
                            <input id="add-comment" type="text" name="coment" class="form-control input-sm {{ ($post[$i]->user->id == $user->id)? 'bordered-palegreen': 'bordered-sky' }}" placeholder="Presiona Enter para comentar" autocomplete="off">
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

    <div class="modalox"></div>

</div> {{--fin del contenedor del post--}}
 {{-- Modal Box para editar post --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #222222;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color: #94d500;">Editar Post</h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" name="post-body" id="post-body" rows="4"></textarea>
                    </div>
                    <div class="modal-footer" style="background-color: #222222;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" id="modal-save">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script>
            var token = '{{ Session::token() }}';
            var urledit = '{{ route('edition') }}';
            var urldelete = '{{ route('delete') }}';
            var urllike = '{{ route('islike') }}';
            {{--var assetImg = '{{ asset('/img') }}';--}}
            var urlDelComment = '{{ route('delcoment',':commentId') }}';
            var urlCreatePost = '{{ route('posting') }}';
            {{--var urlImg = '{{ asset('/img') }}';--}}
            var urlImg = '';
            var urlAddComment = '{{ route('comment.add',':postId') }}';
        </script>

@endsection

@section('plugin')
    <script type="text/javascript" src="{{ asset('/js/navanim.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/file_input_init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap_file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/postmodal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/closepost.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/edit_post.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/delete_post.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/like_post.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/add_comment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/delete_comment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/create_post.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/reload_js.js') }}"></script>

@endsection