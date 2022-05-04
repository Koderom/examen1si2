@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/show.css') }}">
@endsection
@section('contenido')
    
    <section class="contenedor-show">
        <h2 class="titulo">CONTENIDO</h2>
        @if (str_contains($archivo->contenido, ".pdf"))
            <iframe class="pdf-documento"src="{{asset($archivo->contenido)}}" frameborder="0"></iframe>
        @else
            <img class="img-documento"src="{{$archivo->contenido}}">        
        @endif
        <div class="opciones">
            <a class="boton-salir "href="{{route('expedienteJudicial.index',$archivo->expedienteJudicial->procesoJudicial)}}">volver</a>
        </div>
    </section>
@endsection