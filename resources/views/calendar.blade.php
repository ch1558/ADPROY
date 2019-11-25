@extends('layouts.base')

@section('content')

    <div class="content-wrapper" style="min-height: 808px;">
        <section class="content-header">
            <div id="template_alerts">
            </div>
            <h1>Calendario de reuniones</h1>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Listado de reuniones</h2>
                </div>
                <div class="box-body no-padding clearfix">
                    <div class="row">
                        <div class="col-md-12" style="padding: 10px 30px 10px 10px;">
                            <div class="table-responsive" style="margin: 10px 20px;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0; $i < sizeof($meet); $i++)
                                            <tr>
                                                <td>{{ $meet[$i]->fecha_reunion }}</td>
                                                <td>{{ $meet[$i]->nombre_reunion }}</td>
                                                <td>{{ $meet[$i]->descripcion_reunion }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('scripts')
@endsection
