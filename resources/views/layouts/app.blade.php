<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Cambiar el fondo del menú a negro */
        .navbar {
            background-color: #000; /* Fondo negro */
        }
    
        /* Cambiar el color del texto del menú a blanco */
        .navbar a, /* Enlaces del menú */
        .dropdown-item { /* Elementos del submenú */
            color: #fff; /* Texto blanco */
        }
    
        /* Cambiar el color del texto del menú al pasar el mouse */
        .navbar a:hover,
        .dropdown-item:hover {
            color: #fff; /* Mantener texto blanco al pasar el mouse */
            background-color: rgba(255, 255, 255, 0.1); /* Fondo gris claro al pasar el mouse */
        }
    
        /* Asegúrate de que el menú desplegable tenga poco margen */
        .dropdown-menu {
            padding: 0; /* Elimina el padding interno del menú */
            margin: 0; /* Elimina el margen externo del menú */
            min-width: 100px; /* Establece un ancho mínimo para el menú */
            background-color: #000; /* Fondo negro para el menú desplegable */
        }
    
        /* Asegúrate de que los elementos del menú tengan poco padding */
        .dropdown-item {
            padding: 5px 10px; /* Ajusta el padding interno de los elementos */
            line-height: 1.5; /* Ajusta la altura de línea */
        }
    
        /* Asegúrate de que el submenú tenga poco margen */
        .dropdown-menu.show {
            margin-top: -35px; /* Ajusta este valor para reducir el espacio */
        }
    </style>
      
    
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name','Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="/">Inicio</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" href="#"  data-bs-toggle="dropdown" aria-expanded="false">
                                Accesos
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/Acceso/show">Accesos</a> <!-- Ruta para ingresar accesos -->
                                    <a class="dropdown-item" href="/Empleados/show">Empleados</a> <!-- Ruta para ingresar empleados -->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" href="#" data-bs-toggle="dropdown">
                                Menú
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/Menus/show">Menú</a>
                                    <a class="dropdown-item" href="/Platos/show">Platos</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" role="button" href="/Clientes/show">
                                Clientes
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" href="#" data-bs-toggle="dropdown">
                                Productos
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/Productos/show">Productos</a>
                                    <a class="dropdown-item" href="/Categorias/show">Categorías</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" role="button" href="/Mesas/show">
                                Mesas
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"  role="button" href="/Promociones/show">
                                Promociones
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" href="#" data-bs-toggle="dropdown">
                                Pedidos
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/Pedidos/show">Pedido</a>
                                    <a class="dropdown-item" href="/Detalle_pedidos/show">Detalle de pedido</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" href="Reservaciones/show" data-bs-toggle="dropdown">
                                Reservaciones
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="Reservaciones/show">Reservaciones</a>
                                    <a class="dropdown-item" href="Pagos/show">Pagos</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" href="/Informes/show" data-bs-toggle="dropdown">
                                Informes
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="Informes/show">Informes</a>
                                    <a class="dropdown-item" href="Detalle_informes/show">Detalles de informes</a>
                                </li>
                            </ul>
                        </li>

                        {{-- Agregamos las opciones de menú ya trabajadas --}}
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
{{-- Scrpts --}}
    {{-- Link de javaScript de Materialize --}}
    <script type="text/javascript" src="js/materialize.min.js"></script>
@yield('scripts')
