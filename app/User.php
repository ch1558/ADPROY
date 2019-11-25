<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable{
    
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name,last_name,email,password,created_at,update_at,cedula,codigo_dependencia,
                    codigo_especifico,rol'];

    public function store(array $data){
        $newUser = new User;

        $newUser->name = $data['nombre'];
        $newUser->last_name = $data['apellido'];
        $newUser->email = $data['email'];
        $newUser->password = md5($data['password']);
        $newUser->cedula = $data['documento'];
        $newUser->codigo_dependencia = $data['dependencia'];
        $newUser->codigo_especifico = $data['codigo'];
        $newUser->rol = $data['tipoUsuario'];
        $newUser->estado = 0;

        $newUser->save();

        return $newUser;
    }

    public function login(array $data){
        $user = User::where('codigo_especifico',$data['codigo_especifico'])
                    ->where('cedula',$data['cedula'])
                    ->where('password', md5($data['contrasena']))
                    ->get();
        
        $newUser = new User;


        return $user[0]->name;
    }

}