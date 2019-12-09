<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{
    
    protected $table = 'proyecto';

    public function store($schedule, $letter){
        $newProject = new Proyecto;

        $newProject->cronograma = $schedule;
        $newProject->carta_aprobacion = $letter;
        $newProject->estado = 2;

        $newProject->save();
    }

}
