<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\ExpedienteJudicial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:archivo.index')->only('index');
        $this->middleware('can:archivo.create')->only('create');
        $this->middleware('can:archivo.store')->only('store');
        $this->middleware('can:archivo.destroy')->only('destroy');
        $this->middleware('can:archivo.show')->only('show');
        $this->middleware('can:archivo.update')->only('update');
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExpedienteJudicial $expedienteJudicial)
    {
        return view('Archivo.create',['expedienteJudicial'=>$expedienteJudicial]);
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
            'expediente_id'=>'required',
            'numero'=>'required',
            'fojas'=>'required',
            'documento'=>'required',
            'referencia'=>'required',
            'archivo'=>'required',

        ]);
        $archivo = new Archivo();
        $expedienteJudicial = ExpedienteJudicial::find($request->input('expediente_id'));
        $mytime= Carbon::now('America/La_Paz');
        $archivo->numero = $request->input('numero');
        $archivo->fecha = $mytime->toDateString();
        $archivo->fojas = $request->input('fojas');
        $archivo->documento = $request->input('documento');
        $archivo->referencia = $request->input('referencia');
        $imagenes = $request->file('archivo')->store('public');
        $url = Storage::url($imagenes);
        $archivo->contenido = $url;
        $archivo->expediente_judicial_id = $expedienteJudicial->id;
        $archivo->save();
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'archivos', //tabla
            'C', //accion
            $archivo->id,// id del implicodo
            $archivo->numero, // nombre del implicado
        ]);
        return redirect()->route('expedienteJudicial.index',['procesoJudicial'=>$expedienteJudicial->procesoJudicial]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        return view('Archivo.show',['archivo'=>$archivo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        return view('Archivo.edit',['archivo'=>$archivo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        $request->validate([
            'numero'=>'required',
            'fojas'=>'required',
            'documento'=>'required',
            'referencia'=>'required',
        ]);
        $expedienteJudicial = $archivo->expedienteJudicial;
        $mytime= Carbon::now('America/La_Paz');
        $archivo->numero = $request->input('numero');
        $archivo->fojas = $request->input('fojas');
        $archivo->documento = $request->input('documento');
        $archivo->referencia = $request->input('referencia');                
        $archivo->update();
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'archivos', //tabla
            'U', //accion
            $archivo->id,// id del implicodo
            $archivo->numero, // nombre del implicado
        ]);
        return redirect()->route('expedienteJudicial.index',['procesoJudicial'=>$expedienteJudicial->procesoJudicial]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        $procesoJudicial = $archivo->expedienteJudicial->procesoJudicial;
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'archivos', //tabla
            'D', //accion
            $archivo->id,// id del implicodo
            $archivo->numero, // nombre del implicado
        ]);
        $archivo->delete();
        return redirect()->route('expedienteJudicial.index',['procesoJudicial'=>$procesoJudicial]);
    }
}
