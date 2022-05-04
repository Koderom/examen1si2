@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/show.css') }}">
@endsection
@section('contenido')
    
    <section class="contenedor-show">
        <h2 class="titulo">DATOS DEL ABOGADO : {{$abogado->persona->nombre}}</h2>
        <div class="contenedor-campo">
            <span class="campo">Nombre y Apellido:</span>
            <span class="campo-valor">{{$abogado->persona->nombre}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Documento de identidad:</span>
            <span class="campo-valor">{{$abogado->persona->ci}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Edad:</span>
            <span class="campo-valor">{{$abogado->persona->edad}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Direccion de referencia:</span>
            <span class="campo-valor">{{$abogado->persona->direccion}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Direccion de trabajo:</span>
            <span class="campo-valor">{{$abogado->direccion_trabajo}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Sexo:</span>
            @if ($abogado->persona->sexo[0] ==="H")
                <span class="campo-valor">Hombre</span>    
            @else
                <span class="campo-valor">Mujer</span>
            @endif
            
        </div>
        
        <div class="contenedor-campo">
            <span class="campo">Telefono:</span>
            <span class="campo-valor">{{$abogado->persona->telefono}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Telefono trabajo:</span>
            <span class="campo-valor">{{$abogado->telefono_trabajo}}</span>
        </div>
        <a class="boton-salir "href="{{route('abogado.index')}}">volver</a>
    </section>
@endsection