@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        
        <h2 class="titulo-principal">
            REGESTRAR NUEVO JUEZ
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos del Juez
            </h2>
            <form method="POST" action="{{ route('juez.store') }}" class="formulario" autocomplete="off">
                @csrf
                <div class="contenedor-entrada">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="ci">Numero de documento de identidad</label>
                    <input type="number" id="ci" name="ci" value="{{old('ci')}}">
                    @error('ci')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" name="edad" value="{{old('edad')}}"> 
                    @error('edad')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="direccion">Direccion de referencia</label>
                    <input type="text" id="direccion" name="direccion" value="{{old('direccion')}}">
                    @error('direccion')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" id="sexo">
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                    </select>
                    @error('sexo')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="juzgado">Juzgado al que pertenece:</label>
                    <select name="juzgado" id="juzgado">
                        @foreach ($Juzgados as $juzgado)
                            <option value={{$juzgado->id}}>{{$juzgado->juzgado}}</option>
                        @endforeach
                    </select>
                    @error('juzgado')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="telefono">Numero de telefono</label>
                    <input type="number" name="telefono" id="telefono" value="{{old('telefono')}}">
                    @error('telefono')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Crear Usuario</button>
                    <a href="{{ route('juez.index')}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>    
    </div>
    

@endsection