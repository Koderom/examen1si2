<?php

namespace App\Http\Controllers;

use App\Models\DemandadoProceso;
use Illuminate\Http\Request;

class DemandadoProcesoController extends Controller
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
     * @param  \App\Models\DemandadoProceso  $demandadoProceso
     * @return \Illuminate\Http\Response
     */
    public function show(DemandadoProceso $demandadoProceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandadoProceso  $demandadoProceso
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandadoProceso $demandadoProceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandadoProceso  $demandadoProceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandadoProceso $demandadoProceso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandadoProceso  $demandadoProceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandadoProceso $demandadoProceso)
    {
        //
    }
}
