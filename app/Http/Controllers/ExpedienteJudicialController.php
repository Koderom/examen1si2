<?php

namespace App\Http\Controllers;

use App\Models\ExpedienteJudicial;
use App\Models\ProcesoJudicial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpedienteJudicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $PJudicial;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:expedienteJudicial.index')->only('index');
        $this->middleware('can:expedienteJudicial.create')->only('create');
        $this->middleware('can:expedienteJudicial.store')->only('store');
        $this->middleware('can:expedienteJudicial.destroy')->only('destroy');
        $this->middleware('can:expedienteJudicial.show')->only('show');
        $this->middleware('can:expedienteJudicial.update')->only('update');
    }
    public function index(ProcesoJudicial $procesoJudicial)
    {
        $PJudicial   = $procesoJudicial;
        $expedienteJudicial = $procesoJudicial->expedienteJudicial;
        $Archivos = $expedienteJudicial->archivo;
        return view('ExpedienteJudicial.index',[
            'procesoJudicial'=>$procesoJudicial,
            'Archivos'=>$Archivos,
            'expedienteJudicial'=>$expedienteJudicial,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProcesoJudicial $procesoJudicial)
    {
        return view('ExpedienteJudicial.create',['procesoJudicial'=> $procesoJudicial]);
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
            'codigo_expediente'=>'required',
            'distrito'=>'required',
            'oficina'=>'required',
            'proceso_id'=>'required',
        ]);
        $procesoJudicial = ProcesoJudicial::find($request->input('proceso_id'));
        $mytime= Carbon::now('America/La_Paz');
        $expedienteJudicial = new ExpedienteJudicial();
        $expedienteJudicial->codigo_expediente = $request->input('codigo_expediente');
        $expedienteJudicial->fecha_ingreso = $mytime->toDateString();
        $expedienteJudicial->distrito = $request->input('distrito');
        $expedienteJudicial->oficina = $request->input('oficina');
        $expedienteJudicial->proceso_judicial_id = $request->input('proceso_id');
        $expedienteJudicial->save();
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'expedientes', //tabla
            'C', //accion
            $expedienteJudicial->id,// id del implicodo
            $expedienteJudicial->codigo_expediente, // nombre del implicado
        ]);
        return redirect()->route('expedienteJudicial.index',['procesoJudicial'=>$procesoJudicial]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpedienteJudicial  $expedienteJudicial
     * @return \Illuminate\Http\Response
     */
    public function show(ExpedienteJudicial $expedienteJudicial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpedienteJudicial  $expedienteJudicial
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpedienteJudicial $expedienteJudicial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpedienteJudicial  $expedienteJudicial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpedienteJudicial $expedienteJudicial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpedienteJudicial  $expedienteJudicial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpedienteJudicial $expedienteJudicial)
    {
        //
    }
}
