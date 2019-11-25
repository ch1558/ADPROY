<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model{
    
    protected $table = 'reunion';

    public function store(Request $request){
        $newMeet = new Reunion;

        $newMeet->nombre_reunion = $request['nombre'];
        $newMeet->fecha_reunion = $request['fecha'];
        $newMeet->descripcion_reunion = $request['descripcion'];

        $newMeet->save();
    }

}
