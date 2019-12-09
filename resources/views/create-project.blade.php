@extends('layouts.base')

@section('title','Creación de Proyectos')

@section('content')
    @if (session('status')=='¡El proyecto ya ha sido creado!')
        <script language="JavaScript">alert('<?php echo session('status') ?>')</script>
    @endif
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts"></div>
            <!-- Content Header (Page header) -->
            <h1>Subir Proyecto<small>Información básica del proyecto</small>
            </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-edit"></i> 
                    <h2 class="box-title">Datos del Proyecto</h2>
                </div>
    
                <!-- Listado de los proyectos -->
                <form method="POST" action="{{ route('create-project') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div id="comite-meet">
                        <div class="col-xs-11 col-md-3 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Duración del proyecto(meses)</label>
                            <input type="number" id="duracion" name="duracion" class="form-control" style="border-left: 0px;padding: 1px;" required="required" min="3" max="20" value='3'>
                        </div>
                                
                        <div class="col-xs-11  col-md-2 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Cantidad de objetivos</label>
                            <input type="number" id="hitos" name="hitos" class="form-control" style="border-left: 0px;padding: 1px;" required="required" min="3" max="20" value='3'>
                        </div>

                        <div class="col-xs-11  col-md-2 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Reunión del comité</label>
                            <select name="reunion" id="reunion" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                <option value="" selected> Seleccione una reunión </option>
                                @for ($i=0; $i<sizeof($meetings); $i++)
                                    <option value="{{$meetings[$i]->codigo_reunion}}">{{$meetings[$i]->fecha_reunion.' - '.$meetings[$i]->nombre_reunion}}</option>
                                @endfor
                            </select>
                        </div>
    
                        <div class="col-md-4 col-xs-11 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Cargar carta de aprobación</label>
                            <input type="file" id="carta" name="carta" style="padding: 5px;" required="required">
                            </div>
                    </div>
                    <div class="box-footer">
                        <div class="clearfix text-right">
                            <button id="accion" name="accion" type="submit" class="btn btn-success" value="registro" style="width: 250px;">
                                <i class="fa fa-check"></i> Crear Proyecto en el sistema.
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('change','input[type="file"]',function(){
            var fileName = this.files[0].name;
            var fileSize = this.files[0].size;
    
            if(fileSize > 10000000){
                alert('El archivo no debe superar los 10MB');
                this.value = '';
                this.files[0].name = '';
            }else{
                var ext = fileName.split('.').pop();
                switch (ext) {
                    case 'pdf': break;
                    default:
                        alert('El archivo no tiene la extensión adecuada');
                        this.value = ''; // reset del valor
                        this.files[0].name = '';
                }
            }
        });
    </script>
@endsection