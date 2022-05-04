<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('style/login.css') }}">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
        </style>
        <title>Examen1-SI2</title>
    </head>
    <body>
        <div class="login-container">

            <span class="saludo">Iniciar secion</span>
            
            <form class="login-form" method="POST" action="/login">
                @csrf
                <label for="email">Correo</label>
                <input name="email" id="email" type="email">
                <label for="password">Contraseña</label>
                <input name="password" id="password" type="password">
                <button type="submit">Iniciar secion</button>
            </form>
            <a href="{{ route('bienvenido',) }}" >volver</a>
        </div>
    </body>
</html>
