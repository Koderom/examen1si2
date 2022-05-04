<?php

namespace App\Http\Controllers;

use App\Models\Juez;
use App\Models\Juzgado;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:juez.index')->only('index');
        $this->middleware('can:juez.create')->only('create');
        $this->middleware('can:juez.store')->only('store');
        $this->middleware('can:juez.destroy')->only('destroy');
        $this->middleware('can:juez.show')->only('show');
        $this->middleware('can:juez.update')->only('update');
    }
    public function index()
    {   
        $Juezs = Juez::all();
        return view('Juez.index',['Juezs'=>$Juezs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juzgados = Juzgado::all();
        return view('Juez.create', ['Juzgados'=>$juzgados]);
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
            'juzgado'=>'required',
        ]);
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        
        $persona->sexo = $request->input('sexo');
        
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->tipo = 'J';
        $persona->save();

        $juez = new Juez();
        $juez->persona_id = $persona->id;
        $juez->juzgado_id = $request->input('juzgado');
        $juez->save();
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'personas', //tabla
            'C', //accion
            $persona->id,// id del implicodo
            $persona->nombre, // nombre del implicado
        ]);
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'jueces', //tabla
            'C', //accion
            $juez->id,// id del implicodo
            $juez->persona->nombre, // nombre del implicado
        ]);
        return redirect()->route('juez.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function show(Juez $juez)
    {
        //return $juez->persona;
        return view('Juez.show',['juez'=>$juez]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function edit(Juez $juez)
    {
        $juzgados = Juzgado::all();
        return view('Juez.edit', ['juez'=>$juez,'Juzgados'=>$juzgados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juez $juez)
    {
        $request->validate([
            'nombre'=>'required',
            'ci'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'juzgado'=>'required',
        ]);
        $persona = Persona::find($juez->persona->id);
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        if($request->input('sexo') == 1){
            $persona->sexo = 'H';
        }else{
            $persona->sexo = 'M';
        }
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->update();
        $juez->persona_id = $persona->id;
        $juez->juzgado_id = $request->input('juzgado');
        $juez->update();
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'personas', //tabla
            'U', //accion
            $persona->id,// id del implicodo
            $persona->nombre, // nombre del implicado
        ]);
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'jueces', //tabla
            'U', //accion
            $juez->id,// id del implicodo
            $juez->persona->nombre, // nombre del implicado
        ]);
        return redirect()->route('juez.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juez $juez)
    {
        $persona = Persona::find($juez->persona->id);
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'personas', //tabla
            'D', //accion
            $persona->id,// id del implicodo
            $persona->nombre, // nombre del implicado
        ]);
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'jueces', //tabla
            'D', //accion
            $juez->id,// id del implicodo
            $juez->persona->nombre, // nombre del implicado
        ]);
        $juez->delete();
        $persona->delete();
        return redirect()->route('juez.index');
    }
}
