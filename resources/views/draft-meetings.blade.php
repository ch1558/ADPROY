@extends('layouts.base')

@section('title','ADPROY')
    
@section('content')
@php
    $mes = date('m');  
    $anio = date('Y');
    if($mes == "12"){
        $mes = 1;
        $anio++;
    } else {
        $mes++;
    }
  
@endphp
<!-- CONTENIDO DE DATOS PERSONALES -->
<div class="content-wrapper" style="min-height: 808px;">
    <!--Titulo-->
    <section class="content-header">
        <!-- Alertas  -->
        <div id="template_alerts">
        </div>
        <!--Contenido del titulo-->
        <h1>
            Reuniones de Anteproyectos -<small>Diligenciamiento de reuniones</small>
        </h1>
    </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h2 class="box-title">Formulario de registro</h2>
                </div>
                
                <form method="POST" action="{{ route('draft-meetings') }}">
                    @csrf
                    <div id="comite-meet">
                        
                        <div class="col-xs-11 col-md-2 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Fecha reunión</label>
                            <input type="date" id="fecha_nacimiento" name="fecha" class="form-control" step="1" style="border-left: 0px;border-right: 0px;padding: 1px;" required="required" min="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" max="<?php echo $anio.'-'.$mes.'-'.date('d'); ?>">
                        </div>
                            
                        <div class="col-xs-11  col-md-6 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Nombre de la reunión</label>
                            <input type="text" class="Borde form-control" placeholder="Nombre de la reunion" aria-label="nombre" name="nombre" maxlength="100"  required="required" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-md-3 col-xs-11 div-borde input-group mb-3" style="margin: 5px 15px;">
                            <label>Anteproyecto</label>
                            <select id="modalidad" class="Borde custom-select mr-sm-2" name="anteproyecto" style="padding: 5px;" required>
                                <option id="Documento1" value='' selected>Seleccione Anteproyecto</option>
                                @for($i=0; $i < sizeof($drafts); $i++)
                                    <option value="{{ $drafts[$i][0]->codigo_anteproyecto }}" >{{ $drafts[$i][0]->titulo_anteproyecto }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-11' style="padding: 5px;">
                            <label style="padding: 1px 25px;">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="2" placeholder="Ingrese la descripción del anteproyecto" style="height: 40px; margin: 10px 35px" required="required"></textarea>

                            <label style="padding: 1px 25px;">Observaciones</label>
                            <textarea id="observacion" name="observacion" class="form-control" rows="2" placeholder="Ingrese la descripción del anteproyecto" style="height: 40px; margin: 10px 35px" required="required"></textarea>
                        </div>
                    </div>

                    <div style="padding: 15px 40px;">
                        <button tupe="submit" class="btn btn-info" name="accion" value="ingresar" style="width:100%;">Registrar Reunión de Anteproyecto</button>
                    </div>
                </form>
            </div>
        </section>
</div>
@endsection