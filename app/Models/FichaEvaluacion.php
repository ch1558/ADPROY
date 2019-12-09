<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FichaEvaluacion extends Model{
    
    protected $table = 'ficha_evaluacion';

    public function store(Request $request){
        $evaluate = new FichaEvaluacion;

        $evaluate->titulo = $request['titulo'];
        $evaluate->planteamiento = $request['planteamiento'];
        $evaluate->justificacion = $request['justificacion'];
        $evaluate->objetivos = $request['objetivos'];
        $evaluate->alcances = $request['alcance'];
        $evaluate->marco = $request['marco'];
        $evaluate->diseño = $request['diseño'];
        $evaluate->presupuesto = $request['presupuesto'];
        $evaluate->referencias = $request['referencias'];
        $evaluate->resumen = $request['resumen'];
        $evaluate->norma = $request['norma'];
        $evaluate->ortogragia = $request['ortografia'];

        $evaluate->save();

        return $evaluate;
    }

}
