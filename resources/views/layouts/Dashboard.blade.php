<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('estilo')
    <title>Document</title>
</head>
<body>
    <div class="grid-container">
        <nav class="barra-navegacion">
            <div>Logo-Nombre</div>
            <ul>
                <li>{{auth()->user()->persona->nombre}}</li>
                <li>
                    <form action="{{ route('logout')}}" method="post">
                        @method('put')
                        @csrf
                        
                        <button type="submit" class="boton-logout"> Logout
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </button>
                        
                    </form>
                </li>
            </ul>
        </nav>
        <aside class="barra-lateral">
            <ul>
                <li><a href="{{ route('home')}}">Inicio</a></li>
                @can('user.edit')
                    <li><a href="{{ route('user.index')}}">Gestionar Usuarios</a></li>
                @endcan
                @can('procesoJudicial.index')
                    <li><a href="{{ route('procesoJudicial.index')}}"">Gestionar proceso</a></li>
                @endcan
                @can('juzgado.index')
                    <li><a href="{{route('juzgado.index')}}">Gestionar Juzgados</a></li>    
                @endcan
                @can('juez.index')
                    <li><a href="{{route('juez.index')}}">Autoridades judiciales</a></li>    
                @endcan
                @can('abogado.index')
                    <li><a href="{{route('abogado.index')}}">Gestionar abogados</a></li>    
                @endcan
                @can('persona.index')
                    <li><a href="{{route('persona.index')}}">Gestionar implicados</a></li>    
                @endcan
                @can('bitacora.index')
                    <li><a href="{{route('bitacora.index')}}">Ver Bitacora</a></li>    
                @endcan
            </ul>
            
        </aside>
        <div class="contenido-principal">
            
            @yield('contenido')
        </div>
    </div>
</body>
</html>