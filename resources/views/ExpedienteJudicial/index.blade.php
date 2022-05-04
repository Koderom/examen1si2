@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            LISTA DE ARCHIVOS EN EL EXPEDIENTE
        </h2>        
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Numero</th>
                <th>Fecha</th>
                <th>Fojas</th>
                <th>Documento</th>
                <th>Referencia</th>
                <th>Opciones</th>
            </tr>
            @foreach ($Archivos as $archivo)
                <tr class="data-row">
                    <td>{{$archivo->id}}</td>
                    <td>{{$archivo->numero}}</td>
                    <td>{{$archivo->fecha}}</td>
                    <td>{{$archivo->fojas}}</td>
                    <td>{{$archivo->documento}}</td>
                    <td>{{$archivo->referencia}}</td>
                    <td >
                        <div class="opciones-list">
                            @can('archivo.edit')
                            <a href="{{ route('archivo.edit',$archivo)}}" class="icon edit"> <i class="fa-solid fa-file-pen fa-lg"></i></a>    
                            @endcan
                            @can('archivo.show')
                                <a href="{{ route('archivo.show',$archivo)}}" class="icon show"> <i class="fa-solid fa-eye fa-lg"></i></a>    
                            @endcan                            
                            @can('archivo.destroy')
                            <form action="{{ route('archivo.destroy', $archivo) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="icon delete"> <i class="fa-solid fa-trash-can fa-lg"></i></button>
                            </form>    
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        
    </section>
    @can('archivo.create')
        <a class="create-button" href="{{ route('archivo.create',$expedienteJudicial) }}">
            Agregar archivo al expediente
        </a>    
    @endcan
    
</div>
@endsection