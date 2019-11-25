@extends('layouts.base')

@section('title', 'ADPROY')

@section('content')
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <div id="template_alerts">
            </div>
            <h1>Listado de Proyectos<small>Histórico de los proyectos presentados</small></h1>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-book"></i> Mis proyectos
                </div>

                <!-- Listado de los proyectos -->
                <div class="box-body no-padding">

                    <div class="table-responsive" style="margin: 15px;">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th style="width:70%;">Titulo</th>
                                    <th style="width:15%;">Estado</th>
                                    <th style="width:5%;"></th>
                                    <th style="width:5%;">Acciones</th>
                                    <th style="width:5%;"></th>

                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle;">
                                @for($i=0 ; $i < sizeof($drafts); $i++)
                                    @if($i%2!=0)
                                        <tr class="active">
                                    @else
                                        <tr>
                                    @endif
                                        <td>{{ $drafts[$i][0]->titulo_anteproyecto }}</td>
                                        @for($j=0; $j < sizeof($estados); $j++ )
                                            @if($drafts[$i][0]->codigo_estadoante == $estados[$j]->codigo_estadoante)
                                                <td>{{ $estados[$j]->nombre_estadoante }}</td>
                                            @endif
                                        @endfor
                                        <td><button id="bajar" class="btn btn-info"><i class="fa fa-download"></i><i> Documentos</i></button></td>
                                        <td><button id="bajar" class="btn btn-warning" data-toggle="modal" data-target="#editar"><i class="fa fa-edit"></i><i> Editar</i></button></td>
                                        <td><button id="subir" class="btn btn-success" data-toggle="modal" data-target="#registrar"><i class="fa fa-send"></i><i> Enviar</i></button></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>

    <!--Modal Editar-->
    <div class="modal fade" id="editar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#dd4b39;">
                    <a class="fa fa-remove" data-dismiss="modal" style="color:#fff; float:right; cursor:pointer;"></a>
                </div>

                <div class="row" style="margin:0%;">
                    <div class="col-sm-12 col-md-12" style="padding-right: 0px; padding-left: 0px;">
                        <div style="background-color:rgb(241, 240, 240);">

                            <div class="caption" style="background-color:rgb(241, 240, 240); margin: 0px 0px 0px 0px; height:250%;">
                                <section class="content">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <i class="fa fa-times-circle"></i> Cancelar anteproyecto
                                        </div>
                                        <div class="box-footer clearfix text-center">
                                            <button id="bajar" class="btn btn-danger" style="width: 200px;"><i class="fa fa-trash"></i><i>Cancelar anteproyecto</i></button>
                                        </div>
                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <i class="fa fa-pencil-square-o"></i> Editar datos del anteproyecto
                                        </div>
                                        <form>
                                            <!-- Listado de los proyectos -->
                                            <div class="box-body no-padding">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <textarea id="datos1" class="form-control" rows="3" placeholder="Titulo" style="height: 50px;" required="required"></textarea>
                                                        <textarea id="datos1" class="form-control" rows="3" placeholder="Resumen" required="required"></textarea>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            <select id="Documento" class="Borde" name="Tipo Documento" required="required">
                                                                    <option value="C.C" >Linea de Investigación</option>
                                                                    <option value="C.E">C.E</option>
                                                                    <option value="T.P">T.P</option>
                                                                </select>
                                                        </div>
                                                        <div class="row">
                                                            <select id="Documento1" class="Borde" name="Tipo Documento">
                                                                    <option value="C.C">Grupo de Investigación</option>
                                                                    <option value="C.E">C.E</option>
                                                                    <option value="T.P">T.P</option>
                                                                </select>
                                                            <select id="Documento1" class="Borde" name="Tipo Documento" required="required">
                                                                    <option value="C.C">Modalidad</option>
                                                                    <option value="C.E">C.E</option>
                                                                    <option value="T.P">T.P</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="box-header with-border" style="text-align: center;">
                                                    <i class="fa fa-users"></i> Información de los autores

                                                </div>
                                                <div class="row" style="text-align: center;">
                                                    <div class="col-md-6">
                                                        <div>
                                                            <i class="fa fa-user-plus"></i> Autores
                                                            <select id="Documento2" class="Borde" name="Tipo Documento">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                        </div>
                                                        <div>
                                                            <input class="Borde" style="width:100%; padding:1%;" type="text" class="form-control" placeholder="Código de autor" id="documento" name="Email" maxlength="12" value="" required="required">
                                                            <input class="Borde" style="width:100%; padding:1%;" type="text" class="form-control" placeholder="Código de autor" id="documento" name="Email" maxlength="12" value="" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <i class="fa fa-legal"></i> Directores
                                                            <select id="Documento2" class="Borde" name="Tipo Documento">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                            <div>
                                                            </div>

                                                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Nombre de director" id="documento" name="Email" maxlength="12" value="" required="required">
                                                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Nombre de director" id="documento" name="Email" maxlength="12" value="" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Listado de los proyectos -->

                                            <!--Botones-->
                                            <div class="clearfix text-center box-footer">

                                                <button id="bajar" class="btn btn-primary" style="margin-top: 5%; width: 200px;"><i class="fa fa-hdd-o"></i><i>Actualizar información</i></button>

                                            </div>
                                        </form>

                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal editar-->

    <!--Modal registrar-->
    <div class="modal fade" id="registrar" role="dialog">
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
                                            <i class="fa fa-upload"></i> Adjuntar archivos
                                        </div>
                                        <div class=" box-footer clearfix text-center ">
                                            <h3>Adjuntar Archivos</h3>
                                            <hr style="border-bottom-style: dotted; border-bottom-width: 4px; ">
                                            <div>
                                                <button id="bajar " class="btn btn-primary " style="margin-top: 5%; width: 180px; margin-right: 5%; "><i class="fa fa-hdd-o "></i>&nbsp;<i>Guardar sin enviar</i></button>

                                                <button id="bajar " class="btn btn-success " style="margin-top: 5%; width: 180px; "><i class="fa fa-share "></i>&nbsp;<i>Enviar al comité</i></button>
                                            </div>
                                        </div>
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
    <script> $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })</script>
@endsection
