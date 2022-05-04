@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        
        <h2 class="titulo-principal">
            EDITAR DATOS
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos
            </h2>
            <form method="POST" action="{{ route('archivo.update', $archivo) }}" class="formulario" autocomplete="off">
                @method('put')
                @csrf
                <div class="contenedor-entrada">
                    <label for="numero">Numero</label>
                    <input type="number" id="numero" name="numero" value="{{old('numero',$archivo->numero)}}">
                    @error('numero')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="fojas">Fojas</label>
                    <input type="number" id="fojas" name="fojas" value="{{old('fojas',$archivo->fojas)}}">
                    @error('fojas')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="documento">Documento</label>
                    <input type="text" id="documento" name="documento" value="{{old('documento',$archivo->documento)}}">
                    @error('documento')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="referencia">Referencia</label>
                    <input type="text" id="referencia" name="referencia" value="{{old('referencia',$archivo->referencia)}}">
                    @error('referencia')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Crear Usuario</button>
                    <a href="{{url()->previous()}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>    
    </div>
    

@endsection

{{-- @extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/edit.css') }}">
@endsection
@section('contenido')
    <div class="container-section">
        <header>
            <h2>
                Editar usuario
            </h2>
        </header>
        <section>
            <form method="POST" action="{{ route('user.update', $user) }}" class="create-form" autocomplete="off" >
                @method('put')
                @csrf
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{$user->name}}">
                <label for="email">Correo electronico</label>
                <input type="email" id="email" name="email" value="{{$user->email}}">
                
                <button type="submit" class="create-button"> Guardad cambios</button>
            </form>
        </section>
    </div>
@endsection         --}}