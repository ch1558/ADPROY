@extends('layouts.base')
@section('title', 'Anteproyectos en juicio')

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
                            <tr class="text-center">
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
                                    
                                    @for ($i = 0; $i < sizeof($drafts); $i++)
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td >{{$drafts[$i]->titulo_anteproyecto}}</td>
                                            <td>
                                                <span class="badge hvr-grow-shadow @if($owndirectors[$i][0]->codigo_evaluacion=='0') td_color2 @else td_color1 @endif; badge_pen"> {{$draftdirectors[$i][0]}}</span>
                                            </td>
                                            <td>
                                                <span class="badge hvr-grow-shadow @if($owndirectors[$i][1]->codigo_evaluacion=='0') td_color2 @else td_color1 @endif; badge_pen"> {{$draftdirectors[$i][1]}}</span>
                                            </td>
                                            <td>
                                                <span class="badge hvr-grow-shadow @if($owndirectors[$i][2]->codigo_evaluacion=='0') td_color2 @else td_color1 @endif; badge_pen"> {{$draftdirectors[$i][2]}}</span>
                                            </td>
                                            <?php 
                                                $div = 100/3; 
                                                $cont = 0;
                                                if($owndirectors[$i][0]->codigo_evaluacion!='0') $cont++;
                                                if($owndirectors[$i][1]->codigo_evaluacion!='0') $cont++;
                                                if($owndirectors[$i][2]->codigo_evaluacion!='0') $cont++;

                                                $dateact = $owndirectors[$i][0]->fecha_evaluador;
                                                $dateend = date("Y-m-d",strtotime($dateact."+ 3 month"));
                                                //print_r($dateend);
                                                $dateend = (new DateTime(date('Y')."-".date('m')."-".date('d')))->diff(new DateTime($dateend));
                                                //print_r($dateend);
                                            ?>
                                            <td style="text-align: center;">{{(int)($div*$cont)}}%</td>
                                            <td>{{$dateend->days}} días</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </form>
                    </table>
                </div>
            </section> 
    </div>
@endsection