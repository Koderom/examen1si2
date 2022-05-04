@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="container-section">
        <header>
            <h2>
                Editar datos
            </h2>
        </header>
        <section>
            <form method="POST" action="{{ route('procesoJudicial.update', $procesoJudicial) }}" class="create-form" autocomplete="off" >
                @method('put')
                @csrf
                <h3 class="titulo">
                    Ingrese los datos del proceso
                  </h3>
                  <div class="contenedor-grupo-entrada">
                    <div class="contenedor-entrada">
                        <label for="numero_registro">Numero de registro</label>
                        <input type="number" id="numero_registro" name="numero_registro" value="{{old('numero_registro',$procesoJudicial->numero_registro)}}">
                        @error('numero_registro')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <label for="nombre_proceso">Nombre de proceso</label>
                        <input type="text" id="nombre_proceso" name="nombre_proceso" value="{{old('nombre_proceso',$procesoJudicial->nombre_proceso)}}">
                        @error('nombre_proceso')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <label for="tipo_proceso">Tipo de proceso</label>
                        <input type="text" id="tipo_proceso" name="tipo_proceso" value="{{old('tipo_proceso',$procesoJudicial->tipo_proceso)}}">
                        @error('tipo_proceso')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <label for="materia">Materia</label>
                        <input type="text" id="materia" name="materia" value="{{old('materia',$procesoJudicial->materia)}}">
                        @error('materia')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <label for="juez">Juez a cargo:</label>
                        <select name="juez" id="juez">
                            @foreach ($Juezs as $juez)
                                @if ($juez->id == $procesoJudicial->juez->id)
                                    <option value={{$juez->id}} selected>{{$juez->persona->nombre}}</option>    
                                @else
                                    <option value={{$juez->id}}>{{$juez->persona->nombre}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                        @error('juez')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                  </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Guardar cambios</button>
                    <a href="{{ route('procesoJudicial.index')}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
@endsection        