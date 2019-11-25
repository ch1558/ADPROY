<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutorAnteproyecto extends Model{
    
    protected $table = 'autor_anteproyecto';

    public function store($autor,$anteproyecto){
        $draftOwner = new AutorAnteproyecto;

        $draftOwner->codigo_persona = $autor;
        $draftOwner->codigo_anteproyecto = $anteproyecto;
        $draftOwner->estado_autorante = 1;

        $draftOwner->save();
    }

}
