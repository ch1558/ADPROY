<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ReunionAnte extends Model{

    protected $table = 'reunion_ante';
    protected $primaryKey = 'codigo_reunion';

    public function store(Request $request, $estado){
        $newMeet = new ReunionAnte;

        $newMeet->nombre_reunion = $request['nombre'];
        $newMeet->fecha_reunion = $request['fecha'];
        $newMeet->codigo_anteproyecto = $request['anteproyecto'];
        $newMeet->descripcion_reunion = $request['descripcion'];
        $newMeet->observacion = $request['observacion'];
        $newMeet->estado = $estado;

        $newMeet->save();
    }
}
