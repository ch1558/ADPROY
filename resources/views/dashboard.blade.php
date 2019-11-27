@extends('layouts.base')

@section('title','Información Personal')

@section('content')
    <!-- CONTENIDO DE DATOS PERSONALES -->
    <div class="content-wrapper" style="min-height: 808px;">
        <!--Titulo-->
        <section class="content-header"> 
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!--Contenido del titulo-->
            <h1>
                Información personal <small>Consulte su información personal</small>
                <span class="text-muted pull-right" style="font-size: 10px;"></span>
            </h1>
        </section>
        <!-- Contenido principal -->
        <section class="content">
            <!--CONSULTA LOS DATOS PERSONALES DEL ESTUDIANTE -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h2 class="box-title">Datos Personales</h2>
                </div>
                <div class="box-body no-padding clearfix">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center margin">
                                <!--Aca debe ir el link de la imagen-->
                                <img src="{{ asset('images/foto_default.JPEG') }}" class="user-image img-circle img-thumbnail"
                                    alt="User Image" style="max-width: 200px;max-height: 200px;">
                            </div>
                        </div>
                        <div class="col-md-9" style="padding: 10px 30px 10px 10px;">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-condensed table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Documento</th>
                                            <td>{{ auth()->user()->cedula }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nombres</th>
                                            <td>{{ auth()->user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Apellidos</th>
                                            <td>{{ auth()->user()->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Correo Electrónico</th>
                                            <td>{{ auth()->user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>@if(auth()->user()->estado==1||auth()->user()->rol==2) Nombre del Departamento @else Nombre de la Carrera @endif</th>
                                            @for($j=0; $j < sizeof($dependencias); $j++)
                                                @if(auth()->user()->codigo_dependencia == $dependencias[$j]->codigo_dependencia)
                                                    <td>{{ $dependencias[$j]->nombre_dependencia }}</td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th>Codigo</th>
                                            <td>{{ auth()->user()->codigo_especifico }}</td>
                                        </tr>
                                        <tr>
                                            <th>Rol</th>
                                            @for($j=0; $j < sizeof($roles); $j++)
                                                @if(auth()->user()->rol == $roles[$j]->codigo_rol)
                                                    <td>{{ $roles[$j]->nombre_rol }}</td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th>Creado en el sistema</th>
                                            <td>{{ auth()->user()->created_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
@endsection
