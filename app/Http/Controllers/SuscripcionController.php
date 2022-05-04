<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Suscripcion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuscripcionController extends Controller
{

    public function registro($plan){
        return view('Registro',['plan'=>$plan]);
    }
    public function store(Request $request, $plan){
        $request->validate([
            'nombre'=>'required',
            'ci'=>'required',
            'edad'=>'required',
            'direccion'=>'required',
            'sexo'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $mytime= Carbon::now('America/La_Paz')->addMonth();
        
        $suscripcion = new Suscripcion();
        $suscripcion->tiempo = $mytime->toDateTimeString();
        $suscripcion->save();

        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        $persona->sexo = $request->input('sexo');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->tipo = 'A';
        $persona->save();
        
        $usuario = new User();
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->persona_id = $persona->id;
        $usuario->suscripcion_id = $suscripcion->id;
        $usuario->assignRole(Role::findByName('admin'));
        $usuario->save();
        
        return redirect()->route('login');
    }
}
