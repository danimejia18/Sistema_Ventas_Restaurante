{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Pago')

{{-- Definimos el contenido --}}
@section('content')

    <!-- Importar Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
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
            border: black dotted 1px;
        }

        .btn-floating {
            float: right;
            margin-right: 50px;
            bottom: 10px;
        }

        thead {
            background-color: antiquewhite;
        }
    </style>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Crear Pago</h5>
            <form action="/Pagos/store" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_pedido">ID Pedido</label>
                        <select id="id_pedido" name="id_pedido" class="browser-default" required>
                            <option value="" disabled selected>Seleccione el ID del Pedido</option>
                            @foreach ($pedidos as $pedido)
                                <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
                                <!-- Muestra el ID del pedido -->
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <label for="monto">Monto</label>
                        <input id="monto" name="monto" type="number" step="0.01" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="metodo">Método</label>
                        <p>
                            <label>
                                <input type="checkbox" name="metodo[]" value="Efectivo" />
                                <span>Efectivo</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" name="metodo[]" value="Transferencia" />
                                <span>Transferencia</span>
                            </label>
                        </p>
                    </div>
                    <div class="input-field col s6">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" name="fecha" type="date" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="estado">Estado</label>
                        <p>
                            <label>
                                <input type="checkbox" name="estado[]" value="Pendiente" />
                                <span>Pendiente</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" name="estado[]" value="Cancelado" />
                                <span>Cancelado</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col s6">
                        <button class="btn waves-effect waves-light" type="submit">Guardar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="col s6">
                        <a class="btn waves-effect waves-light" href="/Pagos/show">Cancelar
                            <i class="material-icons right">cancel</i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/pago.js') }}"></script>
@endsection
