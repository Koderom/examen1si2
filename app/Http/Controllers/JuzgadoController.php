<?php

namespace App\Http\Controllers;

use App\Models\Juzgado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuzgadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:juzgado.index')->only('index');
        $this->middleware('can:juzgado.create')->only('create');
        $this->middleware('can:juzgado.store')->only('store');
        $this->middleware('can:juzgado.destroy')->only('destroy');
        $this->middleware('can:juzgado.show')->only('show');
        $this->middleware('can:juzgado.update')->only('update');
    }
    public function index()
    {
        $juzgados = Juzgado::all();
        return view('juzgado.index',['Juzgados'=>$juzgados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Juzgado.create');
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
            'juzgado'=>'required',
            'nro_interno'=>'required',
            'ubicacion'=>'required',
        ]);
        $mytime= Carbon::now('America/La_Paz'); 
        
        $juzgado = new Juzgado();
        $juzgado->juzgado = $request->input('juzgado');
        $juzgado->nro_interno = $request->input('nro_interno');
        $juzgado->ubicacion = $request->input('ubicacion');
        $juzgado->save();
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'juzgados', //tabla
            'C', //accion
            $juzgado->id,// id del implicodo
            $juzgado->juzgado, // nombre del implicado
        ]);
        return redirect()->route('juzgado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function show(Juzgado $juzgado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function edit(Juzgado $juzgado)
    {
        return view('Juzgado.edit',['juzgado'=>$juzgado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juzgado $juzgado)
    {
        $juzgado->juzgado = $request->input('juzgado');
        $juzgado->nro_interno = $request->input('nro_interno');
        $juzgado->ubicacion = $request->input('ubicacion');

        $mytime= Carbon::now('America/La_Paz'); 

        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'juzgados', //tabla
            'U', //accion
            $juzgado->id,// id del implicodo
            $juzgado->juzgado, // nombre del implicado
        ]);
        $juzgado->save();
        return redirect()->route('juzgado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juzgado $juzgado)
    {
        $mytime= Carbon::now('America/La_Paz'); 

        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'juzgados', //tabla
            'D', //accion
            $juzgado->id,// id del implicodo
            $juzgado->juzgado, // nombre del implicado
        ]);
        $juzgado->delete();
        return redirect()->route('juzgado.index');
    }
}
