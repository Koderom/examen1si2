@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/edit.css') }}">
@endsection
@section('contenido')
    <div class="container-section">
        <header>
            <h2>
                Editar usuario
            </h2>
        </header>
        <section>
            <form method="POST" action="{{ route('user.update', $user) }}" class="create-form" autocomplete="off" >
                @method('put')
                @csrf
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{$user->name}}">
                <label for="email">Correo electronico</label>
                <input type="email" id="email" name="email" value="{{$user->email}}">
                
                <button type="submit" class="create-button"> Guardad cambios</button>
            </form>
        </section>
    </div>
@endsection        