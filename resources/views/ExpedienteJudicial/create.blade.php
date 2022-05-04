@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        
        <h2 class="titulo-principal">
            REGESTRAR EXPEDIENTE PARA: {{$procesoJudicial->nombre_proceso}}
        </h2>
        <section>
            <h2 class="titulo">
                Ingrese los datos para el expediente
            </h2>
            <form method="POST" action="{{ route('expedienteJudicial.store')}}" class="formulario" autocomplete="off">
                @csrf
                <div class="contenedor-grupo-entrada">
                    <div class="contenedor-entrada">
                        <label for="codigo_expediente">Codigo de expediente</label>
                        <input type="number" id="codigo_expediente" name="codigo_expediente" value="{{old('codigo_expediente')}}">
                        @error('codigo_expediente')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <label for="distrito">Distrito</label>
                        <input type="text" id="distrito" name="distrito" value="{{old('distrito')}}">
                        @error('distrito')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <label for="oficina">Oficina</label>
                        <input type="text" id="oficina" name="oficina" value="{{old('oficina')}}">
                        @error('oficina')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="contenedor-entrada">
                        <input type="hidden" id="proceso_id" name="proceso_id" value="{{$procesoJudicial->id}}">
                        @error('proceso_id')
                            <small class="mensaje-error">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Crear Expediente</button>
                    <a href="{{url()->previous()}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>    
    </div>
    

@endsection