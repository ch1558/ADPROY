@extends('layouts.base')

@section('title', 'ADPROY')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 819px;">
    <section class="content-header">
        <!-- Alertas  -->
        <div id="template_alerts">
        </div>
        <!-- Content Header (Page header) -->
        <h1>
            Historial de Anteproyectos<small>Información básica de anteproyectos</small>
            <span class="text-muted pull-right" style="font-size: 10px;">Martes 04 de Junio de 2019</span>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-edit"></i> Datos del Anteproyecto
            </div>
            <!-- Listado de los proyectos #1BA67E-->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail" style="background-color:#188F6C;padding:0px;">
                            <div class="row" style="min-height:70px; background-color:#149076;">
                            </div>
                            <div class="caption" style="background-color:#fff; margin:15px 0px 15px 0px; height:340px;">
                            <div class="clearfix text-center">
                                <h3>Thumbnail label</h3>
                                <hr style="border-bottom-style: dotted; border-bottom-width: 4px;">
                                <p><a href="#" class="btn btn-default" style="background-color:#188F6C;color:#fff;" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
