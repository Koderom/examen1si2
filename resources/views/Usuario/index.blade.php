@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            GESTIONAR USUARIOS
        </h2>
        @can('user.create')
        <a class="create-button" href="{{ route('user.create') }}">
            crear nuevo usuario
        </a>    
        @endcan
        
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Opciones</th>
            </tr>
            @foreach ($Users as $user)
                <tr class="data-row">
                    <td>{{$user->id}}</td>
                    <td>{{$user->persona->nombre}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="opciones-list">
                            @can('user.edit')
                            <a href="{{ route('user.edit',$user)}}" class="icon edit"> <i class="fa-solid fa-file-pen fa-lg"></i></a>    
                            @endcan
                            @can('user.destroy')
                            <form action="{{ route('user.destroy', $user) }}" method="POST">
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