<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Estilos para la navegación vertical */
        .vertical-nav {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .vertical-nav .nav-link {
            color: #333;
        }

        .vertical-nav .nav-link.active {
            background-color: #007bff;
            color: white;
        }

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
    {{-- Menú vertical --}}
    <div class="d-flex">
        <nav class="bg-dark navbar-dark vh-100 p-3" style="width: 262px;">
            <a class="navbar-brand text-white mb-4" href="#">Sistema de Ventas</a>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ Request::is('/') ? 'active' : '' }}" href="/">Inicio</a>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accesos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menus
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Platos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Empleados
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Clientes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mesas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Promociones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pedidos y Detalle de Pedidos
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Pedidos</a>
                            <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="#">Mostrar</a></li>
                                <li><a class="dropdown-item" href="#">Crear</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Detalle de Pedidos</a>
                            <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="#">Mostrar</a></li>
                                <li><a class="dropdown-item" href="#">Crear</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservaciones y pagos
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Reservaciones</a>
                            <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="#">Mostrar</a></li>
                                <li><a class="dropdown-item" href="#">Crear</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Pagos</a>
                            <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="#">Mostrar</a></li>
                                <li><a class="dropdown-item" href="#">Crear</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown mb-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informes y Detalle de Informes
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Informes</a>
                            <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="#">Mostrar</a></li>
                                <li><a class="dropdown-item" href="#">Crear</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Detalle de Informes</a>
                            <ul class="dropdown-submenu">
                                <li><a class="dropdown-item" href="#">Mostrar</a></li>
                                <li><a class="dropdown-item" href="#">Crear</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
        </nav>

        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
