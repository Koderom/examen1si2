@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        <h2>
            REGISTRAR NUEVO USUARIO
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos del Usuario
            </h2>
            <form method="POST" action="{{ route('user.store') }}" class="formulario" autocomplete="off" >
                @csrf
                <div class="contenedor-entrada">
                    <label for="email">Correo electronico</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}">
                    @error('password')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="">Asignar usuario a:</label>
                    <select name="persona" id="persona" value="{{old('persona')}}">
                        @foreach ($Personas as $persona)
                            <option value={{$persona->id}}>{{$persona->nombre}}</option>
                        @endforeach
                    </select>
                    @error('persona')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Crear Usuario</button>
                    <a href="{{ route('user.index')}}" class="boton-salir">Salir</a>
                </div>
                
            </form>
        </section>    
    </div>
    

@endsection