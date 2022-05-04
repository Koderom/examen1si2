@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/show.css') }}">
@endsection
@section('contenido')
    
    <section class="contenedor-show">
        <h2 class="titulo">DATOS DE LA PERSONA : {{$persona->nombre}}</h2>
        <div class="contenedor-campo">
            <span class="campo">Nombre y Apellido:</span>
            <span class="campo-valor">{{$persona->nombre}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Documento de identidad:</span>
            <span class="campo-valor">{{$persona->ci}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Edad:</span>
            <span class="campo-valor">{{$persona->edad}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Direccion de referencia:</span>
            <span class="campo-valor">{{$persona->direccion}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Sexo:</span>
            @if ($persona->sexo[0] ==="H")
                <span class="campo-valor">Hombre</span>    
            @else
                <span class="campo-valor">Mujer</span>
            @endif
            
        </div>
        <div class="contenedor-campo">
            <span class="campo">Telefono:</span>
            <span class="campo-valor">{{$persona->telefono}}</span>
        </div>
        
        <a class="boton-salir "href="{{route('persona.index')}}">volver</a>
    </section>
@endsection