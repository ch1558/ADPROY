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
                Listado de anteproyecto en juicio<small>Estado de anteproyectos</small>
            </h1>
        </section>

            <section class="content" style="min-height: 5px !important">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-edit"></i> Anteproyectos
                    </div>
                    <div class="box-body no-padding">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Nombre Anteproyecto</th>
                            <th class="col" scope="col">Jurado 1</th>
                            <th class="col" scope="col">Jurado 2</th>
                            <th class="col" scope="col">Jurado 3</th>
                            <th class="col" scope="col">Porcentaje</th>
                            <th class="col" scope="col">Tiempo</th>
                            </tr>
                        </thead>
                            <form method="POST" action="">
                                @csrf
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td>Alertas temprano un proyecto todo hardcore</td>
                                        <td style="background-color:#f99d4c; color:#fff; width:100px;">Brayan arias</td>
                                        <td style="background-color:#39dda7; color:#fff; width:100px;">Karen Brigid</td>
                                        <td style="background-color:#39dda7; color:#fff; width:100px">Juan Camilo</td>
                                        <td>20%</td>
                                        <td>03:23:21</td>
                                    </tr>
                                </tbody>
                            </form>
                    </table>
                </div>
            </section> 
       
            

    </div>
@endsection
