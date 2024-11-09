{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Platos')

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

    <h1 class="center-align">Mostrar Platos</h1>
    <hr>

    <div class="table-container">
        <h5 class="card-title">Platos registrados</h5>
        <a class="btn-floating btn-large waves-effect waves-light green" href="/Platos/create"><i
                class="material-icons">add</i></a>
                <a class="btn btn-primary btn-sm" href="/reports12" target="_blank">Generar reporte</a>
        
                <table class="highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Ingredientes</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Listado de platos --}}
                @foreach ($platos as $item)
                    <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>{{ $item->ingredientes }}</td>
                        <td>{{ $item->id_categoria }}</td>
                        <td>
                            <a class="btn-small blue btn-editar" href="/Platos/edit/{{ $item->codigo }}"><i
                                    class="material-icons">edit</i></a>
                            <button class="btn-small red btn-eliminar" onclick="destroy(this)"
                                url="/Platos/destroy/{{ $item->codigo }}" token="{{ csrf_token() }}"><i
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
    <script src="{{ asset('js/plato.js') }}"></script>
@endsection
