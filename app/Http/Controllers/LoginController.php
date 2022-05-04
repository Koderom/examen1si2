<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $request){
        $credentials = request()->only('email','password');

        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            $ahora =  Carbon::now('America/La_Paz')->addMonth();
            $valides = Carbon::createFromTimeString(auth()->user()->suscripcion->tiempo);
            if($valides->lessThan($ahora)){
                return redirect('/home');
            }else{
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
        }
        return redirect('login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
