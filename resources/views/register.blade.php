@extends('layouts.credenciales')

@section('content')
    <div class="login-box2">

       <!--Banner principal-->
       <div class="login-logo no-margin">
            <img class="img-responsive center-block" src="{{ asset('images/BannerPeq.png') }}">
        </div>

        

        <!--Registro-->
        <div class="login-box-body">
            <div id="template_alerts"></div>
            <!--<p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>-->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!--Documento-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <select id="TipoDocumento" class="Borde custom-select mr-sm-2" name="tipoDocumento">
                            <option value="1">C.C</option>
                            <option value="2">C.E</option>
                            <option value="3">T.P</option>
                        </select>
                    </div>
                    <input type="text" class="Borde form-control" placeholder="Documento" aria-label="documento" name="documento" maxlength="15" required="required" aria-describedby="basic-addon1">
                </div>

                <!--Nombre-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-user icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu documento de identidad"></span>
                    </div>
                    <input type="text" class="Borde form-control" placeholder="Ingresa tus nombres" aria-label="nombre" name="nombre" maxlength="250"  required="required" aria-describedby="basic-addon1">
                </div>
                
                <!--Apellido-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-user icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu documento de identidad"></span>
                    </div>
                    <input type="text" class="Borde form-control" placeholder="Ingresa tus apellidos" aria-label="apellido" name="apellido" maxlength="250" required="required" aria-describedby="basic-addon1">
                </div>

                <!--Email-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-envelope-letter icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar tu documento de identidad"></span>
                    </div>
                    <input type="text" class="Borde form-control" placeholder="Ingresa tu E-mail" aria-label="email" name="email" maxlength="250"  required="required" aria-describedby="basic-addon1">
                </div>

                <!--Contraseña-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-lock icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar la contraseña establecida para este portal"></span>
                    </div>
                    <input type="password" class="Borde form-control" placeholder="Ingresa tu contraseña" aria-label="contrasena" name="password" maxlength="32" required="required" minlength="8" aria-describedby="basic-addon1">
                </div>

                <!--Confirmar contraseña-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-lock icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar la contraseña establecida para este portal"></span>
                    </div>
                    <input type="password" class="Borde form-control" placeholder="Confirma tu contraseña" aria-label="recontrasena" name="password_confirmation" maxlength="32" required="required" minlength="8" aria-describedby="basic-addon1">
                </div>

                <!-- Check tipo Usuario -->
                <div class="form-group has-feedback" style="padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-check" style="padding-left: 0px;">
                                <p class="text-center" style="margin-bottom:5px;" for="gridCheck">Estudiante</p>
                                <div>
                                    <label style="padding: 2px 46.5px;" class="text-center form-check-label text-danger icon-graduation icon hvr-grow fa-3x" for="gridCheck"></label>
                                </div>
                            <input class="form-check-input" type="radio" id="gridCheck" name="tipoUsuario" value="3" style="margin:6px 66px;">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-check" style="padding-left: 0px;">
                                <p class="text-center" style="margin-bottom:5px;" for="gridCheck2">Docente</p>
                                <div>
                                    <label style="padding: 2px 46.5px;" class="text-center form-check-label text-danger icon-notebook icon hvr-grow fa-3x" for="gridCheck2"></label>
                                </div>
                            <input class="form-check-input" type="radio" id="gridCheck2" name="tipoUsuario" value="2" style="margin:6px 66px;">
                            </div>
                        </div>
                    </div>
                </div>

                
                <!--Dependencia-->
                <div class="div-borde input-group mb-3">
                    <select id="TipoDependencia" class="Borde custom-select mr-sm-2" name="dependencia">
                        <option selected>Seleccione</option>
                        @for( $i=0; $i < sizeof($dependencias); $i++ )
                            <option value="{{ $dependencias[$i]->codigo_dependencia }}">{{ $dependencias[$i]->nombre_dependencia }}</option>
                        @endfor
                    </select>
                </div>

                <!--Codigo-->
                <div class="div-borde input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="Borde input-group-text text-danger icon-target icon hvr-grow fa-3x" id="basic-addon1" style="background-color:#fff" data-toggle="tooltip" data-placement="top" title="Debes ingresar la contraseña establecida para este portal"></span>
                    </div>
                    <input type="text" class="Borde form-control" placeholder="Ingresa tu código" aria-label="codigo" name="codigo" maxlength="7" required="required" aria-describedby="basic-addon1">
                </div>

                <button id="boton" type="submit" class="btn btn-danger btn-block btn-flat">Registrarme</button>

                <div class="col-xs-12 center-block" style="margin-top: 15px;"></div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 778px; width: 1440px; z-index: -999999; position: fixed;">
        <img src="{{ asset('images/fondo2.jpg') }}" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1440px; height: 1080px; max-width: none; z-index: -999999; left: 0px; top: -181px;">
    </div>
@endsection