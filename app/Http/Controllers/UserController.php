<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.create')->only('create');
        $this->middleware('can:user.store')->only('store');
        $this->middleware('can:user.destroy')->only('destroy');
        $this->middleware('can:user.show')->only('show');
        $this->middleware('can:user.update')->only('update');
    }
    public function index()
    {
        $users = User::all();
        return view('Usuario.index',['Users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::all();
        return view('Usuario.create',['Personas'=>$personas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            'persona'=>'required',
        ]);
        $mytime= Carbon::now('America/La_Paz'); 

        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->persona_id = $request->input('persona');
        $user->suscripcion_id = auth()->user()->suscripcion_id;
        $user->save();
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'usuarios', //tabla
            'C', //accion
            $user->id,// id del implicodo
            $user->persona->nombre, // nombre del implicado
        ]);
        $tipo = $user->persona->tipo[0];
        switch ($tipo) {
            case 'J':
                $user->assignRole(Role::findByName('juez'));
                break;
            case 'A':
                $user->assignRole(Role::findByName('abogado'));
                break;
            case 'I':
                $user->assignRole(Role::findByName('implicado'));
                break;
            case 'S':
                $user->assignRole(Role::findByName('admin'));
                break;
        }
        return redirect()->route('user.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Usuario.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
            'email'=>'required'
        ]);
        $user->email = $request->input('email');
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'usuarios', //tabla
            'U', //accion
            $user->id,// id del implicodo
            $user->persona->nombre, // nombre del implicado
        ]);
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'usuarios', //tabla
            'D', //accion
            $user->id,// id del implicodo
            $user->persona->nombre, // nombre del implicado
        ]);
        $user->delete();
        return redirect()->route('user.index');
    }
    
}
