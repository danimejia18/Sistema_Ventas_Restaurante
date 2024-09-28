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
                                <li><a class="dropdown-item" href="/Accesos/Mostrar">Ver accesos</a></li>
                                <li><a class="dropdown-item" href="/Accesos/Crear">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <!-- Dropdown anidado -->
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Empleados</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                        <a class="dropdown-item" href="/Empleados/Mostrar">Ver Empleados</a>
                                        <a class="dropdown-item" href="/Empleados/Crear">Crear </a>
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
                                <li><a class="dropdown-item" href="/Clientes/Mostrar">Ver Menú</a></li>
                                <li><a class="dropdown-item" href="/Clientes/Crear">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <!-- Dropdown anidado -->
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Platos</a>
                                    <ul class="dropdown-submenu dropdown-menu-light">
                                    <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="/Platos/Mostrar">Ver Platos</a>
                                        <a class="dropdown-item" href="/Platos/Crear">Crear </a>
                                        <hr class="dropdown-divider">
                                    </ul>
                                </li>
                                <li class="dropdown-submenu dropdown-menu-llight">
                                    <a class="dropdown-item dropdown-toggle" href="#">Categorias</a>
                                    <ul class="dropdown-submenu dropdown-menu-llight">
                                    <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="/Categorias/Mostrar">Ver categorias</a>
                                        <a class="dropdown-item" href="/Categorias/Crear">Crear </a>
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
                                    <li><a class="dropdown-item" href="/Menus/Mostrar">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="/Menus/Crear">Crear</a></li>
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Productos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Productos/Mostrar">Crear</a></li>
                                    <li><a class="dropdown-item" href="/Productos/Crear">Mostrar</a></li>
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mesas
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Mesas/Mostrar">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="/Mesas/Crear">Crear</a></li>
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Promociones
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Promociones/Mostrar">Mostrar</a></li>
                                    <li><a class="dropdown-item" href="/Promociones/Crear">Crear</a></li>
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
                                <li><a class="dropdown-item" href="Pedidos/Mostrar">Ver pedidos</a></li>
                                <li><a class="dropdown-item" href="Pedidos/Crear">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Detalle de pedido</a>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="/Detalle_pedidos/Mostrar">Ver Detalle de pedidos</a></li>
                                        <li><a class="dropdown-item" href="/Detalle_pedidos/Crear">Crear 2</a></li>
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
                                <li><a class="dropdown-item" href="Reservaciones/Mostrar">Ver reseraciones</a></li>
                                <li><a class="dropdown-item" href="Reservaciones/Crear">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Pagos</a>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="/Pagos/Mostrar">Ver Pagos</a></li>
                                        <li><a class="dropdown-item" href="/Pagos/Crear">Crear</a></li>
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
                                <li><a class="dropdown-item" href="Informes/Mostrar">Ver informes</a></li>
                                <li><a class="dropdown-item" href="Informes/Crear">Crear</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropdown-menu-light">
                                    <a class="dropdown-item dropdown-toggle" href="#">Detalle de informe</a>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="/Detalle_informe/Mostrar">Detalle de informes</a></li>
                                        <li><a class="dropdown-item" href="/Detalle_informe/Crear">Crear</a></li>
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
</body>
</html>
