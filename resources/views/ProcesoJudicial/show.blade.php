@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/show.css') }}">
@endsection
@section('contenido')
    
    <section class="contenedor-show">
        <h2 class="titulo">Datos del proceso</h2>
        <div class="contenedor-campo">
            <span class="campo">Numero de Registro:</span>
            <span class="campo-valor">{{$procesoJudicial->numero_registro}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Fecha y hora de recepcion:</span>
            <span class="campo-valor">{{$procesoJudicial->fecha_recepcion}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Nombre del proceso:</span>
            <span class="campo-valor">{{$procesoJudicial->nombre_proceso}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Tipo de proceso:</span>
            <span class="campo-valor">{{$procesoJudicial->tipo_proceso}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Materia: </span>
            <span class="campo-valor">{{$procesoJudicial->materia}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Juez a cargo: </span>
            <span class="campo-valor">{{$procesoJudicial->juez->persona->nombre}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Juzgado: </span>
            <span class="campo-valor">{{$procesoJudicial->juzgado->juzgado}}</span>
        </div>

        <h2 class="titulo">Datos del demandante</h2>
        <div class="contenedor-campo">
            <span class="campo">Nombre: </span>
            <span class="campo-valor">{{$demandante->persona->nombre}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Documento de identidad: </span>
            <span class="campo-valor">{{$demandante->persona->ci}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Domicilio: </span>
            <span class="campo-valor">{{$demandante->persona->direccion}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Abogado representante: </span>
            <span class="campo-valor">{{$demandante->abogado->persona->nombre}}</span>
        </div>
        <h2 class="titulo">Datos del demandado</h2>
        <div class="contenedor-campo">
            <span class="campo">Nombre: </span>
            <span class="campo-valor">{{$demandado->persona->nombre}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Documento de identidad: </span>
            <span class="campo-valor">{{$demandado->persona->ci}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Domicilio: </span>
            <span class="campo-valor">{{$demandado->persona->direccion}}</span>
        </div>
        <div class="contenedor-campo">
            <span class="campo">Abogado representante: </span>
            <span class="campo-valor">{{$demandado->abogado->persona->nombre}}</span>
        </div>
        <div class="opciones">
            <a class="boton-salir "href="{{route('procesoJudicial.index')}}">volver</a>
            @if ($procesoJudicial->expedienteJudicial == null)
                @can('expedienteJudicial.create')
                    <a href="{{ route('expedienteJudicial.create',$procesoJudicial) }}" class="boton-enlace">Registrar expediente judicial</a>                            
                @endcan
            @else
                <a href="{{ route('expedienteJudicial.index',$procesoJudicial) }}" class="boton-enlace">Gestionar expediente judicial</a>
            @endif
        </div>
        
    </section>
@endsection