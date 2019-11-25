@extends('layouts.credenciales')

@section('content')
    <div class="login-box2">
        <!--Banner principal-->
        <div class="login-logo no-margin">
            <img class="img-responsive center-block" src="{{ asset('images/BannerPeq.png') }}">
        </div>

        <!--Login-->
        <div class="login-box-body">

            <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>
            @if( $error[0] == "datos incorrectos")
                <p class="login-box-msg" style="font-style:italic;color: #f6001c;padding: 3px;">¡OJO Datos incorrectos!</p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!--Codigo-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-user icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu codigo de la universidad"></span>
                    </div>
                    <input type="text" class="Borde form-control" placeholder="Codigo" aria-label="Codigo" name="codigo" maxlength="7" required="required" aria-describedby="basic-addon1">
                </div>

                <!--Documento-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-user icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu documento de identidad"></span>
                    </div>
                    <input type="password" class="Borde form-control" placeholder="Documento" aria-label="documento" name="documento" maxlength="15" required="required" maxlength="7" required="required" aria-describedby="basic-addon1">
                </div>

                <!--Contraseña-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-lock icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar la contraseña establecida para este portal"></span>
                    </div>
                    <input type="password" class="Borde form-control" placeholder="Contraseña" aria-label="contrasena" name="contrasena" maxlength="32" required="required" maxlength="7" required="required" aria-describedby="basic-addon1">
                </div>


                <!--Rol
                <div class="form-group has-feedback input-login" style="display:flex;">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a class=" " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Docente">
                            <div class="text-center">
                                <span aria-hidden="true" class="text-danger icon-people icon hvr-grow fa-3x"></span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Estudiante">
                            <div class="text-center">
                                <span aria-hidden="true" class="text-danger icon-notebook icon hvr-grow fa-3x"></span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Coordinador">
                            <div class="text-center">
                                <span aria-hidden="true" class="text-danger icon-user-following icon hvr-grow fa-3x"></span>
                            </div>
                        </a>
                    </div>
                </div>
                -->

                <button id="boton" type="submit" class="btn btn-danger btn-block btn-flat">Iniciar Sesión</button>

                <div style="margin: 10px 0px 0px;display: flex;">

                    <span style="margin: 5px auto 5px 0px;">
                        <a href="#" class="text-danger">
                            <span style="color:#d9534f;" tabindex="0" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu codigo de la universidad">
                                <i class="fa fa-question-circle"></i>  ¿Olvidaste tu clave?
                            </span>
                        </a>
                    </span>

                    <span style="margin: 5px 0px 5px auto;">
                        <a href="{{ route('register') }}" class="text-danger">
                            <span style="color:#d9534f;" tabindex="0" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu codigo de la universidad">
                                <i class="fa fa-check-square"></i>  ¡Registrate!
                            </span>
                        </a>
                    </span>
                </div>

                <div class="col-xs-12 center-block" style="margin-top: 20px;"></div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <div class="backstretch"
        style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 778px; width: 1440px; z-index: -999999; position: fixed;">
        <img src="{{ asset('images/fondo3.jpg') }}"
            style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1440px; height: 1080px; max-width: none; z-index: -999999; left: 0px; top: -151px;">
    </div>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
