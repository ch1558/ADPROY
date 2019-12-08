@extends('layouts.base')

@section('title','Aprobación Anteproyectos')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 819px;">
<section class="content-header">
    <!-- Alertas  -->
    <div id="template_alerts">
    </div>
    <!-- Content Header (Page header) -->
    <h1>
        Verificación de Anteproyecto<small>Información básica de anteproyectos</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-edit"></i> Datos de anteproyectos
        </div>
        <!-- Listado de los proyectos #1BA67E-->
        <div class="box-body no-padding">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="col" scope="col" style="width:5%">#</th>
                    <th class="col" scope="col" style="width:55%">Título</th>
                    <th class="col" scope="col" style="width:30%">Tema</th>
                    <th class="col" scope="col" style="width:5%">Acciones</th>
                    <th class="col" scope="col" style="width:5%"></th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                <tr>
                @for ($i=0; $i < sizeof($drafts); $i++)
                    @if ($i%2!=0)
                        <tr class="active">
                    @else
                        <tr>
                    @endif
                    <th scope='row'>{{ $i+1 }}</th>
                    <td>{{ $drafts[$i]->titulo_anteproyecto }}</td>
                    <td>{{ $themes[$drafts[$i]->codigo_tema]->nombre_tema }}</td>

                    <td style="width:30%;">
                        @php
                            $datos = "'".$drafts[$i]->titulo_anteproyecto."','".$drafts[$i]->resumen_anteproyecto."','".$modalities[$drafts[$i]->codigo_modalidad]->nombre_modalidad."','".$groups[$drafts[$i]->codigo_grupo]->nombre."','".$themes[$drafts[$i]->codigo_tema]->nombre_tema."','".$drafts[$i]->codigo_anteproyecto."','".$directorsAuthors[$i][0]."','".$directorsAuthors[$i][1]."'";  
                        @endphp
                        <button id="subir" onclick="verificarAnteproyecto({{ $datos }})" type = "submit" class="btn btn-primary" data-toggle="modal" data-target="#verificar" ><i class="fa fa-user-circle"></i><i> Ver </i></button>
                    </td>
                    <td></td>
                @endfor
                </tr>
            </tbody>
        </table>
    </div>
</section>
<!-- /.content -->
</div>
<div class="modal fade" id="verificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#dd4b39;">
                <a class="fa fa-remove" data-dismiss="modal" style="color:rgb(241, 240, 240); float:right; cursor:pointer;"></a>
            </div>

            <div class="row" style="margin:0% auto;">
                <div class="col-sm-12 col-md-12" style="padding-left: 0px; padding-right: 0px;">
                    <div class="caption" style="background-color:rgb(241, 240, 240); margin: 0px 0px 0px 0px; height:250%;">
                        <section class="content">
                            <div style="background-color:rgb(241, 240, 240);">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <i class="fas fa-users"></i> Verificar anteproyecto
                                    </div>
                                    <form method="POST" action="{{ route('director-approve') }}">
                                        @csrf
                                        <div class=" box-footer text-center ">
                                            <label>Título</label>
                                            <p id="titulo"></p>
                                            <hr>
                                            <label>Resumen</label>
                                            <p id="resumen" style="text-align: justify; margin: 10px;"></p>
                                            <hr>
                                            <div id="comite-meet">
                                                <div class="col-md-6 col-xs-11">
                                                    <label>Tema</label> 
                                                    <p id="tema"></p> 
                                                </div>
                                                <div class="col-md-6 col-xs-11">
                                                    <label> Modalidad</label>
                                                    <p id="modalidad" ></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <label>Grupo</label>
                                            <p id="grupo" ></p>
                                            <hr>
                                            <div id="comite-meet">
                                                <div class="col-md-6 col-xs-11">
                                                    <label>Autor(es)</label><br>
                                                    <p id='autores'></p>
                                                </div>
                                                <div class="col-md-6 col-xs-11">
                                                    <label>Director(es)</label>
                                                    <p id="directores"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" box-footer text-center ">
                                            <div>
                                                <input type="text" id="codigo" name="codigo" hidden="true">
                                                <button id="accion" type="submit" name="accion" value="aceptar" class="btn btn-primary " style="width: 150px; "><i class="fa fa-check "></i>&nbsp;<i>Aprobar</i></button>
                                                <button id="accion" type="submit" name="accion" value="cancelar" class="btn btn-primary " style="width: 150px; "><i class="fa fa-close "></i>&nbsp;<i>Rechazar</i></button>
                                                <br> <br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
@endsection