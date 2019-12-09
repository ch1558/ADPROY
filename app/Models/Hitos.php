<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Hitos extends Model{
    
    protected $table = 'hitos';

    public function store(Request $request, $schedule){
        $newObjective = new Hitos;

        $newObjective->cronograma = $schedule;
        $newObjective->nombre = $request['nombre'];
        $newObjective->fecha_inicio = $request['fecha_inicio'];
        $newObjective->fin = $request['fecha_final'];
        $newObjective->fin_real = $request['fecha_real'];
        $newObjective->observaciones = $request['observacion'];
        $newObjective->estado = 0;

        $newObjective->save();
    }

    public function cambiarEstado($codigo,$estado){
        $newObjective = Hitos::where('codigo','=',$codigo)->get();
        $newObjective->estado = $estado;
        $newObjective->save();
    }

}
