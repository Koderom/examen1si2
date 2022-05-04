<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MobileLoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        $user = User::where('email','=', $request->email)->first();

        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status"=>1,
                    "msg" => "logeado exitosamente",
                    "access_token" => $token,
                ],404);
            }else{
                return response()->json([
                    "status"=>0,
                    "msg" => "la password es incorrecta",
                ],404);
            }
        }else{
            return response()->json([
                "status"=>0,
                "msg" => "usuario no registrado",
            ],404);
        }
    }
    public function verArchivo(){
        $archivo = Archivo::all();
        return response()->json([
            "archivo"=>$archivo,
        ]);
    }
}
