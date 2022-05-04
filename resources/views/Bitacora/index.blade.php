@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            BITACORA
        </h2>
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>ID Actor</th>
                <th>Nombre</th>
                <th>Tabla</th>
                <th>Accion</th>
                <th>ID Implicado</th>
                <th>Implicado Nombre</th>
            </tr>
            @foreach ($bitacoras as $bitacora)
                <tr class="data-row">
                    <td>{{$bitacora->id}}</td>
                    <td>{{$bitacora->fecha_hora}}</td>
                    <td>{{$bitacora->user_id}}</td>
                    <td>{{$bitacora->user_nombre}}</td>
                    <td>{{$bitacora->tabla}}</td>
                    @switch($bitacora->accion[0])
                        @case('C')
                            <td>Crear</td>
                            @break
                        @case('U')
                            <td>Actualizar</td>
                            @break
                        @case('D')
                            <td>Borrar</td>
                            @break
                    @endswitch
                    <td>{{$bitacora->objeto_id}}</td>
                    <td>{{$bitacora->objeto_nombre}}</td>
                </tr>
            @endforeach
        </table>
    </section>
    
    
</div>
@endsection