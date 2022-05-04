@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            LISTA DE PROCESOS JUDICIALES
        </h2>
        @can('procesoJudicial.create')
        <a class="create-button" href="{{ route('procesoJudicial.create') }}">
            registrar nuevo
        </a>    
        @endcan
        
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Numero de registro</th>
                <th>Fecha de recepcion</th>
                <th>Nombre del proceso</th>
                <th>Tipo de proceso</th>
                {{-- <th>Juzgado</th>
                <th>Juez</th>
                <th>Demandante</th>
                <th>Demandado</th> --}}
                <th>Opciones</th>
            </tr>
            @foreach ($ProcesoJudicial as $procesoJudicial)
                <tr class="data-row">
                    <td>{{$procesoJudicial->id}}</td>
                    <td>{{$procesoJudicial->numero_registro}}</td>
                    <td>{{$procesoJudicial->fecha_recepcion}}</td>
                    <td>{{$procesoJudicial->nombre_proceso}}</td>
                    <td>{{$procesoJudicial->tipo_proceso}}</td>
                    {{-- <td>{{$procesoJudicial->juez->persona->nombre}}</td>
                    <td>{{$procesoJudicial->juzgado->nombre}}</td> --}}
                    <td >
                        <div class="opciones-list">
                            @can('procesoJudicial.edit')
                            <a href="{{ route('procesoJudicial.edit',$procesoJudicial)}}" class="icon edit"> <i class="fa-solid fa-file-pen fa-lg"></i></a>    
                            @endcan
                            @can('procesoJudicial.show')
                            <a href="{{ route('procesoJudicial.show',$procesoJudicial)}}" class="icon show"> <i class="fa-solid fa-eye fa-lg"></i></a>    
                            @endcan
                            @can('procesoJudicial.destroy')
                            <form action="{{ route('procesoJudicial.destroy', $procesoJudicial) }}" method="POST">
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
    
    
</div>
@endsection