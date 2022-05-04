<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:persona.index')->only('index');
        $this->middleware('can:persona.create')->only('create');
        $this->middleware('can:persona.store')->only('store');
        $this->middleware('can:persona.destroy')->only('destroy');
        $this->middleware('can:persona.show')->only('show');
        $this->middleware('can:persona.update')->only('update');
    }
    public function index()
    {
        $Personas = Persona::all();
       return view('Persona.index',['Personas'=>$Personas]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Persona.create');
        
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
            'nombre'=>'required',
            'ci'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
        ]);
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        
        $persona->sexo = $request->input('sexo');
        
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->tipo = 'I';
        $persona->save();

        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'personas', //tabla
            'C', //accion
            $persona->id,// id del implicado
            $persona->nombre, // nombre del implicado
        ]);
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('Persona.show',['persona'=>$persona]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('Persona.edit',['persona'=>$persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre'=>'required',
            'ci'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
        ]);
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        
        $persona->sexo = $request->input('sexo');
        
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->tipo = 'I';
        $persona->update();

        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'personas', //tabla
            'U', //accion
            $persona->id,// id del implicado
            $persona->nombre, // nombre del implicado
        ]);
        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'personas', //tabla
            'D', //accion
            $persona->id,// id del implicado
            $persona->nombre, // nombre del implicado
        ]);
        $persona->delete();
        return redirect()->route('persona.index');
    }
}
