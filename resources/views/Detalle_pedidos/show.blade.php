{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Categoría')

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
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table-container table {
            width: 100%;
            border: black dotted 1px
        }

        .btn-floating {
            float: right;
            margin-right: 50px bottom: 10px
        }

        thead {
            background-color: antiquewhite
        }
    </style>

    <h3 class="center-align">Detalle de Pedidos</h3>
    <br>
    <div class="container">
        <!-- Mostrar Clientes -->
        <div class="table-container">
            <h5 class="card-title">Pedidos registrados</h5>
            <a href="/Detalle_pedidos/create" class="btn-floating btn-large waves-effect waves-light green"><i
                    class="material-icons">add</i></a>
            <a class="btn btn-primary btn-sm" href="/reports5" target="_blank">Generar reporte</a>
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pedido</th>
                        <th>Plato</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Lista de detalle_pedidos --}}
                    @foreach ($detalle_pedidos as $item)
                        <tr>
                            <td>{{ $item->codigo }}</td>
                            <td>{{ $item->id_pedido }}</td>
                            <td>{{ $item->id_plato }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>{{ $item->precio_unitario }}</td>
                            <td>{{ $item->subtotal }}</td>
                            <td>
                                <a class="btn-small blue btn-editar" href="/Detalle_pedidos/edit/{{ $item->codigo }}"><i
                                        class="material-icons">edit</i></a>
                                <button class="btn-small red btn-eliminar" onclick="destroy(this)"
                                    url="/Detalle_pedidos/destroy/{{ $item->codigo }}" token="{{ csrf_token() }}"><i
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
    <script src="{{ asset('js/detalle_pedido.js') }}"></script>
@endsection
