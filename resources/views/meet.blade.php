@extends('layouts.base')

@section('content')
    <!-- CONTENIDO DE DATOS PERSONALES -->
    <div class="content-wrapper" style="min-height: 808px;">
        <!--Titulo-->
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!--Contenido del titulo-->
            <h1>
                Comite Curricular - <small>Diligenciamiento de reuniones</small>
            </h1>
        </section>

        @if(auth()->user()->rol == 1)
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-user"></i>
                        <h2 class="box-title">Formulario de registro</h2>
                    </div>
                    
                    <form method="POST" action="{{ route('meet') }}">
                        @csrf
                        <div id="comite-meet">
                            
                            <div class="col-xs-11 col-md-2 div-borde input-group mb-3" style="margin: 5px 15px;">
                                <label>Fecha reunión</label>
                                <input type="date" id="fecha_nacimiento" name="fecha" class="form-control" step="1" style="border-left: 0px;border-right: 0px;padding: 1px;" required="required">
                            </div>
                                
                            <div class="col-xs-11  col-md-3 div-borde input-group mb-3" style="margin: 5px 15px;">
                                <label>Nombre de la reunión</label>
                                <input type="text" class="Borde form-control" placeholder="Nombre de la reunion" aria-label="nombre" name="nombre" maxlength="100"  required="required" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-xs-11 col-md-6 div-borde input-group mb-3" style="margin: 5px 15px;">
                                <label>Ingrese una breve descripcion de la reunión</label>
                                <input type="text" class="Borde form-control" placeholder="Descripción de la reunion" aria-label="descripcion" name="descripcion" maxlength="300"  required="required" aria-describedby="basic-addon1">
                            </div>
                        
                        </div>

                        <div style="padding: 15px 50px;">
                            <button tupe="submit" class="btn btn-info" name="accion" value="ingresar" style="width:100%;">Registrar Reunión de comite</button>
                        </div>
                    </form>
                </div>
            </section>
        @endif

    </div>
@endsection

@section('scripts')
@endsection
