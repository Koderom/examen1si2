<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/registro.css') }}">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor-flex">
        <form method="POST" action="{{ route('registro.store',['plan'=>$plan]) }}" class="contenedor-registro" autocomplete="off">
            @csrf
            <h1>Ingrese sus datos para el registro</h1>
            <div class="contenedor-entrada">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
                @error('nombre')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="ci">Numero de documento de identidad</label>
                <input type="number" id="ci" name="ci" value="{{old('ci')}}">
                @error('ci')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad" value="{{old('edad')}}"> 
                @error('edad')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="direccion">Direccion de referencia</label>
                <input type="text" id="direccion" name="direccion" value="{{old('direccion')}}">
                @error('direccion')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
                @error('sexo')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="telefono">Numero de telefono</label>
                <input type="number" name="telefono" id="telefono" value="{{old('telefono')}}">
                @error('telefono')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="email">Correo electronico</label>
                <input type="email" name="email" id="email" value="{{old('email')}}">
                @error('email')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="contenedor-entrada">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="{{old('Elija una contraseña')}}">
                @error('password')
                    <small class="mensaje-error">*{{$message}}</small><br>
                @enderror
            </div>
            <div class="opciones">
                <button type="submit" class="boton-crear">Registrar</button>
            </div>
        </form>
        <footer>
        
        </footer>
    </div>
</body>
</html>