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
                    @for($j=0; $j< sizeof($drafts); $j++)
                    <div class="col-sm-13 col-md-6" style="padding: 0px 60px">
                        <div class="box box-primary thumbnail">
                            <div class="box-header">
                                <i class="fa fa-book"></i> Proyecto {{$j + 1 }}
                            </div>

                            <div class="box box-body" >
                                <div class="caption clearfix text-center" style="background-color:#fff; height:500px;">
                                    <table class="table table-condensed table-hover">
                                        <tbody>
                                            <tr>
                                                <td><h5 style="text-transform: uppercase;"><strong>{{ $drafts[$j][0]->titulo_anteproyecto }}</strong></h5></td>
                                            </tr>
                                            <tr>
                                                <td><h5>{{ $drafts[$j][0]->resumen_anteproyecto }}</h5></td>
                                            </tr>
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
                                            <tr><td>
                                                <h5>LINEA DE INVESTIGACIÓN:</h5>
                                                @for($i = 0; $i < sizeof($lineas); $i++)
                                                    @if(!empty($lineas[$i])) 
                                                        @if($drafts[$j][0]->codigo_tema == $lineas[$i]->codigo_tema)
                                                            <p>{{$lineas[$i]->nombre_tema}} </p>
                                                        @endif
                                                    @endif
                                                @endfor  
                                            </td></tr>
                                            <tr><td>
                                                <h5>GRUPO DE INVESTIGACIÓN:</h5>
                                                @for($i = 0; $i < sizeof($grupos); $i++)
                                                    @if(!empty($grupos[$i])) 
                                                        @if($drafts[$j][0]->codigo_grupo == $grupos[$i]->codigo)
                                                            <p>{{$grupos[$i]->siglas}} </p>
                                                        @endif
                                                    @endif
                                                @endfor  
                                            </td></tr>
                                            <tr><td>
                                                <h5>MODALIDAD:</h5>
                                                @for($i = 0; $i < sizeof($modalidades); $i++)
                                                    @if(!empty($modalidades[$i])) 
                                                        @if($drafts[$j][0]->codigo_modalidad == $modalidades[$i]->codigo_modalidad)
                                                            <p>{{$modalidades[$i]->nombre_modalidad}} </p>
                                                        @endif
                                                    @endif
                                                @endfor  
                                            </td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endfor
            </div>
        </div>
    </section>

</div>


@endsection

@section('scripts')
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
@endsection