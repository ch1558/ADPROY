@extends('layouts.base')

@section('title', 'Asignación de jurados')

@section('content')

    @if (session('status'))
        <script language="JavaScript">alert('<?php echo session('status') ?>')</script>
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!-- Content Header (Page header) -->
            <h1>
                Asignación de Anteproyecto<small>Información basica de anteproyectos</small>
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
                                @php
                                    $id = $ownDrafts[$i]->codigo_anteproyecto;
                                @endphp
                                <button id="subir" onclick="agregarCodigo({{ $id }})" type = "submit" class="btn btn-primary" data-toggle="modal" data-target="#asignar" ><i class="fa fa-user-circle"></i><i> Asignar Jurados </i></button>
                            </td>
                        @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="asignar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#dd4b39;">
                    <a class="fa fa-remove" data-dismiss="modal" style="color:rgb(241, 240, 240); float:right; cursor:pointer;"></a>
                </div>
    
                <div class="row" style="margin:0% auto;">
                    <div class="col-sm-12 col-md-12" style="padding-left: 0px; padding-right: 0px;">
                        <div class="caption" style="background-color:rgb(241, 240, 240); margin: 0px 0px 0px 0px; height:250%;">
                            <section class="content">
                                <div style="background-color:rgb(241, 240, 240);">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <i class="fas fa-users"></i> Asignar jurados
                                        </div>
                                        <br>
                                        <form method="POST" action="{{ route('assign-evaluators') }}">
                                            @csrf
                                            <div class="box-body">
                                                @for ($i = 0; $i < 3; $i++)
                                                    <div class= "row text-left" style="margin: 2%">
                                                        <div class = "col-md-6 col-xs-12 col-sm-12"><i class = "fas fa-user-tie"></i><i> </i>Jurado {{$i+1}}:</div>
                                                        <select id="teachers" class="Borde custom-select mr-sm-2" name="teachers{{$i+1}}" style="padding: 5px;" required>
                                                            <option id="Documento1" value='' selected>Seleccione jurado</option>
                                                            @for($j=0; $j < sizeof($teachers); $j++)
                                                                <option value="{{ $teachers[$j]->id }}" >{{ $teachers[$j]->name.' '.$teachers[$j]->last_name }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                @endfor
                                            </div>
                                            <div class=" box-footer text-center ">
                                                <div>
                                                <input type="text" id="codigo" name="codigo" hidden="true">
                                                    <button id="bajar" type="submit" name="accion" value="aceptar" class="btn btn-primary " style="width: 180px; "><i class="fa fa-hdd-o "></i>&nbsp;<i>Guardar</i></button>
                                                    <br> <br>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script>
    function showInfoDraft(id) {
        let url = window.location.href;
        url = url.split('#')[0] + '#asignar?id=' + id;
        window.location.href = url;            
    }
</script>
@endsection