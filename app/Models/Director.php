<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model{
    
    protected $table = 'director';

    public function store($director,$anteproyecto){
        $draftJudge = new Director;

        $draftJudge->codigo_persona = $director;
        $draftJudge->codigo_anteproyecto = $anteproyecto;
        $draftJudge->estado_director = 0;

        $draftJudge->save();
    }

}
