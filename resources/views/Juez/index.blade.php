@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            LISTA DE JUECES REGISTRADOS
        </h2>
        @can('juez.create')
        <a class="create-button" href="{{ route('juez.create') }}">
            REGISTRAR NUEVO
        </a>    
        @endcan
        
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Juzgado</th>
                <th>Opciones</th>
            </tr>
            @foreach ($Juezs as $juez)
                <tr class="data-row">
                    <td>{{$juez->id}}</td>
                    <td>{{$juez->persona->nombre}}</td>
                    <td>{{$juez->juzgado->juzgado}}</td>
                    <td class="opciones-list">
                        @can('juez.edit')
                        <a href="{{ route('juez.edit',$juez)}}" class="icon edit"> <i class="fa-solid fa-file-pen fa-lg"></i></a>    
                        @endcan
                        @can('juez.show')
                        <a href="{{ route('juez.show',$juez)}}" class="icon show"> <i class="fa-solid fa-eye fa-lg"></i></a>
                        @endcan                        
                        @can('juez.destroy')
                        <form action="{{ route('juez.destroy', $juez) }}" method="POST">
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