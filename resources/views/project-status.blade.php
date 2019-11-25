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
                Listado de proyectos<small>Estado de proyectos</small>
            </h1>
        </section>

            <section class="content" style="min-height: 5px !important">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-edit"></i> Proyectos
                    </div>
                    <div class="box-body no-padding">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Nombre Proyecto</th>
                            <th class="col" scope="col">Autores</th>
                            <th class="col" scope="col">Director</th>
                            <th class="col" scope="col">Co-directores</th>
                            <th class="col" scope="col">Grupo de investigación</th>
                            <th class="col" scope="col">Porcentaje</th>
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
                                    </tr>
                                </tbody>
                            </form>
                    </table>
                </div>
            </section> 
       
            

    </div>
@endsection
