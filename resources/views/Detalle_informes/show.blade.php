{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Detalle de Informes')

{{-- Definimos el contenido --}}
@section('content')

    <!-- Importar Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table-container table {
            width: 100%;
            border: black dotted 1px
        }

        .btn-floating {
            float: right;
            margin-right: 50px;
            bottom: 10px
        }

        thead {
            background-color: antiquewhite
        }
    </style>
    </head>

    <body>
        <div class="container">
            <h1 class="center-align">Mostrar Detalle de informes</h1>

            <!-- Tabla para mostrar Detalles_informes -->
            <div class="table-container">
                <h5 class="card-title">Detalle de informes registrados</h5>
                <a href="/Detalle_informes/create" class="btn-floating btn-large waves-effect waves-light green">
                    <i class="material-icons">add</i>
                </a>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Informe</th>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Empleado</th>
                            <th>Pago</th>
                            <th>Reservación</th>
                            <th>Mesa</th>
                            <th>Promoción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Lista de Detalle_informes --}}
                        @foreach ($detalle_informes as $item)
                            <tr>
                                <td>{{ $item->codigo }}</td>
                                <td>{{ $item->id_informe }}</td>
                                <td>{{ $item->id_pedido }}</td>
                                <td>{{ $item->id_cliente }}</td>
                                <td>{{ $item->id_empleado }}</td>
                                <td>{{ $item->id_pago }}</td>
                                <td>{{ $item->id_reservacion }}</td>
                                <td>{{ $item->id_mesa }}</td>
                                <td>{{ $item->id_promocion }}</td>
                                <td>
                                    <a class="btn-small blue btn-editar"
                                        href="/Detalle_informes/edit/{{ $item->codigo }}"><i
                                            class="material-icons">edit</i></a>
                                    <button class="btn-small red btn-eliminar" onclick="destroy(this)"
                                        url="/Detalle_informes/destroy/{{ $item->codigo }}" token="{{ csrf_token() }}"><i
                                            class="material-icons">
                                            delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Importar Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        {{-- SweetAlert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- JS --}}
        <script src="{{ asset('js/detalle_informe.js') }}"></script>
    @endsection
