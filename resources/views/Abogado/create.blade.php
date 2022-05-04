@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        <h2 class="titulo-principal">
            REGISTRAR NUEVO ABOGADO
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos del abogado
            </h2>
            <form method="POST" action="{{ route('abogado.store') }}" class="formulario" autocomplete="off">
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
                    <label for="direccion">Direccion de referencia personal</label>
                    <input type="text" id="direccion" name="direccion" value="{{old('direccion')}}">
                    @error('direccion')
                    <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="direccion_trabajo">Direccion de referencia del trabajo</label>
                    <input type="text" id="direccion_trabajo" name="direccion_trabajo" value="{{old('direccion_trabajo')}}">
                    @error('direccion_trabajo')
                    <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" id="sexo" value="{{old('sexo')}}">
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                    </select>    
                    @error('sexo')
                    <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="telefono">Numero de telefono personal</label>
                    <input type="number" name="telefono" id="telefono" value="{{old('telefono')}}">
                    @error('telefono')
                    <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="contenedor-entrada">
                    <label for="telefono_trabajo">Numero de telefono (Trabajo)</label>
                    <input type="number" name="telefono_trabajo" id="telefono_trabjao" value="{{old('contenedor_entrada')}}">
                    @error('telefono_trabajo')
                    <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                </div>

                <div class="opciones">
                    <button type="submit" class="boton-crear"> Crear Usuario</button>
                    <a href="{{ route('abogado.index')}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>    
    </div>
    

@endsection