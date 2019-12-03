<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Anteproyecto extends Model{
    
    protected $table = 'anteproyecto';
    protected $primaryKey = 'codigo_anteproyecto';

    public function store(Request $request){
        $newDraft = new Anteproyecto;

        if(isset($request['editable'])){
            $newDraft = Anteproyecto::find($request['codigo']);
        }

        $newDraft->titulo_anteproyecto  = $request['titulo'];
        $newDraft->resumen_anteproyecto  = $request['resumen'];
        $newDraft->codigo_modalidad  = $request['modalidad'];
        $newDraft->codigo_grupo = $request['grupo'];
        $newDraft->codigo_tema = $request['tema'];
        $newDraft->codigo_estadoante  = 1;
        $newDraft->save();

        return $newDraft;
    }

    public function editarEstadoAsignado($codigo){
        $newDraft = Anteproyecto::find($codigo);

        $newDraft->codigo_estadoante  = 5;

        $newDraft->save();
    }

    function toString(){
        return "'".$this->titulo_anteproyecto."','".$this->resumen_anteproyecto."','".$this->codigo_modalidad."','".$this->codigo_grupo."','".$this->codigo_tema."','".$this->codigo_anteproyecto."'";
    }

}
