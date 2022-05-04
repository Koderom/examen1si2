@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            LISTA DE IMPLICADOS
        </h2>
        @can('persona.create')
        <a class="create-button" href="{{ route('persona.create') }}">
            registrar nuevo
        </a>    
        @endcan
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CI</th>
                <th>Telefono</th>
                <th>Opciones</th>
            </tr>
            @foreach ($Personas as $persona)
                <tr class="data-row">
                    <td>{{$persona->id}}</td>
                    <td>{{$persona->nombre}}</td>
                    <td>{{$persona->ci}}</td>
                    <td>{{$persona->telefono}}</td>
                    <td class="opciones-list">
                        @can('persona.edit')
                        <a href="{{ route('persona.edit',$persona)}}" class="icon edit"> <i class="fa-solid fa-file-pen fa-lg"></i></a>    
                        @endcan
                        @can('persona.show')
                        <a href="{{ route('persona.show',$persona)}}" class="icon show"> <i class="fa-solid fa-eye fa-lg"></i></a>    
                        @endcan
                        @can('persona.destroy')
                        <form action="{{ route('persona.destroy', $persona) }}" method="POST">
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