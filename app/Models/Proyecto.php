<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{
    
    protected $table = 'proyecto';

    public function store(Request $request, $cronograma){
        $newProject = new Proyecto;

        $newProject->cronograma = $cronograma;
        $newProject->carta_aprobacion = 1;
        $newProject->estado = 2;

        $newProject->save();
    }

}
