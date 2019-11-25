@extends('layouts.base')

@section('content')
<div class="content-wrapper" style="min-height: 808px;">
        <!--Titulo-->
        <section class="content-header">
                <div class="box box-primary" style="background-color:transparent;border-top-color:transparent; border-top:transparent; box-shadow:0 0 0 0;">
                    <div class="row">

                        <!--DIRECTOR-->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><i class="fa fa-check-circle"></i></h3>
                                    <p>Aprobación del Director</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-pencil-square"></i>
                                </div>
                                <a href="#" class="small-box-footer">&nbsp;</a>
                            </div>
                        </div>
                        <!-- ./col -->


                        <!--Asignacion Jurados-->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><i class="fa fa-check-circle"></i></h3>
                                    <p>Asignación de Jurados</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">&nbsp;</a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!--JURADOS-->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3><i class="fa fa-times-circle"></i></h3>
                                    <p>Evaluación de los Jurados</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-list-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">&nbsp;</a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!--COMITE-->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3><i class="fa fa-times-circle"></i></h3>
                                    <p>Juicio del Comité</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <a href="#" class="small-box-footer">&nbsp;</a>
                            </div>
                        </div>
                        <!-- ./col -->
                    
                    </div>

             </div>
          </section>
          <section class="content-header" style="padding: 0px 15px 0 15px;">
                    <div class="box box-primary">
                    <!-- Small boxes (Stat box) -->


                    <!-- mi  proyecto -->
                    <div  class="box-body no-padding">

                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th style="width:30%;">Titulo</th>
                                        <th style="width:20%;">Director</th>
                                        <th style="width:15%;">Tiempo</th>
                                        <th style="width:5%;">Autores</th>
                                        <th style="width:10%;">Co-directores</th>
                                        <th style="width:5%; ">Porcentaje</th>

                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                    <tr class="active" >
                                        <td style="text-align: justify; background-color:#fff;"> Aplicativo web para la administración de los anteproyectos presentados en el programa de Ingeniería de Sistemas de la Universidad Francisco de Paula Santander "ADPROY"</td>
                                        <td style="background-color:#fff;">Judith del Pilar Rodriguez Tenjo</td>
                                        <td style="background-color:#fff;">6 meses</td>
                                        <td style="background-color:#fff;">5</td>
                                        <td style="background-color:#fff;">1</td>
                                        <td style="background-color:#fff;">20%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </section>
                <section class="content-header" style="padding: 0px 15px 0 15px;">
                    <div class="box box-primary">
                    <!-- Small boxes (Stat box) -->


                    <!-- mi  proyecto -->
                    <div  class="box-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover text-justify">
                                <thead>
                                    <tr class="active">
                                        <td colspan="6"style="background-color:#fff;"><b><center>Resumen</center></b></td>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                <tr class="active">
                                        <td colspan="6" style="background-color:#fff;">
                                        Detección: Cuando se envié información de un punto origen a destino, la información tiene a correrse, y la manera más viable para realizar una detección temprana es comparar la información recibida con la original o traducir el mensaje y este puede ver que no tiene sentido, pero sin embargo existe técnicas que puede determinar la detección de errores en los mensajes, que se emplea en la capa de enlace
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="box-footer">
                        <div class="clearfix text-right">
                            <button name="accion" type="submit" class="btn btn-primary" value="registro" style="padding2%;">
                                <i class="fa fa-check"></i> Dar por terminado el proyecto.
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            
            
                
        </section>
</div>
               
@endsection

@section('scripts')
@endsection