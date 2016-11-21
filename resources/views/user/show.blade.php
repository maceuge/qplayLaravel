@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="css/usuario.css" type="text/css" />
    <link rel="stylesheet" href="css/file-input.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Te da la Bienvenida! <i class="fa fa-angellist"></i></p>
@endsection

@section('content')

    <?php
       $user = Auth::user();
       $fullname = $user->name.' '.$user->surname;
       $bands = $user->band;
       $inst = $user->instrument;
       $posts = $user->post;
    ?>

    <!-- COMIENZO DE LA FOTO -->
<div class="container usercover">
    <div class="row pull-bottom">
        <div class="col-md-2 col-sm-12">
            <img src="/img/user.jpg" class="img-square user center-block" alt="Usuario" width="150" height="150">
        </div>
        <div class="col-md-4 col-sm-12">
            <p class="username">{{ $fullname }}</p>
            <p class="mail">{{ $user->email }}</p>
        </div>
        <div class="col-md-3 col-md-offset-3 col-sm-12">
            <div class="botsub">
                <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                <label for="file-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <span class="iborrainputfile">Subir Avatar</span>
                </label>
            </div>
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
                        @forelse($bands as $band)
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
                    <h3 class="widget-caption">Amigos</h3>
                </div>
                <div class="widget-body bordered-top  bordered-red">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="img-grid" style="margin: 0 auto;">
                                <li>
                                    <a href="#">
                                        <img src="/img/user.jpg" alt="image" width="65" height="65">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/user.jpg" alt="image" width="65" height="65">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/user.jpg" alt="image" width="65" height="65">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/user.jpg" alt="image" width="65" height="65">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/img/user.jpg" alt="image" width="65" height="65">
                                    </a>
                                </li>
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
                        <button type="submit" class="btn btn-success pull-right">Post</button>
                        <ul class="nav nav-pills">
                            {{--<li><a href="#"><i class="fa fa-map-marker"></i></a></li>--}}
                            <li><a href="#"><i class="fa fa-camera"></i></a></li>
                            <li><a href="#"><i class=" fa fa-film"></i></a></li>
                            {{--<li><a href="#"><i class="fa fa-microphone"></i></a></li>--}}
                        </ul>
                    </div>
                </form>
            </div>

            @if(isset($postline))
                @forelse($posts as $post)
                    @if($postline->id == $post->id)
                    {{-- Lista de post realizados --}}
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="/img/user.jpg" alt="User Image">
                                <span class="usernamebox"><a href="#">{{ $fullname }}.</a></span>
                                <span class="description">Publicado - {{ $post->created_at }}</span>
                            </div>
                        </div>

                            {{--<div class="box-body" style="display: block;">--}}
                                {{--<form action="/posting" method="post" enctype="multipart/form-data">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<textarea class="form-control input-lg p-text-area" name="post" rows="2" placeholder="Que cuentas hoy?" maxlength="254">--}}
                                    {{--{{ $postline->$post }}--}}
                                {{--</textarea>--}}
                                {{--<a href="/edition/{{ $post->id }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>--}}
                                {{--<a href="/delete/{{ $post->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>--}}
                                {{--<span class="pull-right text-muted">0 Comentarios</span>--}}
                                {{--</form>--}}
                            {{--</div>--}}

                            <div class="box-body" style="display: block;">
                                {{--<img class="img-responsive show-in-modal" src="img/Post/young-couple-in-love.jpg" alt="Photo">--}}
                                <p>{{ $post->post }}</p>
                                <a href="/edit/{{ $post->id }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                <a href="/delete/{{ $post->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                                <span class="pull-right text-muted">0 Comentarios</span>
                            </div>


                        <div class="box-footer" style="display: block;">
                            <form action="#" method="post">
                                <img class="img-responsive img-circle img-sm" src="/img/user.jpg" alt="Alt Text">
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm" placeholder="Presiona Enter para comentar">
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                        {{-- Lista de post realizados --}}
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="/img/user.jpg" alt="User Image">
                                    <span class="usernamebox"><a href="#">{{ $fullname }}.</a></span>
                                    <span class="description">Publicado - {{ $post->created_at }}</span>
                                </div>
                            </div>
                            <div class="box-body" style="display: block;">
                                {{--<img class="img-responsive show-in-modal" src="img/Post/young-couple-in-love.jpg" alt="Photo">--}}
                                <p>{{ $post->post }}</p>
                                <a href="/edit/{{ $post->id }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                <a href="/delete/{{ $post->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                                <span class="pull-right text-muted">0 Comentarios</span>
                            </div>

                            <div class="box-footer" style="display: block;">
                                <form action="#" method="post">
                                    <img class="img-responsive img-circle img-sm" src="/img/user.jpg" alt="Alt Text">
                                    <div class="img-push">
                                        <input type="text" class="form-control input-sm" placeholder="Presiona Enter para comentar">
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endif
                @empty
                    <p>Sin posts actualmente</p>
                @endforelse


            @else
                @forelse($posts as $post)
                    {{-- Lista de post realizados --}}
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="/img/user.jpg" alt="User Image">
                                <span class="usernamebox"><a href="#">{{ $fullname }}.</a></span>
                                <span class="description">Publicado - {{ $post->created_at }}</span>
                            </div>
                        </div>

                        <div class="box-body" style="display: block;">
                            {{--<img class="img-responsive show-in-modal" src="img/Post/young-couple-in-love.jpg" alt="Photo">--}}
                            <p>{{ $post->post }}</p>
                            <a href="/edit/{{ $post->id }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                            <a href="/delete/{{ $post->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                            <span class="pull-right text-muted">0 Comentarios</span>
                        </div>

                        <div class="box-footer" style="display: block;">
                            <form action="#" method="post">
                                <img class="img-responsive img-circle img-sm" src="/img/user.jpg" alt="Alt Text">
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm" placeholder="Presiona Enter para comentar">
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Sin posts actualmente</p>
                @endforelse
            @endif



            {{-- Lista de post realizados  OJO ES SOLO UN MODELO A USAR  NOOO BORRARRR!!! --}}

            {{--<div class="box box-widget">--}}
                {{--<div class="box-header with-border">--}}
                    {{--<div class="user-block">--}}
                        {{--<img class="img-circle" src="/img/user.jpg" alt="User Image">--}}
                        {{--<span class="usernamebox"><a href="#">{{ $fullname }}.</a></span>--}}
                        {{--<span class="description">Publicado - 7:30 PM Hoy</span>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="box-body" style="display: block;">--}}
                    {{--<img class="img-responsive show-in-modal" src="img/Post/young-couple-in-love.jpg" alt="Photo">--}}
                    {{--<p>Hoy me levante con ganas de rockandroll baby! Que podemos hacer hoy?</p>--}}
                    {{--<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Compartir</button>--}}
                    {{--<button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Me Gusta</button>--}}
                    {{--<span class="pull-right text-muted">127 Me Gusta - 3 comentarios</span>--}}
                {{--</div>--}}
                {{--<div class="box-footer box-comments" style="display: block;">--}}
                    {{--<div class="box-comment">--}}
                        {{--<img class="img-circle img-sm" src="/img/user.jpg" alt="User Image">--}}
                        {{--<div class="comment-text">--}}
                                    {{--<span class="usernamebox">--}}
                                    {{--Maria Gonzales--}}
                                    {{--<span class="text-muted pull-right">8:03 PM Hoy</span>--}}
                                    {{--</span>--}}
                            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias corporis--}}
                            {{--dolores eius est facilis itaque quidem sapiente voluptate? Adipisci aperiam at--}}
                            {{--doloribus eveniet harum incidunt obcaecati provident sunt vero.--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="box-comment">--}}
                        {{--<img class="img-circle img-sm" src="/img/user.jpg" alt="User Image">--}}
                        {{--<div class="comment-text">--}}
                                    {{--<span class="usernamebox">--}}
                                    {{--Luna Stark--}}
                                    {{--<span class="text-muted pull-right">8:03 PM Hoy</span>--}}
                                    {{--</span>--}}
                            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias corporis--}}
                            {{--dolores eius est facilis itaque quidem sapiente voluptate? Adipisci aperiam at--}}
                            {{--doloribus eveniet harum incidunt obcaecati provident sunt vero.--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="box-footer" style="display: block;">--}}
                    {{--<form action="#" method="post">--}}
                        {{--<img class="img-responsive img-circle img-sm" src="/img/user.jpg" alt="Alt Text">--}}
                        {{--<div class="img-push">--}}
                            {{--<input type="text" class="form-control input-sm" placeholder="Presiona Enter para comentar">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}


        </div><!-- fin de la columna del medio -->

    </div>  {{--fin del row del post--}}
</div> {{--fin del contenedor del post--}}

@endsection

@section('plugin')
   <script type="text/javascript" src="/js/navanim.js"></script>
   <script type="text/javascript" src="/js/jquery.custom-file-input.js"></script>
@endsection