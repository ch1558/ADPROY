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
                Listado de objetivos<small>pendientes de verificación</small>
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
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Nombre Anteproyecto</th>
                            <th class="col" scope="col">Nombre Objetivo</th>
                            <th class="col" scope="col">Descricpion</th>
                            <th class="col" scope="col">F. Inicio</th>
                            <th class="col" scope="col">F. Final</th>
                            <th class="col" scope="col">F. Real</th>
                            </tr>
                        </thead>
                            <form method="POST" action="">
                                @csrf
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <input name="codigo_usuario" value="" hidden="true">
                                        <td style="width:30%;">
                                            <button name="accion" value="aceptar" class="btn btn-primary" type="submit"><i class="fa fa-check"></i><i> Aceptar</i></button>
                                            <button name="accion" value="rechazar" class="btn btn-primary" type="submit"><i class="fa fa-close"></i><i> Denegar</i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                    </table>
                </div>
            </section> 
       
            

    </div>
@endsection
@section('scripts')
@endsection
