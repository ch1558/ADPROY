<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Dependencia;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RegisterController extends Controller{

    use RegistersUsers;
    protected $redirectTo = '/index';

    public function __construct(){
        $this->middleware('guest');
    }

    public function showRegistrationForm(){
        $dependencias = Dependencia::all();
        return view('register')->with(compact('dependencias'));
    }

    public function register(Request $request){
        
        $this->validator($request->all())->validate();
        
        $user = New User;
        $newUser = $user->store($request->all());
        //event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($newUser);
        return $this->registered($request, $newUser) ?: redirect($this->redirectPath());
    }


    protected function validator(array $data){
        return Validator::make($data, [
            'documento' => ['required', 'string', 'max:15'],
            'nombre' => ['required', 'string', 'max:250'],
            'apellido' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', 'max:250', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipoUsuario' => ['required', 'numeric'],
            'dependencia' => ['required', 'numeric'],
            'codigo' => ['required', 'numeric', 'max:10000000'],
        ]);
    }

    protected function create(array $data){

        return User::create([
            'name' => $data['nombre'],
            'last_name' => $data['apellido'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'cedula' => $data['documento'],
            'codigo_dependencia' => $data['dependencia'],
            'codigo_especifico' => $data['codigo'],
            'rol' => $data['tipoUsuario']
        ]);

    }
}
