@extends('layouts.Dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('style/create.css') }}">
@endsection
@section('contenido')
    <div class="container-section">
        <header>
            <h2>
                Registrar nuevo usuario
            </h2>
        </header>
        <section>
            <form method="POST" action="{{ route('user.store') }}" class="create-form" autocomplete="off" >
                @csrf
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name">
                <label for="email">Correo electronico</label>
                <input type="email" id="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
                <button type="submit" class="create-button"> Crear Usuario</button>
            </form>
        </section>    
    </div>
    

@endsection