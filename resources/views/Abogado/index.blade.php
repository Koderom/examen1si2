@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            LISTA DE ABOGADOS REGISTRADOS
        </h2>
        @can('abogado.create')
        <a class="create-button" href="{{ route('abogado.create') }}">
            Registrar nuevo
        </a>    
        @endcan
        
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono Personal</th>
                <th>Direccion</th>
                <th>Opciones</th>
            </tr>
            @foreach ($Abogados as $abogado)
                <tr class="data-row">
                    <td>{{$abogado->id}}</td>
                    <td>{{$abogado->persona->nombre}}</td>
                    <td>{{$abogado->persona->telefono}}</td>
                    <td>{{$abogado->persona->direccion}}</td>
                    <td class="opciones-list">
                        @can('abogado.edit')
                        <a href="{{ route('abogado.edit',$abogado)}}" class="icon edit"><i class="fa-solid fa-file-pen fa-lg"></i></a>    
                        @endcan
                        @can('abogado.show')
                            <a href="{{ route('abogado.show',$abogado)}}" class="icon show"> <i class="fa-solid fa-eye fa-lg"></i></a>    
                        @endcan
                        @can('abogado.destroy')
                            <form action="{{ route('abogado.destroy', $abogado) }}" method="POST">
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