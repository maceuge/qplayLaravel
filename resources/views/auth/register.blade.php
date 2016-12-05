@extends('layouts.home')

@section('css')
    <link rel="stylesheet" href="/css/register.css" type="text/css" />
@endsection

@section('navbar')
    <nav class="navbar navbar-inverse">
@endsection

@section('slogan')
    <p class="navbar-text font-farsan">Registrate y forma parte! <i class="fa fa-globe"></i></p>
@endsection

@section('content')

    <!-- COMIENZO DEL FORMULARIO REGISTRO Y SU CONTENIDO -->
    <div class="container-fluid regist">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h3 class="text-center font-comfortaa regtit">Registro</h3>

            <!-- Aqui empiza el formulario -->
                <form id="formreg" class="form" action="{{ url('/register') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                      <p class="errcript">{{ $errors->first('name') }}</p>
                                </span>
                            @endif
                            <div class="erro"><p class="error" id="error-nombre"></p></div>
                            <div class="form-group sp {{ $errors->has('name') ? ' onerrorph' : '' }}">
                                <input type="text" name="name" class="form-control" placeholder="Nombre" maxlength="30" value="{{ old('name') }}" autofocus>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            @if ($errors->has('surname'))
                                <span class="help-block">
                                     <p class="errcript">{{ $errors->first('surname') }}</p>
                                </span>
                            @endif
                            <div class="erro"><p class="error" id="error-apellido"></p></div>
                            <div class="form-group sp {{ $errors->has('surname') ? ' onerrorph' : '' }}">
                                <input type="text" name="surname" class="form-control" placeholder="Apellido" maxlength="30" value="{{ old('surname') }}">
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <p class="errcript">{{ $errors->first('email') }}</p>
                        </span>
                    @endif
                    <div class="erro"><p class="error" id="error-mail"></p></div>
                    <div class="form-group {{ $errors->has('email') ? ' onerrorph' : '' }}">
                        <input class="form-control" type="email" name="email" placeholder="Email" maxlength="55" value="{{ old('email') }}">
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                             <p class="errcript">{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                    <div class="erro"><p class="error" id="error-pass"></p></div>
                    <div class="form-group {{ $errors->has('password') ? ' onerrorph' : '' }}">
                        <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" maxlength="30">
                    </div>

                    <div class="erro"><p class="error" id="error-pass2"></p></div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repita su contrase&ntilde;a" maxlength="30">
                    </div>

                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Hombre" checked />Hombre
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Mujer" />Mujer
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Otro" />Otro
                        </label>

                    </div>

                    {{--aqui empieza la joda--}}

                    <div class="row">
                        <div class="erro"><p class="error" id="error-fecha"></p></div>
                        <div class="form-group">
                            <p class="titulos-form">Fecha de Nacimiento</p>
                            <div class="col-md-4 col-xs-12">
                                <label for="dianac">Dia</label>
                                <select class="form-control select" name="dianac" id="dianac" value="{{ old('dianac') }}">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <label for="mesnac">Mes</label>
                                <select class="form-control select" name="mesnac" id="mesnac" value="{{ old('mesnac') }}">
                                    <option value = "1">Enero</option>
                                    <option value = "2">Febrero</option>
                                    <option value = "3">Marzo</option>
                                    <option value = "4">Abril</option>
                                    <option value = "5">Mayo</option>
                                    <option value = "6">Junio</option>
                                    <option value = "7">Julio</option>
                                    <option value = "8">Agosto</option>
                                    <option value = "9">Septiembre</option>
                                    <option value = "10">Octubre</option>
                                    <option value = "11">Noviembre</option>
                                    <option value = "12">Diciembre</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <label for="anionac">A&ntilde;o</label>
                                <input class="form-control" type="number" name="anionac" id="anionac" placeholder="A&ntilde;o" value="{{ old('anionac') }}"  min="1930" max="2016" maxlength="4">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <p class="titulos-form">Que bandas te gustan?</p>
                            <div class="row row-padding">
                                <div id="bandas">
                                    <div class="col-xs-12 col-md-4">
                                        <input type="text" class="form-control" id="band" name="bandas[]" value="{{ old('bandas[]') }}" placeholder="Banda 1" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <button type="button" class="btn btn-banda" id="sumband"><i class="fa fa-plus-circle fa-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <p class="titulos-form">Tocas algun instrumento?</p>
                            <div class="row row-padding">
                                <div id="instrument">
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" class="form-control" name="inst[]" value="{{ old('inst[]') }}" placeholder="Instrumento 1" maxlength="30">
                                    </div>
                                    <div class="col-md-4 col-xs-8 instselect">
                                        <select class="form-control selcontenido" name="nivelinst[]">
                                            <option value="Principiante">Principiante</option>
                                            <option value="Intermedio">Intermedio</option>
                                            <option value="Avanzado">Avanzado</option>
                                            <option value="Experto">Experto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-4">
                                    <button type="button" class="btn btn-banda" id="suminst"><i class="fa fa-plus-circle fa-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-registrar center-block" id="registrar" name="button">Registrarme</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- COMIENZO DEL FOOTER -->

@endsection

@section('plugin')
    <script type="text/javascript" src="/js/validacion_register.js"></script>
@endsection
