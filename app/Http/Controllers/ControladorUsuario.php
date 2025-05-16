<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ControladorUsuario extends Controller
{
    public function login(Request $request){
        
        $credenciales = $request->only('email','password');

        if(Auth::attempt($credenciales)){
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message'=>'Autenticacion exitosa']);
        }else{
            return response()->json(['message'=>'Credenciales invalidas',401]);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return ['message'=>'you have succesfully logged out and the token was successfully delete'];
    }

    public function mostrar_token($request){
        $token = User::mostrar_token($request);
        return response()->json($token);
    }
}
