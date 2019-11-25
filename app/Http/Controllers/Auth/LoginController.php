<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{

    use AuthenticatesUsers;
    protected $redirectTo = '/index';

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        $error= array();
        array_push($error,"sin errores");
        return view('login')->with(compact('error'));
    }

    public function login(Request $request){

        $this->validateLogin($request);

        $query = ([
            'codigo_especifico' => $request['codigo'],
            'cedula' => $request['documento'],
            'contrasena' => $request['contrasena']
        ]);
        
        $modifyRequest = new Request($query);

        return $this->sendLoginResponse($modifyRequest);
    }

    protected function validateLogin(Request $request){
        $request->validate([
            'codigo' => 'required|numeric',
            'documento' => 'required|string',
            'contrasena' => 'required|string',
        ]);
    }

    protected function sendLoginResponse(Request $request){
        $error= array();
        array_push($error,"datos incorrectos");
        $user = User::where('codigo_especifico',$request['codigo_especifico'])
                        ->where('cedula',$request['cedula'])
                        ->where('password', md5($request['contrasena']))
                        ->get();

        if(sizeof($user)==1){
            $this->guard()->login($user[0]);
            return redirect('/index');
        }else{
            return view('login')->with(compact('error'));
        }

    }

    public function logout(Request $request){

        $this->guard()->logout();

        return $this->loggedOut($request) ?: redirect('/');

    }

}
