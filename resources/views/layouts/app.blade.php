<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- Link de Materialize --}}
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Estilos para dropdowns anidados */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -5px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link text-black {{ Request::is('/') ? 'active' : '' }}" href="/">Inicio</a>
                        </li>
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                Accesos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/Accesos/show">Ver accesos</a></li>
                                <li><a class="dropdown-item" href="/Accesos/create">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <!-- Dropdown anidado -->
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Empleados</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                        <a class="dropdown-item" href="/Empleados/show">Ver Empleados</a>
                                        <a class="dropdown-item" href="/Empleados/create">Crear </a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                Menu
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/Clientes/show">Ver Menú</a></li>
                                <li><a class="dropdown-item" href="/Clientes/create">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <!-- Dropdown anidado -->
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Platos</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                    <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="/Platos/show">Ver Platos</a>
                                        <a class="dropdown-item" href="/Platos/create">Crear </a>
                                        <hr class="dropdown-divider">
                                    </ul>
                                </li>
                                <li class="dropdown-submenu dropdown-menu-llight">
                                    <a class="dropdown-item dropdown-toggle" href="#">Categorias</a>
                                    <ul class="dropdown-submenu dropdown-menu-llight">
                                    <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="/Categorias/show">Ver categorias</a>
                                        <a class="dropdown-item" href="/Categorias/create">Crear </a>
                                    <hr class="dropdown-divider">
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Clientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Menus/show">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="/Menus/create">Crear</a></li>
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Productos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Productos/show">Crear</a></li>
                                    <li><a class="dropdown-item" href="/Productos/create">Mostrar</a></li>
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mesas
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Mesas/show">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="/Mesas/create">Crear</a></li>
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Promociones
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Promociones/show">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="/Promociones/create">Crear</a></li>
                                </ul>
                            </li>
                        </div>
                        {{--aqui las opciones del menu que lleva los submenu--}}
                        
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                Pedidos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="Pedidos/show">Ver pedidos</a></li>
                                <li><a class="dropdown-item" href="Pedidos/create">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Detalle de pedido</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                        <a class="dropdown-item" href="/Detalle_pedidos/show">Ver Detalle de pedidos</a>
                                        <a class="dropdown-item" href="/Detalle_pedidos/create">Crear 2</a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                Reservaciones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="Reservaciones/show">Ver reseraciones</a></li>
                                <li><a class="dropdown-item" href="Reservaciones/create">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Pagos</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                        <a class="dropdown-item" href="/Pagos/show">Ver Pagos</a>
                                        <a class="dropdown-item" href="/Pagos/create">Crear</a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                Informes
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="Informes/show">Ver informes</a></li>
                                <li><a class="dropdown-item" href="Informes/create">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Detalle de informe</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                        <a class="dropdown-item" href="/Detalle_informe/show">Detalle de informes</a>
                                        <a class="dropdown-item" href="/Detalle_informe/create">Crear</a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
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
    {{-- Link de javaScript de Materialize --}}
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
