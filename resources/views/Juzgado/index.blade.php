@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            GESTIONAR JUZGADOS
        </h2>
        @can('juzgado.create')
            <a class="create-button" href="{{ route('juzgado.create') }}">
            Registrar nuevo juzgado
        </a>    
        @endcan
        
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Juzgado</th>
                <th>Numero interno</th>
                <th>Ubicacion</th>
                <th>Opciones</th>
            </tr>
            @foreach ($Juzgados as $juzgado)
                <tr class="data-row">
                    <td>{{$juzgado->id}}</td>
                    <td>{{$juzgado->juzgado}}</td>
                    <td>{{$juzgado->nro_interno}}</td>
                    <td>{{$juzgado->ubicacion}}</td>
                    <td class="opciones-list">
                        @can('juzgado.edit')
                        <a href="{{ route('juzgado.edit',$juzgado)}}" class="icon edit"> <i class="fa-solid fa-file-pen fa-lg"></i></a>    
                        @endcan
                        @can('juzgado.destroy')
                        <form action="{{ route('juzgado.destroy', $juzgado) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="icon delete"> <i class="fa-solid fa-trash-can fa-lg"></i></button>
                        </form>    
                        @endcan
                        
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    
    
</div>
@endsection