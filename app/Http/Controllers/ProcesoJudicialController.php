<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\DemandadoProceso;
use App\Models\DemandanteProceso;
use App\Models\Juez;
use App\Models\Persona;
use App\Models\ProcesoJudicial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ProcesoJudicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:procesoJudicial.index')->only('index');
        $this->middleware('can:procesoJudicial.create')->only('create');
        $this->middleware('can:procesoJudicial.store')->only('store');
        $this->middleware('can:procesoJudicial.destroy')->only('destroy');
        $this->middleware('can:procesoJudicial.show')->only('show');
        $this->middleware('can:procesoJudicial.update')->only('update');
    }
    public function index()
    {
    
        $ProcesoJucdicial = ProcesoJudicial::all();
        return view('ProcesoJudicial.index',['ProcesoJudicial'=>$ProcesoJucdicial]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Juezs = Juez::all();
        $Abogados = Abogado::all();
        $Personas = Persona::all();
        return view('ProcesoJudicial.create',['Juezs'=>$Juezs, 'Abogados'=>$Abogados,'Personas'=>$Personas]);
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
            'numero_registro'=>'required',
            'nombre_proceso'=>'required',
            'tipo_proceso'=>'required',
            'materia'=>'required',
            'juez'=>'required',
            'demandante'=>'required',
            'demandante_abogado'=>'required',
            'demandado'=>'required',
            'demandado_abogado'=>'required',
        ]);

        
        $proceso_judicial = new ProcesoJudicial();
        $mytime= Carbon::now('America/La_Paz');
        $proceso_judicial->numero_registro = $request->input('numero_registro');
        $proceso_judicial->fecha_recepcion = $mytime->toDateTimeString();
        $proceso_judicial->nombre_proceso = $request->input('nombre_proceso');
        $proceso_judicial->tipo_proceso = $request->input('tipo_proceso');
        $proceso_judicial->materia = $request->input('materia');
        $juez = Juez::find($request->input('juez'));
        $proceso_judicial->juez_id = $request->input('juez');
        $proceso_judicial->juzgado_id = $juez->juzgado->id;
        $proceso_judicial->save();

        // registro de demandante y demanda proceso
        $demandante_proceso = new DemandanteProceso();
        $demandante_proceso->persona_id = $request->input('demandante');
        $demandante_proceso->abogado_id = $request->input('demandante_abogado');
        $demandante_proceso->proceso_judicial_id = $proceso_judicial->id;
        $demandante_proceso->save();
        $demandado_proceso = new DemandadoProceso();
        $demandado_proceso->persona_id = $request->input('demandado');
        $demandado_proceso->abogado_id = $request->input('demandado_abogado');
        $demandado_proceso->proceso_judicial_id = $proceso_judicial->id;
        $demandado_proceso->save();
            
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'proceso judicial', //tabla
            'C', //accion
            $proceso_judicial->id,// id del implicodo
            $proceso_judicial->nombre_proceso, // nombre del implicado
        ]);
        return redirect()->route('procesoJudicial.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcesoJudicial  $procesoJudicial
     * @return \Illuminate\Http\Response
     */
    public function show(ProcesoJudicial $procesoJudicial)
    {   
        //demandado
        $demandado = $procesoJudicial->demandadoProceso[0];
        $demandante = $procesoJudicial->demandanteProceso[0];
        return view('ProcesoJudicial.show',[
            'demandado'=>$demandado,
            'demandante'=>$demandante,
            'procesoJudicial'=>$procesoJudicial
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcesoJudicial  $procesoJudicial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcesoJudicial $procesoJudicial)
    {
        $Juezs = Juez::all();
        return view('ProcesoJudicial.edit',['procesoJudicial'=>$procesoJudicial, 'Juezs'=>$Juezs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcesoJudicial  $procesoJudicial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcesoJudicial $procesoJudicial)
    {
        $request->validate([
            'numero_registro'=>'required',
            'nombre_proceso'=>'required',
            'tipo_proceso'=>'required',
            'materia'=>'required',
            'juez'=>'required',
        ]);
        $mytime= Carbon::now('America/La_Paz');
        $procesoJudicial->numero_registro = $request->input('numero_registro');
        $procesoJudicial->nombre_proceso = $request->input('nombre_proceso');
        $procesoJudicial->tipo_proceso = $request->input('tipo_proceso');
        $procesoJudicial->materia = $request->input('materia');
        $juez = Juez::find($request->input('juez'));
        $procesoJudicial->juez_id = $request->input('juez');
        $procesoJudicial->juzgado_id = $juez->juzgado->id;
        $procesoJudicial->update();
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'proceso judicial', //tabla
            'U', //accion
            $procesoJudicial->id,// id del implicodo
            $procesoJudicial->nombre_proceso, // nombre del implicado
        ]);

        return redirect()->route('procesoJudicial.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcesoJudicial  $procesoJudicial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcesoJudicial $procesoJudicial)
    {
        $procesoJudicial->delete();
        $mytime= Carbon::now('America/La_Paz'); 
        
        DB::statement('CALL insertar_bitacora(?,?,?,?,?,?,?)',[
            $mytime->toDateTimeString(),//hora y fecha
            auth()->user()->id, // id del autor
            auth()->user()->persona->nombre,//nombre del autor
            'proceso judicial', //tabla
            'D', //accion
            $procesoJudicial->id,// id del implicodo
            $procesoJudicial->nombre_proceso, // nombre del implicado
        ]);
        return redirect()->route('procesoJudicial.index');   
    }
}
