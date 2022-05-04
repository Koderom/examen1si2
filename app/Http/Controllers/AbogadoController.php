<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:abogado.index')->only('index');
        $this->middleware('can:abogado.create')->only('create');
        $this->middleware('can:abogado.store')->only('store');
        $this->middleware('can:abogado.destroy')->only('destroy');
        $this->middleware('can:abogado.show')->only('show');
        $this->middleware('can:abogado.update')->only('update');
    }
    public function index()
    {
        $Abogados = Abogado::all();
        return view('Abogado.index',['Abogados'=>$Abogados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Abogado.create');
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
            'direccion_trabajo'=>'required',
            'telefono_trabajo'=>'required',
        ]);
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        $persona->sexo = $request->input('sexo');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->tipo = 'A';
        $persona->save();

        $abogado = new Abogado();
        $abogado->direccion_trabajo = $request->input('direccion_trabajo');
        $abogado->telefono_trabajo = $request->input('telefono_trabajo');
        $abogado->persona_id = $persona->id;

        $mytime= Carbon::now('America/La_Paz'); 
        
        
        $abogado->save();
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
            'abogados', //tabla
            'C', //accion
            $abogado->id,// id del implicodo
            $abogado->persona->nombre, // nombre del implicado
        ]);
        return redirect()->route('abogado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function show(Abogado $abogado)
    {
        return view('Abogado.show',['abogado'=>$abogado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function edit(Abogado $abogado)
    {
        return view('Abogado.edit',['abogado'=>$abogado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abogado $abogado)
    {
        $request->validate([
            'nombre'=>'required',
            'ci'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'direccion_trabajo'=>'required',
            'telefono_trabajo'=>'required',
        ]);
        $persona = Persona::find($abogado->persona_id);
        $persona->nombre = $request->input('nombre');
        $persona->ci = $request->input('ci');
        $persona->edad = $request->input('edad');
        $persona->sexo = $request->input('sexo');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->tipo = 'A';
        $persona->update();
        $abogado->direccion_trabajo = $request->input('direccion_trabajo');
        $abogado->telefono_trabajo = $request->input('telefono_trabajo');
        $abogado->persona_id = $persona->id;
        $abogado->update();
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
            'abogados', //tabla
            'U', //accion
            $abogado->id,// id del implicodo
            $abogado->persona->nombre, // nombre del implicado
        ]);
        
        return redirect()->route('abogado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abogado $abogado)
    {
        $persona = Persona::find($abogado->persona->id);

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
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'abogados', //tabla
            'D', //accion
            $abogado->id,// id del implicodo
            $abogado->persona->nombre, // nombre del implicado
        ]);
        $abogado->delete();
        return redirect()->route('abogado.index');
    }
}
