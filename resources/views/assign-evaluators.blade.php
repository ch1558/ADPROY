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
                Asignación de Anteproyecto<small>Informacion basica de anteproyectos</small>
                <span class="text-muted pull-right" style="font-size: 10px;">Martes 04 de Junio de 2019</span>
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
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col" style="width:20%">Título</th>
                            <th class="col" scope="col" style="width:35%">Resumen</th>
                            <th class="col" scope="col" style="width:15%">Tema</th>
                            <th class="col" scope="col" style="width:15%">Director</th>
                            <th class="col" scope="col" style="width:15%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        <tr>
                        @for ($i=0; $i < sizeof($ownDrafts); $i++)
                            @if ($i%2!=0)
                                <tr class="active">
                            @else
                                <tr>
                            @endif
                            <th scope='row'>{{ $i+1 }}</th>
                            <td>{{ $ownDrafts[$i]->titulo_anteproyecto }}</td>
                            <td>{{ $ownDrafts[$i]->resumen_anteproyecto }}</td>
                            <td>{{ $ownThemes[$i][0]->nombre_tema }}</td>

                            <td>
                                @for ($j = 0; $j < sizeof($ownDirectors); $j++)
                                    @if ($ownDirectors[$j][2]==$ownDrafts[$i]->codigo_anteproyecto)
                                        <li>{{ $ownDirectors[$j][0] }} {{ $ownDirectors[$j][1] }}</li>
                                    @endif
                                @endfor
                            </td>

                            <td style="width:30%;">
                                <button id="subir" class="btn btn-primary" data-toggle="modal" data-target="#registrar" ><i class="fa fa-user-circle"></i><i> Asignar Jurados </i></button>
                            </td>
                        @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
