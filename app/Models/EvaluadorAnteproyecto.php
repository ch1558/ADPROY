<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class EvaluadorAnteproyecto extends Model{
    
    protected $table = 'evaluador_anteproyecto';

    public function store(Request $request, $teacher){
        $newEvaluator = new EvaluadorAnteproyecto;

        $newEvaluator->codigo_persona = $teacher;
        $newEvaluator->codigo_evaluacion = 0;
        $newEvaluator->fecha_evaluador = date("Y-m-d");
        $newEvaluator->codigo_anteproyecto = $request['codigo'];

        $newEvaluator->save();
    }  

}
