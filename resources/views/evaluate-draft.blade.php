@extends('layouts.base')
@section('title', 'Evaluación de un anteproyecto')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 819px;">
        <section class="content-header">
            <!-- Alertas  -->
            <div id="template_alerts">
            </div>
            <!-- Content Header (Page header) -->
            <h1> Evaluación de un Anteproyecto </h1>
        </section>

        <section class="content" style="padding-bottom: 5px;min-height: 100px">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-edit"></i> Datos del Anteproyecto
                </div>

                
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 style="text-align:center;text-transform:uppercase"><strong>Título</strong></h5>
                            <p style="text-align:center;">{{ $eval->titulo_anteproyecto }}</p>
                        </div>
                        <div class="col-md-5">
                            <h5 style="text-align:center;text-transform:uppercase"><strong>Resumen</strong></h5>
                            <p style="text-align:justify;">{{ $eval->resumen_anteproyecto }}</p>
                        </div>
                        <div class="col-md-2">
                            <h5 style="text-align:center;text-transform:uppercase"><strong>tematica</strong></h5>
                            <p style="text-align:center;">
                                @for($i=0; $i < sizeof($themes); $i++)
                                    @if($themes[$i]->codigo_tema == $eval->codigo_tema)
                                        {{ $themes[$i]->nombre_tema }}
                                    @endif
                                @endfor
                            </p>
                        </div>
                        <div class="col-md-2">
                            <h5 style="text-align:center;text-transform:uppercase"><strong>Documentos</strong></h5>
                            <a href="{{ asset($eval->url_anteproyecto) }}" style="width:100%;" target="blank" id="bajar" class="btn btn-info" @if($eval->existAnteproyecto()==1) disabled="true" @endif><i class="fa fa-download"></i><i>Descargar</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content" style="padding-top: 0px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-edit"></i> Formato de evaluación
                </div>

                <form method="POST" action="{{ route('evaluate-draft') }}">
                    @csrf 
                    <div class="box-body no-padding">
                        
                        <div class="row">
                            <h3 Style="text-align:center;">Elementos del anteproyecto</h3>
                            <hr style="margin: 10px auto;width: 85%;">

                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:center; text-transform:uppercase;"><strong>Aspecto a calificar</strong></h5>
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <h5 style="text-align:center; text-transform:uppercase;"><strong>Valoración</strong></h5>
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <h5 style="text-align:center; text-transform:uppercase;"><strong>Ponderación</strong></h5>
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <h5 style="text-align:center; text-transform:uppercase;"><strong>Calificación</strong></h5>
                                </div>
                            </div>

                            <!-- TITULO -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Título</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Título coherente con el objetivo del trabajo</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="titulo" name="titulo" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>5%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_titulo" name="cal_titulo"></p>
                                </div>
                            </div>

                            <!-- Planteamiento del problema -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Planteamiento del problema</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Presenta argumentos en torno al problema. Tiene un planteamiento claro y preciso. Presenta una formulación (pregunta o preguntas) coherente con el planteamiento y derivadas de la identificación, análisis y sustentación de un problema</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="planteamiento" name="planteamiento" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>20%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_plantea" name="cal_plantea"></p>
                                </div>
                            </div>

                            <!-- Justificación -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Justificación</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Responde a la pregunta de por qué se investiga, señalando: la novedad, actualidad, pertinencia, viabilidad del proyecto y el impacto esperado. En otras palabras muestra el aporte social, disciplinar y académico del proyecto</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="justificacion" name="justificacion" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>15%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_justify" name="cal_justify"></p>
                                </div>
                            </div>

                            <!-- Objetivos -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Objetivos</strong></h5>
                                    <p style="text-align:left; padding-left:20px">El objetivo general expresa el propósito de la investigación y es coherente con la formulación del problema. Los objetivos específicos expresan los logros intermedios para alcanzar el objetivo general. Tienen una secuencia lógica y son verificables</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="objetivos" name="objetivos" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>15%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_obj" name="cal_obj"></p>
                                </div>
                            </div>

                            <!-- Alcance -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Alcances y delimitaciones</strong></h5>
                                    </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <select id="alcance" name="alcance" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>5%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_alcance" name="cal_alcance"></p>
                                </div>
                            </div>

                            <!-- Marco teorico -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Marco Teórico</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Describe la relación del fenómeno en un contexto histórico-social; es decir, se fundamenta dentro de la diversidad de autores de teorías, enfoques y corrientes que sirven de base para la formulación del problema. Explica los antecedentes del objeto de estudio. Precisa los diferentes conceptos relevantes para la investigación, brindando así la posibilidad de comprender su significado particular y generar o retomar una conceptualización frente a las variables involucradas en el problema en estudio</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="marco" name="marco" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>10%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_marco" name="cal_marco"></p>
                                </div>
                            </div>

                            <!-- Diseño metodológico -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Diseño metodológico</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Explica el tipo de diseño empleado y la fuente. Indica la población participante y el sistema de muestreo. Explican los instrumentos empleados, su diseño y ajuste. Incluye sistema de hipótesis y variables /o Presupuestos y categorías de análisis. Define conceptual y operacionalmente las variables o fenómenos de indagación. Explica el procedimiento aplicado, y las instrucciones brindadas a los participantes. Incluyen consideraciones éticas</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="diseño" name="diseño" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>10%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_diseño" name="cal_diseño"></p>
                                </div>
                            </div>

                            <!-- Presupuesto y cronograma -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Presupuesto y cronograma</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Las actividades, etapas y el tiempo previsto, se ajustan al desarrollo del proyecto? </p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="presupuesto" name="presupuesto" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>5%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_presupuesto" name="cal_presupuesto"></p>
                                </div>
                            </div>

                            <!-- Referencias bibliograficas -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Referencias bibliográficas</strong></h5>
                                    <p style="text-align:left; padding-left:20px">Se registran en orden alfabético las obras y demás fuentes de carácter informativo que se han consultado para la elaboración del trabajo. Las fuentes bibliográficas están bien citadas y son actuales</p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <select id="referencias" name="referencias" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>10%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_referencias" name="cal_referencias"></p>
                                </div>
                            </div>

                            <!-- Resumen -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Resumen</strong></h5>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <select id="resumen" name="resumen" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>5%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_resumen" name="cal_resumen"></p>
                                </div>
                            </div>

                            <h3 Style="text-align:center;">Forma del anteproyecto</h3>
                            <hr style="margin: 10px auto;width: 85%;">

                            <!-- Norma -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Cumplimiento de la norma de presentación</strong></h5>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <select id="norma" name="norma" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>40%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_norma" name="cal_norma"></p>
                                </div>
                            </div>

                            <!-- Ortografía -->
                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-6 col-xs-6">
                                    <h5 style="text-align:left; text-transform:uppercase;"><strong>Redacción y ortografía</strong></h5>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <select id="ortografia" name="ortografia" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;"><strong>60%</strong></p>
                                </div>
                                <div class="col-md-2 col-xs-2" style="padding:5px 25px;">
                                    <p style="text-align:center;font-size:16px;" id="cal_ortografia" name="cal_ortografia"></p>
                                </div>
                            </div>

                            <hr style="margin: 15px auto;width: 85%;">

                            <div class="row" style="width:90%;margin: 2px auto; display: flex;"> 
                                <div class="col-md-3 col-xs-3">
                                    <a onclick="calculo()" class="btn btn-info" style="width: 90%;">Calcular calificación</a>
                                    <p style="text-align:center; padding:10px;" id="global" name="global"></p>
                                </div>
                                <div class="col-md-3 col-xs-3" style="padding:5px 25px;">
                                    <select id="juicio" name="juicio" class="Borde custom-select mr-sm-2" style="padding: 5px;" required>
                                        <option value="0">Aprobado</option>
                                        <option value="1">Rechazado</option>
                                        <option value="2">Correciones</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-6" style="padding:5px 25px;">
                                    <textarea id="observacion" name="observacion" class="form-control" rows="3" placeholder="Ingrese las observaciones del anteproyecto" style="margin:10px">@if(session('status')!='false') {{ session('resumen') }} @endif</textarea>
                                </div>
                            </div>
                            
                        <div
                    </div>

                    <hr style="margin: 10px auto;width: 85%;">
                    <div style="width: 70%;margin: 5px auto;">
                        <button id="send" name="send" value="send" type="submit" class="btn btn-success" style="margin: 20px; width:100%;"><i class="fa fa-share"></i>&nbsp;<i>Completar calificación</i></button>
                    <div>                      
                </form>
            </div>
        </section>
    </div>

@endsection

@section('scripts')

    <script>
        $("select[name=titulo]").change(function(){
            document.getElementById("cal_titulo").innerHTML = $('select[name=titulo]').val()*0.05;
        }); 

        $("select[name=planteamiento]").change(function(){
            document.getElementById("cal_plantea").innerHTML = $('select[name=planteamiento]').val()*0.2;
        }); 

        $("select[name=justificacion]").change(function(){
            document.getElementById("cal_justify").innerHTML = $('select[name=justificacion]').val()*0.15;
        }); 

        $("select[name=objetivos]").change(function(){
            document.getElementById("cal_obj").innerHTML = $('select[name=objetivos]').val()*0.15;
        }); 

        $("select[name=alcance]").change(function(){
            document.getElementById("cal_alcance").innerHTML = $('select[name=alcance]').val()*0.05;
        }); 

        $("select[name=marco]").change(function(){
            document.getElementById("cal_marco").innerHTML = $('select[name=marco]').val()*0.1;
        }); 

        $("select[name=diseño]").change(function(){
            document.getElementById("cal_diseño").innerHTML = $('select[name=diseño]').val()*0.1;
        }); 

        $("select[name=presupuesto]").change(function(){
            document.getElementById("cal_presupuesto").innerHTML = $('select[name=presupuesto]').val()*0.05;
        }); 

        $("select[name=referencias]").change(function(){
            document.getElementById("cal_referencias").innerHTML = $('select[name=referencias]').val()*0.1;
        }); 

        $("select[name=resumen]").change(function(){
            document.getElementById("cal_resumen").innerHTML = $('select[name=resumen]').val()*0.05;
        });

        $("select[name=norma]").change(function(){
            document.getElementById("cal_norma").innerHTML = $('select[name=norma]').val()*0.4;
        }); 

        $("select[name=ortografia]").change(function(){
            document.getElementById("cal_ortografia").innerHTML = $('select[name=ortografia]').val()*0.6;
        });
        
        
        function calculo(){
            var $total;
            var $calculo1 = 0;
            $calculo1 += $('select[name=titulo]').val()*0.05;
            $calculo1 += $('select[name=planteamiento]').val()*0.2;
            $calculo1 += $('select[name=justificacion]').val()*0.15;
            $calculo1 += $('select[name=objetivos]').val()*0.15;
            $calculo1 += $('select[name=alcance]').val()*0.05;
            $calculo1 += $('select[name=marco]').val()*0.1;
            $calculo1 += $('select[name=diseño]').val()*0.1;
            $calculo1 += $('select[name=presupuesto]').val()*0.05;
            $calculo1 += $('select[name=referencias]').val()*0.1;
            $calculo1 += $('select[name=resumen]').val()*0.05;

            var $calculo2 = 0
            $calculo2 = $('select[name=norma]').val()*0.4;
            $calculo2 = $('select[name=ortografia]').val()*0.6;

            $total = $calculo1*0.6 + $calculo2*0.4;
            document.getElementById("global").innerHTML = $total;
            alert($total);
        }
    </script>
@endsection