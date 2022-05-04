<?php

namespace App\Http\Controllers;

use App\Models\DemandanteProceso;
use Illuminate\Http\Request;

class DemandanteProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DemandanteProceso  $demandanteProceso
     * @return \Illuminate\Http\Response
     */
    public function show(DemandanteProceso $demandanteProceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandanteProceso  $demandanteProceso
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandanteProceso $demandanteProceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandanteProceso  $demandanteProceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandanteProceso $demandanteProceso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandanteProceso  $demandanteProceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandanteProceso $demandanteProceso)
    {
        //
    }
}
