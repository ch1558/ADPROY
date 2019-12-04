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
                Listado de Usuarios<small>pendientes de verificación</small>
            </h1>
        </section>

        @if( sizeof($estudiantes) >= 1)
            <section class="content" style="min-height: 5px !important">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-edit"></i> Datos de Estudiantes
                    </div>
                    <div class="box-body no-padding">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Nombre</th>
                            <th class="col" scope="col">Apellido</th>
                            <th class="col" scope="col">Código</th>
                            <th class="col" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($estudiantes as $item)
                            <form method="POST" action="{{ route('validation') }}">
                                @csrf
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->codigo_especifico }}</td>
                                        <input name="codigo_usuario" value="{{ $item->id }}" hidden="true">
                                        <td style="width:30%;">
                                            <button name="accion" value="aceptar" class="btn btn-success" type="submit"><i class="fa fa-check"></i><i> Aceptar</i></button>
                                            <button name="accion" value="rechazar" class="btn btn-danger" type="submit"><i class="fa fa-close"></i><i> Denegar</i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                        @endforeach
                    </table>
                </div>
            </section> 
        @endif

        @if( sizeof($docentes) >= 1 && auth()->user()->rol == 1)
            <section class="content" style="min-height: 5px !important">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-edit"></i> Datos de Docentes
                    </div>
                    <div class="box-body no-padding">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Nombre</th>
                            <th class="col" scope="col">Apellido</th>
                            <th class="col" scope="col">Código</th>
                            <th class="col" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($docentes as $user)
                            <form method="POST" action="{{ route('validation') }}">
                                @csrf
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->codigo_especifico }}</td>
                                        <input name="codigo_usuario" value="{{ $user->id }}" hidden="true">
                                        <td style="width:30%;">
                                            <button name="accion" value="aceptar" class="btn btn-success" type="submit"><i class="fa fa-check"></i><i> Aceptar</i></button>
                                            <button name="accion" value="rechazar" class="btn btn-danger" type="submit"><i class="fa fa-close"></i><i> Denegar</i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                        @endforeach
                    </table>
                </div>
            </section>    
        @endif

    </div>
    
@endsection
