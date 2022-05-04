@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="contenedor-create">
        
        <h2 class="titulo-principal">
            REGESTRAR NUEVO PROCESO JUDICIAL
        </h2>
        <section>
            <form method="POST" action="{{ route('procesoJudicial.store') }}" class="formulario" autocomplete="off">
                @csrf
                <h3 class="titulo">
                  Ingrese los datos del proceso
                </h3>
                <div class="contenedor-grupo-entrada">
                  <div class="contenedor-entrada">
                      <label for="numero_registro">Numero de registro</label>
                      <input type="number" id="numero_registro" name="numero_registro" value="{{old('numero_registro')}}">
                      @error('numero_registro')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="nombre_proceso">Nombre de proceso</label>
                      <input type="text" id="nombre_proceso" name="nombre_proceso" value="{{old('nombre_proceso')}}">
                      @error('nombre_proceso')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="tipo_proceso">Tipo de proceso</label>
                      <input type="text" id="tipo_proceso" name="tipo_proceso" value="{{old('tipo_proceso')}}">
                      @error('tipo_proceso')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="materia">Materia</label>
                      <input type="text" id="materia" name="materia" value="{{old('materia')}}">
                      @error('materia')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="juez">Juez a cargo:</label>
                      <select name="juez" id="juez">
                          @foreach ($Juezs as $juez)
                              <option value={{$juez->id}}>{{$juez->persona->nombre}}</option>
                          @endforeach
                      </select>
                      @error('juez')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                </div>
                <h3 class="titulo">
                  Seleccione a los implicados
                </h3>
                <div class="contenedor-grupo-entrada">
                  <div class="contenedor-entrada">
                    <label for="demandante">Seleccione al demandante:</label>
                    <select name="demandante" id="demandante">
                        @foreach ($Personas as $persona)
                            <option value={{$persona->id}}>{{$persona->nombre}}</option>
                        @endforeach
                    </select>
                    @error('demandante')
                        <small class="mensaje-error">*{{$message}}</small><br>
                    @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="demandante_abogado">Seleccione al abogado del demandante:</label>
                      <select name="demandante_abogado" id="demandante_abogado">
                          @foreach ($Abogados as $abogado)
                              <option value={{$abogado->id}}>{{$abogado->persona->nombre}}</option>
                          @endforeach
                      </select>
                      @error('demandante_abogado')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="demandado">Seleccione al demandado:</label>
                      <select name="demandado" id="demandado">
                          @foreach ($Personas as $persona)
                              <option value={{$persona->id}}>{{$persona->nombre}}</option>
                          @endforeach
                      </select>
                      @error('demandado')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                  <div class="contenedor-entrada">
                      <label for="demandado_abogado">Seleccione al abogado del demandado:</label>
                      <select name="demandado_abogado" id="demandado_abogado">
                          @foreach ($Abogados as $abogado)
                              <option value={{$abogado->id}}>{{$abogado->persona->nombre}}</option>
                          @endforeach
                      </select>
                      @error('demandado-abogado')
                          <small class="mensaje-error">*{{$message}}</small><br>
                      @enderror
                  </div>
                </div>
                
                <div class="opciones">
                    <button type="submit" class="boton-crear"> Registrar proceso</button>
                    <a href="{{ route('procesoJudicial.index')}}"" class="boton-salir">Cancelar</a>
                </div>
            </form>
        </section>    
    </div>
    

@endsection