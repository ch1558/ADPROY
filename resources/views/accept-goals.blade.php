@extends('layouts.base')
@section('title', 'Objetivos por verificar')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!-- Content Header (Page header) -->
            <h1>
                Listado de objetivos<small> Pendientes de verificación</small>
            </h1>
        </section>

            <section class="content" style="min-height: 5px !important">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-edit"></i> Objetivos de anteproyectos
                    </div>
                    <div class="box-body no-padding">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th class="col" scope="col" style="width:2%;">#</th>
                            <th class="col" scope="col" style="width:25%;">Nombre Anteproyecto</th>
                            <th class="col" scope="col" style="width:13%;">Nombre Objetivo</th>
                            <th class="col" scope="col" style="width:10%;">Descripción</th>
                            <th class="col" scope="col" style="width:10%;">F. Inicio</th>
                            <th class="col" scope="col" style="width:10%;">F. Final</th>
                            <th class="col" scope="col" style="width:10%;">F. Real</th>
                            <th class="col" scope="col" style="width:20%;">Acciones</th>
                            </tr>
                        </thead>
                            
                                <tbody>
                                    @php $indice=1; @endphp
                                    @for ($i = 0; $i < sizeof($ownObjectives); $i++)
                                        @for ($j = 0; $j < sizeof($ownObjectives[$i]); $j++)
                                            <form method="POST" action="{{ route('accept-goals') }}">
                                                @csrf
                                                @if($i%2!=0)
                                                    <tr class="active">
                                                @else 
                                                    <tr>
                                                @endif
                                                    <th scope="row">{{$indice}}</th>
                                                    <td>{{$ownDrafts[$i][0]->titulo_anteproyecto}}</td>
                                                    <td>{{$ownObjectives[$i][$j]->nombre}}</td>
                                                    <td>{{$ownObjectives[$i][$j]->observaciones}}</td>
                                                    <td>{{$ownObjectives[$i][$j]->fecha_inicio}}</td>
                                                    <td>{{$ownObjectives[$i][$j]->fin}}</td>
                                                    <td>{{$ownObjectives[$i][$j]->fin_real}}</td>
                                                    <td style="width:30%;">
                                                        <input type="text" name='hito' value='{{$ownObjectives[$i][$j]->codigo}}' hidden="true">
                                                        <button name="accion" value="aceptar" class="btn btn-primary" type="submit"><i class="fa fa-check"></i><i> Aceptar</i></button>
                                                        <button name="accion" value="rechazar" class="btn btn-primary" type="submit"><i class="fa fa-close"></i><i> Denegar</i></button>
                                                    </td>
                                                </tr>
                                            </form>
                                            @php $indice++; @endphp
                                        @endfor
                                    @endfor
                                </tbody>
                            </form>
                    </table>
                </div>
            </section> 
    </div>
@endsection
@section('scripts')
@endsection
