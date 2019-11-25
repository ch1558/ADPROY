@extends('layouts.base')

@section('title', 'ADPROY')

@section('content')
<div class="content-wrapper" style="min-height: 819px;">
    <section class="content-header">
        <!-- Alertas  -->
        <div id="template_alerts"></div>

        <!-- Content Header (Page header) -->
        <h1>Subir anteproyecto<small>Información básica del anteproyecto</small>
            <span class="text-muted pull-right" style="font-size: 10px;">Martes 04 de Junio de 2019</span>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-edit"></i> Datos del Anteproyecto
            </div>

            <!-- Listado de los proyectos -->
            <form method="POST" action="{{ route('upload-draft') }}">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <textarea id="Datos1" name="titulo" class="form-control" rows="2" placeholder="Ingrese el titulo del proyecto" style="height: 40px; margin:10px" required="required"></textarea>
                        <textarea id="Datos1" name="resumen" class="form-control" rows="3" placeholder="Ingrese el resumen de su propuesta de investigación" style="margin:10px" required="required"></textarea>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="div-borde input-group mb-3" style="width: 100%;margin: 5px;padding: 10px 10px 0px 10px;">
                                <select id="lineaInvestigacion" class="Borde custom-select mr-sm-2" name="lineaInvestigacion" style="padding: 5px;">
                                    <option id="Documento1"selected>Seleccione linea de investigacion</option>
                                    @for($i=0; $i < sizeof($lineas); $i++)
                                        <option value="{{ $lineas[$i]->codigo_tema }}" >{{ $lineas[$i]->nombre_tema }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="div-borde input-group mb-3" style="width: 100%;margin: 5px;padding: 10px 10px 0px 10px;">
                                <select id="grupo" class="Borde custom-select mr-sm-2" name="grupo" style="padding: 5px;">
                                    <option id="Documento1"selected>Seleccione grupo de investigacion</option>
                                    @for($i=0; $i < sizeof($grupos); $i++)
                                        <option value="{{ $grupos[$i]->codigo }}" >{{ $grupos[$i]->siglas }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="div-borde input-group mb-3" style="width: 100%;margin: 5px;padding: 10px 10px 0px 10px;">
                                <select id="modalidad" class="Borde custom-select mr-sm-2" name="modalidad" style="padding: 5px;">
                                    <option id="Documento1"selected>Seleccione modalidad</option>
                                    @for($i=0; $i < sizeof($modalidad); $i++)
                                        <option value="{{ $modalidad[$i]->codigo_modalidad }}" >{{ $modalidad[$i]->nombre_modalidad }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informacion de lo autores -->
                <div class="box-header with-border" style="text-align: center;margin:15px">
                    <i class="fa fa-users"></i> Información de los autores
                </div>

                <div class="row" style="text-align: center;">
                    <div class="col-md-6">
                        <div style="width:180px; display:flex; margin: 8px auto;">
                        <p style="margin: 5px;padding: 0px 15px;"><i class="fa fa-user-plus"></i> Autores</p>
                            <div class="div-borde input-group mb-3" style="margin:4px">
                                <select id="autores" class="Borde custom-select mr-sm-2" name="autores" style="padding: 2px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código de autor" id="autor1" value="{{ auth()->user()->codigo_especifico }}" name="autor1" maxlength="7" readonly="readonly">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código de autor" id="autor2" name="autor2" maxlength="7">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código de autor" id="autor3" name="autor3" maxlength="7">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código de autor" id="autor4" name="autor4" maxlength="7">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código de autor" id="autor5" name="autor5" maxlength="7">
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div style="width:180px; display:flex; margin: 8px auto;">
                            <p style="margin: 5px;padding: 0px 15px;"><i class="fa fa-legal"></i> Directores</p>
                            <div class="div-borde input-group mb-3"  style="margin:4px">
                                <select id="directores" class="Borde custom-select mr-sm-2" name="directores" style="padding: 2px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código del director" id="director1" name="director1" maxlength="7" required="required">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código del director" id="director2" name="director2" maxlength="7">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código del director" id="director3" name="director3" maxlength="7">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código del director" id="director4" name="director4" maxlength="7">
                            <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Código del director" id="director5" name="director5" maxlength="7">
                       </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="box-footer">
                        <div class="clearfix text-right">
                            <button name="accion" type="submit" class="btn btn-primary" value="registro" style="padding2%;">
                                <i class="fa fa-check"></i> Crear Anteproyecto en el sistema.
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script>

        $( "#autor2" ).hide();
        $( "#autor3" ).hide();
        $( "#autor4" ).hide();
        $( "#autor5" ).hide();

        $("select[name=autores]").change(function(){
            $consulta = $('select[name=autores]').val();
            if($consulta == 1){
                $( "#autor2" ).hide();
                $( "#autor3" ).hide();
                $( "#autor4" ).hide();
                $( "#autor5" ).hide();
            }else if($consulta == 2){
                $( "#autor2" ).show();
                $( "#autor3" ).hide();
                $( "#autor4" ).hide();
                $( "#autor5" ).hide();
            }else if($consulta == 3){
                $( "#autor2" ).show();
                $( "#autor3" ).show();
                $( "#autor4" ).hide();
                $( "#autor5" ).hide();
            }else if($consulta == 4){
                $( "#autor2" ).show();
                $( "#autor3" ).show();
                $( "#autor4" ).show();
                $( "#autor5" ).hide();
            }else{
                $( "#autor2" ).show();
                $( "#autor3" ).show();
                $( "#autor4" ).show();
                $( "#autor5" ).show();
            }
            
        }); 
       
    </script>
    <script>

        $( "#director2" ).hide();
        $( "#director3" ).hide();
        $( "#director4" ).hide();
        $( "#director5" ).hide();

        $("select[name=directores]").change(function(){
            $consulta = $('select[name=directores]').val();
            if($consulta == 1){
                $( "#director2" ).hide();
                $( "#director3" ).hide();
                $( "#director4" ).hide();
                $( "#director5" ).hide();
            }else if($consulta == 2){
                $( "#director2" ).show();
                $( "#director3" ).hide();
                $( "#director4" ).hide();
                $( "#director5" ).hide();
            }else if($consulta == 3){
                $( "#director2" ).show();
                $( "#director3" ).show();
                $( "#director4" ).hide();
                $( "#director5" ).hide();
            }else if($consulta == 4){
                $( "#director2" ).show();
                $( "#director3" ).show();
                $( "#director4" ).show();
                $( "#director5" ).hide();
            }else{
                $( "#director2" ).show();
                $( "#director3" ).show();
                $( "#director4" ).show();
                $( "#director5" ).show();
            }
            
        }); 
    </script>
@endsection