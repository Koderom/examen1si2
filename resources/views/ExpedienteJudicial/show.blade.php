@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/show.css') }}">
@endsection
@section('contenido')
    
    <section class="contenedor-show">
        <h2 class="titulo">DATOS DEL JUEZ : {{$juez->persona->nombre}}</h2>
        <div class="contenedor-campo">
            <span class="campo">Nombre y Apellido:</span>
            <span class="campo-valor">{{$juez->persona->nombre}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Documento de identidad:</span>
            <span class="campo-valor">{{$juez->persona->ci}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Edad:</span>
            <span class="campo-valor">{{$juez->persona->edad}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Direccion de referencia:</span>
            <span class="campo-valor">{{$juez->persona->direccion}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Sexo:</span>
            @if ($juez->persona->sexo[0] ==="H")
                <span class="campo-valor">Hombre</span>    
            @else
                <span class="campo-valor">Mujer</span>
            @endif
            
        </div>
        <div class="contenedor-campo">
            <span class="campo">Juzgado:</span>
            <span class="campo-valor">{{$juez->juzgado->juzgado}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Telefono:</span>
            <span class="campo-valor">{{$juez->persona->telefono}}</span>
        </div>
        
        <a class="boton-salir "href="{{route('juez.index')}}">volver</a>
    </section>
@endsection