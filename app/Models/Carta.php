<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model{
    
    protected $table = 'carta';

    public function store(Request $request){
        $newLetter = new Carta;
        $prefix = 'documentacion_'.$request['reunion'].'_';

        if($request->hasFile('carta')){
            $letter = $request->file('carta');
            $letterName = $prefix.'carta_aprobacion_comite.pdf';
            $letter->move(public_path() . '/documentos', $letterName);      
            $newLetter->url = '/documentos'.'/'.$letterName;
        }

        $newLetter->save();
    }

}
