@extends('layouts.base')

@section('title', 'Listado de Anteproyectos')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!-- Content Header (Page header) -->
            <h1>
                Listado de Anteproyectos<small>Histórico de los anteproyectos</small>
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
                <table class="table">
                    <thead class="thead-dark">
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
                                <td>{{ $drafts[$i]->titulo_anteproyecto }}</td>
                                    @for($j=0; $j < sizeof($estados); $j++ )
                                        @if($drafts[$i]->codigo_estadoante == $estados[$j]->codigo_estadoante)
                                            <td>{{ $estados[$j]->nombre_estadoante }}</td>
                                        @endif
                                    @endfor
                                </td>
                                <td></td>
                                <td><button id="bajar" class="btn btn-info"><i class="fa fa-download"></i><i> Descargar</i></button></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
