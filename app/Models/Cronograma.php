<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model{
    
    protected $table = 'cronograma';

    public function store(Request $request){
        $newSchedule = new Cronograma;

        $newSchedule->duracion = $request['duracion'];
        $newSchedule->hitos = $request['hitos'];
        $newSchedule->fecha_fin = date("Y-m-d",strtotime(date("Y-m-d")."+ ".$request['duracion']." month"));

        $newSchedule->save();

        return $newSchedule;
    }

}
