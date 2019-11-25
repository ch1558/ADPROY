<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Anteproyecto extends Model{
    
    protected $table = 'anteproyecto';

    public function store(Request $request){
        $newDraft = new Anteproyecto;

        $newDraft->titulo_anteproyecto  = $request['titulo'];
        $newDraft->resumen_anteproyecto  = $request['resumen'];
        $newDraft->codigo_modalidad  = $request['modalidad'];
        $newDraft->codigo_grupo = $request['grupo'];
        $newDraft->codigo_tema = $request['tema'];
        $newDraft->codigo_estadoante  = 1;

        $newDraft->save();

        return $newDraft;
    }

}
