@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
@endsection
@section('contenido')
<div class="container-section">
    <header >
        <h2 class="title">
            GESTIONAR EXPEDIENTES
        </h2>
        <a class="create-button" href="{{ route('user.create') }}">
            crear nuevo usuario
        </a>
    </header>
    <section>
        <table>
            <tr>
                <th>ID</th>
                <th>Expediente</th>
                <th>Fecha de Ingreso</th>
                <th>Distrito</th>
                <th>Oficina</th>
                <th>Opciones</th>
            </tr>
            {{--
            @foreach ($Expedientes as $expediente)
                <tr class="data-row">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{ route('user.edit',$user)}}"> Actualizar</a>
                        <form action="{{ route('user.destroy', $user) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit"> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach  
                --}}
            
        </table>
    </section>
    
    
</div>
@endsection