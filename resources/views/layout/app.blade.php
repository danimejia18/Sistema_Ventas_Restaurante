<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:darkcyan">
    {{-- Nuestro menú --}}
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Ventas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accesos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menus
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Platos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Empleados
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Clientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mesas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Promociones
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pedidos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Detalle de Pedidos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservaciones
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pagos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Detalle de Informes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mostrar</a></li>
                            <li><a class="dropdown-item" href="#">Crear</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
      @yield('scripts')

</body>
</html>