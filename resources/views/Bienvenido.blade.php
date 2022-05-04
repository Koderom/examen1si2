<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/bienvenido.css') }}">
    <title>Bienvenido</title>
</head>
<body>
    <header class="opciones">
        <a href="{{ route('login')}}" class="boton-login">Login</a>
    </header>
    <main>
        <span class="saludo">Bienvenido</span>
        <span class="descripcion-producto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque dolorem impedit totam aperiam deleniti illo magnam ex mollitia ea laborum.</span>
        <div class="precios">
            <div class="oferta">
                <span class="precio">Basico <br> 25bs/mes</span>
                <p class="descripcion-oferta">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta ea, esse deserunt maiores recusandae dolor hic, velit amet odit aliqui</p>
                <a href="{{ route('registro', ['plan'=>1]) }}" class="boton-comprar">Comprar</a>
            </div>
            <div class="oferta">
                <span class="precio">Premiun <br> 60bs/mes</span>
                <p class="descripcion-oferta">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta ea, esse deserunt maiores recusandae dolor hic, velit amet odit aliqui</p>
                <a href="{{ route('registro', ['plan'=>2]) }}" class="boton-comprar">Comprar</a>
            </div>
            <div class="oferta">
                <span class="precio">Platinum<br> 150bs/mes</span>
                <p class="descripcion-oferta">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta ea, esse deserunt maiores recusandae dolor hic, velit amet odit aliqui</p>
                <a href="{{ route('registro', ['plan'=>3]) }}" class="boton-comprar">Comprar</a>
            </div>
        </div>
    </main>
</body>
</html>