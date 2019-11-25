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
                Asignación de Proyecto<small>Realizar asignacion de jurados</small>
                <span class="text-muted pull-right" style="font-size: 10px;">Martes 04 de Junio de 2019</span>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-edit"></i> Listado de los proyectos
                </div>
                <!-- Listado de los proyectos #1BA67E-->
                <div class="box-body no-padding">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col" scope="col">#</th>
                            <th class="col" scope="col">Título</th>
                            <th class="col" scope="col">Resumen</th>
                            <th class="col" scope="col">Tema</th>
                            <th class="col" scope="col">Director</th>
                            <th class="col" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        <tr>
                                <tr class="active">
                                <tr>
                            <th scope='row'></th>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                        <li></li>
                            </td>

                            <td style="width:30%;">
                                <button id="subir" class="btn btn-primary" data-toggle="modal" data-target="#jurados" ><i class="fa fa-user-circle"></i><i> Asignar Jurados </i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="jurados" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#dd4b39;">
                     <a class="fa fa-power-off" data-dismiss="modal" style="color:#fff; float:right; cursor:pointer;"></a>
                </div>
               <div class="row" style="margin:2% auto;">
                  <div class="col-sm-6 col-md-12">
                    <div class="thumbnail" style="background-color:#188F6C;padding:0px;">
               <div class="caption" style="background-color:#fff; margin:5px 0px 5px 0px; height:300%;">
               <div class="clearfix text-center">
                     <h3>Asignar jurados</h3>
                     <i class="fa fa-edit"></i> Cantidad de Jurados
                                   <select id="jurados" class="Borde custom-select mr-sm-2"  name="jurados">
                                      <option value="1">1</option> 
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>

                                   </select>
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado1" name="jurado1" maxlength="12" value="" required="required">
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado2" name="jurado2" maxlength="12" value="" required="required">
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado3" name="jurado3" maxlength="12" value="" required="required">
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado4" name="jurado4" maxlength="12" value="" required="required">
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado5" name="jurado5" maxlength="12" value="" required="required">
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado6" name="jurado6" maxlength="12" value="" required="required">
                        <input class="Borde" style="width:100%; padding:2%;" type="text" class="form-control" placeholder="Jurados" id="jurado7" name="jurado7" maxlength="12" value="" required="required">
                     <p><a href="#" class="btn btn-default" style="background-color:#188F6C;color:#fff; margin-top:20px;" role="button">Realizar la asignación</a></p>
               </div>
               </div>
               </div>
           </div>
        </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="./JS/jQuery-2.1.3.min.js"></script>
    <script type="text/javascript" src="./JS/bootstrap.min.js"></script>
    <script type="text/javascript" src="./JS/portales.js"></script>
    
    <script>

        $( "#jurado2" ).hide();
        $( "#jurado3" ).hide();
        $( "#jurado4" ).hide();
        $( "#jurado5" ).hide();
        $( "#jurado6" ).hide();
        $( "#jurado7" ).hide();

        $("select[name=jurados]").change(function(){
            $consulta = $('select[name=jurados]').val();
            if($consulta == 1){
                $( "#jurado2" ).hide();
                $( "#jurado3" ).hide();
                $( "#jurado4" ).hide();
                $( "#jurado5" ).hide();
                $( "#jurado6" ).hide();
                $( "#jurado7" ).hide();
            }else if($consulta == 2){
                $( "#jurado2" ).show();
                $( "#jurado3" ).hide();
                $( "#jurado4" ).hide();
                $( "#jurado5" ).hide();
                $( "#jurado6" ).hide();
                $( "#jurado7" ).hide();
            }else if($consulta == 3){
                $( "#jurado2" ).show();
                $( "#jurado3" ).show();
                $( "#jurado4" ).hide();
                $( "#jurado5" ).hide();
                $( "#jurado6" ).hide();
                $( "#jurado7" ).hide();
            }else if($consulta == 4){
                $( "#jurado2" ).show();
                $( "#jurado3" ).show();
                $( "#jurado4" ).show();
                $( "#jurado5" ).hide();
                $( "#jurado6" ).hide();
                $( "#jurado7" ).hide();
            }else if($consulta == 5){
                $( "#jurado2" ).show();
                $( "#jurado3" ).show();
                $( "#jurado4" ).show();
                $( "#jurado5" ).show();
                $( "#jurado6" ).hide();
                $( "#jurado7" ).hide();
            }else if($consulta == 6){
                $( "#jurado2" ).show();
                $( "#jurado3" ).show();
                $( "#jurado4" ).show();
                $( "#jurado5" ).show();
                $( "#jurado6" ).show();
                $( "#jurado7" ).hide();
            }else{
                $( "#jurado2" ).show();
                $( "#jurado3" ).show();
                $( "#jurado4" ).show();
                $( "#jurado5" ).show();
                $( "#jurado6" ).show();
                $( "#jurado7" ).show();}
            
        }); 
       
    </script>
@endsection