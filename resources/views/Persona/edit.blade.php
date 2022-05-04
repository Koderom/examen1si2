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
                Ingrese los datos personales
            </h2>
            <form method="POST" action="{{ route('persona.update', $persona) }}" class="formulario" autocomplete="off">
                @method('put')
                @csrf
                <div class="contenedor-entrada">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre',$persona->nombre)}}">
                    @error('nombre')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="ci">Numero de documento de identidad</label>
                    <input type="number" id="ci" name="ci" value="{{old('ci',$persona->ci)}}">
                    @error('ci')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" name="edad" value="{{old('edad',$persona->edad)}}"> 
                    @error('edad')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="direccion">Direccion de referencia</label>
                    <input type="text" id="direccion" name="direccion" value="{{old('direccion',$persona->direccion)}}">
                    @error('direccion')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" id="sexo">
                        @if ($persona->sexo[0]=='H')
                            <option value="1" selected>Hombre</option>
                            <option value="2">Mujer</option>    
                        @else
                            <option value="1">Hombre</option>
                            <option value="2" selected>Mujer</option>
                        @endif
                        
                    </select>
                    @error('sexo')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="telefono">Numero de telefono</label>
                    <input type="number" name="telefono" id="telefono" value="{{old('telefono',$persona->telefono)}}">
                    @error('telefono')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Actualizar datos</button>
                    <a href="{{ route('persona.index')}}"" class="boton-salir">Cancelar</a>
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