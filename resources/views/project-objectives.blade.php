@extends('layouts.base')
@section('title', 'ADPROY')
@section('content')
@if (session('status')=='¡Fecha de inicio incorrecta!' || session('status')=='¡Fecha de final incorrecta!' || session('status')=='¡Fecha de real incorrecta!' || session('status')=='¡No tiene proyectos activos!' || session('status')=='¡Está superando la cantidad de objetivos!')
    <script language="JavaScript">alert('<?php echo session('status') ?>')</script>
@endif
<div class="content-wrapper" style="min-height: 819px;">
    <section class="content-header">
        <!-- Alertas  -->
        <div id="template_alerts"></div>

        <!-- Content Header (Page header) -->
        <h1>Establecer objetivos del anteproyecto<small>Describe los objetivos</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-edit"></i> Datos de los objetivos
            </div>
            <!-- Listado de los proyectos -->
           
            <form method="POST" action="{{ route('project-objectives') }}">
                @csrf
                <div class="row">
                      <div class="box-header with-border">
                        <i class="fa fa-check" style="margin-left:20px"></i> Objetivo
                     </div>
                    <div class="col-md-7">
                    <textarea id="Datos1" name="nombre" class="form-control" rows="2" placeholder="Ingrese el nombre del objetivo" style="height: 40px; margin:10px" required="required"></textarea>
                        <textarea id="Datos1" name="observacion" class="form-control" rows="3" placeholder="Ingrese las observaciones de su objetivo" style="margin:10px; height:160px" required="required"></textarea>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="div-borde input-group mb-3" style="width: 100%;margin: 5px;padding: 1px 10px 0px 10px;">
                                <p>Fecha Inicio:</p>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" step="1" style="border-left: 0px;border-right: 0px;padding: 1px;" required="required">
                                 </div>
                        </div>
                        <div class="row">
                            <div class="div-borde input-group mb-3" style="width: 100%;margin: 5px;padding: 1px 10px 0px 10px;">
                                <p>Fecha Final:</p>
                                <input type="date" id="fecha_final" name="fecha_final" class="form-control" step="1" style="border-left: 0px;border-right: 0px;padding: 1px;" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="div-borde input-group mb-3" style="width: 100%;margin: 5px;padding: 1px 10px 0px 10px;">
                                <p>Fecha Real:</p>
                                <input type="date" id="fecha_real" name="fecha_real" class="form-control" step="1" style="border-left: 0px;border-right: 0px;padding: 1px;" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-footer">
                        <div class="clearfix text-right">
                            <button name="accion" type="submit" class="btn btn-primary" value="registro" style="padding2%;">
                                <i class="fa fa-check"></i> Enviar objetivo.
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
@endsection