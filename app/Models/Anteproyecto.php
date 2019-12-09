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

    public function addDocument(Request $request){
        $prefix = 'documentacion_'.$request['code'].'_';

        $newDraft = new Anteproyecto;
        $newDraft = Anteproyecto::find($request['code']);

        if($request->hasFile('anteproyecto')){
            $ante = $request->file('anteproyecto');
            $anteName = $prefix.'documento_anteproyecto.pdf';
            $ante->move(public_path() . '/documentos', $anteName);
            $newDraft->url_anteproyecto = '/documentos'.'/'.$anteName;
        }

        if($request->hasFile('ugad')){
            $ugad = $request->file('ugad');
            $ugadName = $prefix.'carta_ugad.pdf';
            $ugad->move(public_path() . '/documentos', $ugadName);      
            $newDraft->url_ugad = '/documentos'.'/'.$ugadName;
        }

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

    function existUgad(){
        return is_null($this->url_ugad);
    }

    function existAnteproyecto(){
        return is_null($this->url_anteproyecto);
    }

}
