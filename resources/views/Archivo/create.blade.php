@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        
        <h2 class="titulo-principal">
            REGESTRAR NUEVO ARCHIVO
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos del archivo
            </h2>
            <form method="POST" action="{{ route('archivo.store') }}" class="formulario" autocomplete="off"
            enctype="multipart/form-data">
                @csrf
                <div class="contenedor-entrada">
                    <label for="numero">Numero</label>
                    <input type="number" id="numero" name="numero" value="{{old('numero')}}">
                    @error('numero')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="fojas">Fojas</label>
                    <input type="number" id="fojas" name="fojas" value="{{old('fojas')}}">
                    @error('fojas')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="documento">Documento</label>
                    <input type="text" id="documento" name="documento" value="{{old('documento')}}">
                    @error('documento')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="referencia">Referencia</label>
                    <input type="text" id="referencia" name="referencia" value="{{old('referencia')}}">
                    @error('referencia')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <input type="hidden" id="expediente_id" name="expediente_id" value="{{$expedienteJudicial->id}}" >
                    @error('expediente_id')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="archivo">Archivo</label>
                    <input type="file" id="archivo" name="archivo" value="{{old('archivo')}}">
                    @error('archivo')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Registrar</button>
                    <a href="{{url()->previous()}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>    
    </div>
    

@endsection