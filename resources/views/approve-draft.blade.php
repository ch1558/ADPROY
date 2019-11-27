@extends('layouts.base')

<<<<<<< HEAD
@section('title', 'Calificación de un anteproyecto')
=======
@section('title', 'Verificación de Anteproyectos')
>>>>>>> 2270bfc705cf9a15612500203fc51b14b282e8f5

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!-- Content Header (Page header) -->
            <h1>
                Calificación de Anteproyecto<small>Información basica del anteproyectos</small>
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
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Titulo</th>
                            <th class="col" scope="col">Resumen</th>
                            <th class="col" scope="col">Autores</th>
                            <th class="col" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        
                        @for ($i=0; $i < sizeof($drafts); $i++)
                            @if ($i%2!=0)
                                <tr class="active">
                            @else
                                <tr>
                            @endif
                            <th scope='row'>{{ $i+1 }}</th>
                            <td>{{ $drafts[$i]->titulo_anteproyecto }}</td>
                            <td>{{ $drafts[$i]->resumen_anteproyecto }}</td>
                            <td>

                            @for ($j=0; $j < sizeof($autores); $j++)
                                @if ($autores[$j][0]==$drafts[$i]->codigo_anteproyecto)
                                    @for ($k=0; $k < sizeof($estudiantes); $k++)
                                        @if ($autores[$j][1]==$estudiantes[$k]->id)
                                            <li>{{ $estudiantes[$k]->name }} {{ $estudiantes[$k]->last_name }}</li>
                                        @endif
                                    @endfor
                                @endif
                            @endfor
                            </td>

                            <td style="width:30%;">
                                <button id="subir" class="btn btn-primary" data-toggle="modal" data-target="#registrar" ><i class="fa fa-user-circle"></i><i> Emitir Decision</i></button>
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