@extends('layouts.base')

@section('title','ADPROY')
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!-- Content Header (Page header) -->
            <h1>
                Verificación de reuniones<small>Informacion basica de las reuniones</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-edit"></i> Datos de la reunión
                </div>
                <!-- Listado de los proyectos #1BA67E-->
                <div class="box-body no-padding">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col" style="width:10%">Fecha</th>
                            <th class="col" scope="col" style="width:8%">Nombre</th>
                            <th class="col" scope="col" style="width:17%">Anteproyecto</th>
                            <th class="col" scope="col" style="width:20%">Descripción</th>
                            <th class="col" scope="col" style="width:20%">Observaciones</th>
                            <th class="col" scope="col" style="width:25%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        @for ($i=0; $i < sizeof($meets); $i++)
                        
                        <form method="POST" action="{{ route('approve-meetings') }}">
                            @csrf
                            <tbody>
                                @if ($i%2!=0)
                                    <tr class="active">
                                @else
                                    <tr>
                                @endif
                            
                                    <th scope='row'>{{ $i+1 }}</th>
                                    <td>{{ $meets[$i]->fecha_reunion }}</td>
                                    <td>{{ $meets[$i]->nombre_reunion }}</td>
                                    <td>{{ $ownDrafts[$i][0]->titulo_anteproyecto }}</td>
                                    <td>{{ $meets[$i]->descripcion_reunion }}</td>
                                    <td>{{ $meets[$i]->observacion }}</td>

                                    <td style="width:30%;">
                                        <input type="text" name='id' value='{{$meets[$i]->codigo_reunion}}' hidden="true">
                                        <button name="accion" value="aceptar" class="btn btn-success" type="submit"><i class="fa fa-check"></i><i> Aceptar</i></button>
                                        <button name="accion" value="rechazar" class="btn btn-danger" type="submit"><i class="fa fa-check"></i><i> Rechazar</i></button>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </form>
                        @endfor
                    </tbody>
                </table>
            </div>
        </section>
    <!-- /.content -->
</div>
    
@endsection