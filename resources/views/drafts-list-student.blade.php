@extends('layouts.base')

@section('title', 'Historial de Anteproyectos')

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
                            <i class="fa fa-book"></i> Anteproyecto {{$j + 1 }}
                        </div>

                        <div class="box box-body" style="margin: 5px auto;">
                            <div class="caption clearfix text-center" style="background-color:#fff; height:340px;">
                                <h5 style="text-transform: uppercase; line-height: 1.3;"><strong>{{ $drafts[$j][0]->titulo_anteproyecto }}</strong>
                                @for($i = 0; $i < sizeof($estados); $i++)
                                    @if(!empty($estados[$i]) && $drafts[$j][0]->codigo_estadoante == $estados[$i]->codigo_estadoante)
                                        <span class="text-muted">({{$estados[$i]->nombre_estadoante}})</span>
                                    @endif
                                @endfor
                                </h5>

                                <hr style="margin: 5px auto;width: 85%;">

                                <h5 style="text-align:left;"><strong>DIRECTORES</strong></h5>
                                    @for($i = 0; $i < sizeof($directors); $i++) 
                                        @if(!empty($directors[$j][$i]) && $drafts[$j][0]->codigo_anteproyecto == $directors[$j][$i]->codigo_anteproyecto)
                                            <p style="text-align:left;margin-left:5px;margin: 5px 0px 5px 20px;font-size:12px;">{{$directors[$j][$i]->name}} {{$directors[$j][$i]->last_name}}</p>
                                        @endif
                                    @endfor

                                <h5 style="text-align:left;"><strong>Autores</strong></h5>
                                    @for($i = 0; $i < sizeof($autores); $i++)
                                        @if(!empty($autores[$j][$i]) && $drafts[$j][0]->codigo_anteproyecto == $autores[$j][$i]->codigo_anteproyecto)
                                            <p style="text-align:left;margin-left:5px;margin: 5px 0px 5px 20px;font-size:12px;">{{$autores[$j][$i]->name}} {{$autores[$j][$i]->last_name}}</p>
                                        @endif
                                @endfor                                
                            </div>
                        </div>
                        <div class="box box-footer text-center" style="border-top: 0px; margin:5px auto;box-shadow: 0px 0px;">
                            <a href="{{ asset($drafts[$j][0]->url_anteproyecto) }}" target="blank" id="bajar" class="btn btn-info" @if($drafts[$j][0]->existAnteproyecto()==1) disabled="true" @endif><i class="fa fa-download"></i><i></i></a>&nbsp&nbsp
                            @php $f = $drafts[$j][0]->toString(); @endphp
                            <button onclick="agregarModal({{ $f }})" type = "submit" id="bajar" class="btn btn-warning" @if($drafts[$j][0]->codigo_estadoante=='3') disabled="true" @endif><i class="fa fa-edit"></i></button>&nbsp&nbsp
                            @php $docs = "'".$drafts[$j][0]->codigo_anteproyecto."','".$drafts[$j][0]->existUgad()."','".$drafts[$j][0]->existAnteproyecto()."','".$drafts[$j][0]->codigo_estadoante."'"; @endphp
                            <button onclick="documentos({{ $docs }})" id="subir" class="btn btn-success" data-toggle="modal" data-target="#registrar" @if($drafts[$j][0]->codigo_estadoante=='3') disabled="true" @endif><i class="fa fa-send"></i><i></i></button>
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
                <i class="fa fa-upload" style="color:#fff; font-size:14px"></i><i style="color:#fff; font-size:14px"> Adjuntar archivos</i>
                <a class="fa fa-remove" data-dismiss="modal" style="color:rgb(241, 240, 240); float:right; cursor:pointer;"></a>
            </div>

            <div class="row" style="margin:0% auto; width:90% background-color:rgb(241, 240, 240);">
                <div class="col-sm-12 col-md-12" style="padding-left: 0px; padding-right: 0px;">
                    <div class="caption" style="background-color:rgb(241, 240, 240); margin: 0px 0px 0px 0px; height:250%;">
                        
                        <section class="content" style="padding:20px;">
                            <div style="background-color:rgb(241, 240, 240);">
                                <div class="box box-primary" style="margin: 0px;">
                                    <div class="box-body">
                                        <p style="text-align:justify; color:#4b636e;">Para subir archivos debes tener en cuenta que estos deben estar en formato PDF y no deben superar los 10MB</p>
                                        <form method="POST" action="{{ route('uploading-documents') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <input id="code" name="code" type="text" hidden="true">

                                            <div class= "row text-left" style="margin:20px 25px;">
                                                <label><i class="fa fa-book"></i> Documento de Anteproyecto <i class="text-muted" id="boolante" name="boolante"> </i></label>
                                                <input type= "file" id="anteproyecto" name="anteproyecto">
                                            </div>

                                            <hr style="margin: 3px auto;width: 75%;">
                                            <div class= "row text-left" style="margin:20px 25px;">
                                                <label><i class = "fa fa-folder-open"></i> Carta radicado UGAD <i class="text-muted" id="boolugad" name="boolugad"> </i></label>
                                                
                                                <input type= "file" id="ugad" name="ugad">
                                            </div>

                                            <hr style="margin: 10px auto;width: 90%;">

                                            <div style="width: 404px;margin: 0px auto;">
                                                <button id="accion" name="accion" value="save" type="submit" class="btn btn-primary" style="margin: 5px 10px;width: 180px;"><i class="fa fa-hdd-o"></i>&nbsp;<i>Guardar sin enviar</i></button>
                                                <button id="send" name="send" value="send" type="submit" class="btn btn-success" style="margin: 5px 10px;width: 180px;"><i class="fa fa-share"></i>&nbsp;<i>Enviar al comité</i></button>
                                            </div>
                                        </form>
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
    $(document).on('change','input[type="file"]',function(){
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

        if(fileSize > 10000000){
            alert('El archivo no debe superar los 10MB');
            this.value = '';
            this.files[0].name = '';
        }else{
            var ext = fileName.split('.').pop();
            switch (ext) {
                case 'pdf': break;
                default:
                    alert('El archivo no tiene la extensión adecuada');
                    this.value = ''; // reset del valor
                    this.files[0].name = '';
            }
        }
    });
</script>

@endsection