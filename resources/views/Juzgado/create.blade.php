@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        <h2 class="titulo-principal">
            Registrar nuevo juzgado
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos del Juzgado
            </h2>
            <form method="POST" action="{{ route('juzgado.store') }}" class="formulario" autocomplete="off" >
                @csrf
                <div class="contenedor-entrada">
                    <label for="juzgado">Juzgado</label>
                    <input type="text" id="juzgado" name="juzgado" value="{{old('juzgado')}}">
                    @error('juzgado')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="nro_interno">Numero interno</label>
                    <input type="number" id="nro_interno" name="nro_interno" value="{{old('nro_interno')}}">
                    @error('nro_interno')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" id="ubicacion" name="ubicacion" value="{{old('ubicacion')}}">
                    @error('ubicacion')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Registrar juzgado</button>
                    <a href="{{ route('juzgado.index')}}"" class="boton-salir">Salir</a>
                </div>
                
            </form>
        </section>    
    </div>
    

@endsection