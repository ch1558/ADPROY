@extends('layouts.base')

@section('title', 'ADPROY')

@section('content')
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <div id="template_alerts">
            </div>
            <h1>Listado de Proyectos<small>Histórico de los proyectos asignados</small></h1>
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
                                        <td></td>
                                        <td><button id="bajar" class="btn btn-info"><i class="fa fa-download"></i><i> Descargar</i></button></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script> $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })</script>
@endsection
