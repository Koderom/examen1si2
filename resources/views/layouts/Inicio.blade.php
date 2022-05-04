@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/dashboard.css') }}">
@endsection
@php
    use Carbon\Carbon;
    $h = Carbon::createFromTimeString(auth()->user()->suscripcion->tiempo);
    //$h = Carbon::createFromTimestamp(auth()->user()->suscripcion->tiempo);
    $hr = $h->toFormattedDateString(); 
@endphp

@section('contenido')
    <div class="inicio">
        <span class="saludo">Bienvenido!</span>
        <span class="saludo-persona">{{auth()->user()->persona->nombre}}</span>
        <span>Suscripcion valida hasta: {{$hr}}</span>
    </div>
@endsection