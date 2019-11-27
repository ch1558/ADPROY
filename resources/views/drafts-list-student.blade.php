@extends('layouts.base')

@section('title', 'ADPROY')

@section('content')




<div class="content-wrapper" style="min-height: 808px;">
    <section class="content-header">


        <h1>Listado de Anteproyectos<small>Histórico de los anteproyectos presentados</small></h1>

    </section>

    <section class="content">


        <div class="box-body no-padding clearfix">
            <div class="row">
                
                @for($j=0; $j < sizeof($drafts); $j++) 
                <div class="col-sm-6 col-md-3">
                    <div class="box box-primary thumbnail ">
                        <div class="box-header">
                            <i class="fa fa-book"></i> Proyecto {{$j + 1 }}
                        </div>

                        <div class="box box-body" >
                            <div class="caption clearfix text-center" style="background-color:#fff; height:340px;">
                                


                                    <table class="table table-condensed table-hover">
                                        <tbody>
                                            <tr>
                                                <td><h5 style="text-transform: uppercase;"><strong>{{ $drafts[$j][0]->titulo_anteproyecto }}</strong></h5></td>
                                            </tr>
                                            <tr><td>
                                                <h5>DIRECTORES:</h5>
                                                @for($i = 0; $i < sizeof($directors); $i++) 
                                                    @if(!empty($directors[$j][$i])) 
                                                        @if($drafts[$j][0]->codigo_anteproyecto == $directors[$j][$i]->codigo_anteproyecto)
                                                            <p>{{$directors[$j][$i]->name}} {{$directors[$j][$i]->last_name}}</p>
                                                        @endif
                                                    @endif
                                                @endfor
                                            </td></tr> 
                                            <tr><td>
                                                <h5>AUTORES:</h5>
                                                @for($i = 0; $i < sizeof($autores); $i++)
                                                    @if(!empty($autores[$j][$i])) 
                                                        @if($drafts[$j][0]->codigo_anteproyecto == $autores[$j][$i]->codigo_anteproyecto)
                                                            <p>{{$autores[$j][$i]->name}} {{$autores[$j][$i]->last_name}} - {{$autores[$j][$i]->codigo_especifico}}</p>
                                                        @endif
                                                    @endif
                                                @endfor  
                                            </td></tr> 
                                            <tr><td>
                                                <h5>ESTADO:</h5>
                                                @for($i = 0; $i < sizeof($estados); $i++)
                                                    @if(!empty($estados[$i])) 
                                                        @if($drafts[$j][0]->codigo_estadoante == $estados[$i]->codigo_estadoante)
                                                            <p>{{$estados[$i]->nombre_estadoante}} </p>
                                                        @endif
                                                    @endif
                                                @endfor  
                                            </td></tr> 
                                        </tbody>
                                    </table>

                               
                            </div>
                        </div>
                        <div class="box box-footer text-center" >
                            <button id="bajar" class="btn btn-info"><i class="fa fa-download"></i><i></i></button>&nbsp&nbsp
                            @php $f = $drafts[$j][0]->toString(); @endphp
                            <button onclick="agregarModal({{ $f }})" type = "submit" id="bajar" class="btn btn-warning"><i class="fa fa-edit"></i></button>&nbsp&nbsp
                            <button id="subir" class="btn btn-success" data-toggle="modal" data-target="#registrar"><i class="fa fa-send"></i><i></i></button>
                        </div>
                    </div>
            </div>
            @endfor
        </div>

</div>
</section>

</div>





<!-- /.content -->



<!--Modal Editar-->
<div class="modal fade" id="editar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#dd4b39;">
                <a class="fa fa-remove" data-dismiss="modal" style="color:#fff; float:right; cursor:pointer;"></a>
            </div>

            <div class="row" style="margin:0%;">
                <div class="col-sm-12 col-md-12" style="padding-right: 0px; padding-left: 0px;">
                    <div style="background-color:rgb(241, 240, 240);">

                        <div class="caption" style="background-color:rgb(241, 240, 240); margin: 0px 0px 0px 0px; height:250%;">
                            <section class="content">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <i class="fa fa-pencil-square-o"></i> Editar datos del anteproyecto
                                    </div>
                                        <!-- Listado de los proyectos -->
                                        <div class="box-body no-padding">
                                        <form method="POST" action="{{ route('drafts-list-student') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <textarea id="titulo" name = "titulo" class="form-control" rows="3" style="height: 50px;" required="required"></textarea>
                                                    <textarea id="resumen" name = "resumen" class="form-control" rows="3" placeholder="Resumen" required="required"></textarea>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <select id="tema" name="tema" class="Borde" name="Tipo Documento" required="required">
                                                        @for($i=0; $i < sizeof($lineas); $i++)
                                                            <option value="{{ $lineas[$i]->codigo_tema }}" >{{ $lineas[$i]->nombre_tema }}</option>
                                                        @endfor
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <select id="grupo" name="grupo" class="Borde" name="Tipo Documento">
                                                       
                                                        @for($i=0; $i < sizeof($grupos); $i++)                                                            
                                                            <option value="{{ $grupos[$i]->codigo }}" >{{ $grupos[$i]->siglas }}</option>
                                                         @endfor
                                                        </select>
                       
                                                        <select id="modalidad" name="modalidad" class="Borde" name="Tipo Documento" required="required">
                                                        @for($k = 0;$k< sizeof($modalidades); $k++)    
                                                             <option value="{{ $modalidades[$k]->codigo_modalidad }}" >{{ $modalidades[$k]->nombre_modalidad }}</option>
                                                        @endfor
                                                        </select>

                                                        <input type="text" id="codigo" name="codigo" hidden="true">
                                                        <input type="text" id="editable" name="editable" hidden="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Botones-->
                                            <div style="width: 200px; margin: 0px auto"> 
                                                <button type="submit" id="bajar" class="btn btn-primary" style="width: 200px; margin: 10px auto; "><i class="fa fa-hdd-o"></i><i>Actualizar información</i></button>
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
</div>
<!--end modal editar-->

<!--Modal registrar-->
<div class="modal fade" id="registrar" role="dialog">
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
                                        <i class="fa fa-upload"></i> Adjuntar archivos
                                    </div>
                                    <div class="box-body">
                                        <div class= "row text-left" style="margin: 2%">
                                            <div class = "col-md-6 col-xs-12 col-sm-12"><i class = "fa fa-bar-chart"></i><i> </i>Reporte de materias actual:</div>
                                            <div class = "col-md-6 col-xs-12 col-sm-12"><input type= "file" id="notas" name="notas"></div>
                                        </div>

                                        <div class= "row text-left" style="margin: 2%">
                                            <div class = "col-md-6 col-xs-12 col-sm-12"><i class = "fa fa-folder-open"></i><i> </i>Solicitud de presentación de Anteproyecto:</div>
                                            <div class = "col-md-6 col-xs-12 col-sm-12"><input type= "file" id="notas" name="notas"></div>
                                        </div>

                                        <div class= "row text-left" style="margin: 2%">
                                            <div class = "col-md-6 col-xs-12 col-sm-we2"><i class = "fa fa-book"></i><i> </i>Documento de Anteproyecto:</div>
                                            <div class = "col-md-6 col-xs-12 col-sm-12"><input type= "file" id="notas" name="notas"></div>
                                        </div>
                                    </div>
                                    <div class=" box-footer clearfix text-center ">
                                        <div>
                                            <button id="bajar " class="btn btn-primary " style="margin-top: 5%; width: 180px; margin-right: 5%; "><i class="fa fa-hdd-o "></i>&nbsp;<i>Guardar sin enviar</i></button>

                                            <button id="bajar " class="btn btn-success " style="margin-top: 5%; width: 180px; "><i class="fa fa-share "></i>&nbsp;<i>Enviar al comité</i></button>
                                        </div>
                                    </div>
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
                url = url.split('#')[0] + '#editar?id=' + id;
                window.location.href = url;
                
			}

</script>
@endsection