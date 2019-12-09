@extends('layouts.base')

@section('title','Proyectos activos')

@section('content')
<div class="content-wrapper" style="min-height: 808px;">
    <section class="content-header">
        <h1>Listado de proyectos<small>Proyectos activos</small></h1>
    </section>

    <section class="content">
        <div class="box-body no-padding clearfix">
            <div class="row">
                
                @for($j=0; $j < sizeof($projects); $j++) 
                <div class="col-sm-6 col-md-3">
                    <div class="box box-primary thumbnail ">
                        <div class="box-header">
                            <i class="fa fa-book"></i> Proyecto {{$j + 1 }}
                        </div>

                        <div class="box box-body" style="margin: 5px auto;">
                            <div class="caption clearfix text-center" style="background-color:#fff; height:340px;">
                                <h5 style="text-transform: uppercase; line-height: 1.3;"><strong>{{ $ownProjects[$j][0]->titulo_anteproyecto }}</strong>
                                </h5>

                                <hr style="margin: 5px auto;width: 85%;">

                                <h5 style="text-align:left;"><strong>DIRECTORES</strong></h5>

                                <h5 style="text-align:left;"><strong>Autores</strong></h5>                               
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
</div>
<!-- /.content -->
@endsection

@section('scripts')
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
@endsection