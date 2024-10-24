{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Pedidos')

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
    </style>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Crear Pedido</h5>

            {{-- Formulario para crear pedido --}}
            <form action="/Pedidos/store" method="POST">
                @csrf

                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_cliente">Cliente</label>
                        <select class="browser-default" name="id_cliente" required>
                            <option value="" disabled selected>Seleccione un Cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_cliente')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s6">
                        <label for="id_empleado">Empleado</label>
                        <select class="browser-default" name="id_empleado" required>
                            <option value="" disabled selected>Seleccione un Empleado</option>
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_empleado')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" class="validate" required>
                        @error('fecha')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s6">
                        <label for="total">Total</label>
                        <input id="total" type="number" step="0.01" name="total" class="validate" required>
                        @error('total')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <label for="estado">Estado</label><br><br>
                        <p>
                            <label>
                                <input name="estado" type="radio" value="pendiente" required />
                                <span>Pendiente</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="estado" type="radio" value="cancelado" required />
                                <span>Cancelado</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="estado" type="radio" value="completado" required />
                                <span>Completado</span>
                            </label>
                        </p>
                        @error('estado')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col s6">
                        <button class="btn waves-effect waves-light" type="submit">Guardar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="col s6">
                        <a class="btn waves-effect waves-light" href="/Pedidos/show">Cancelar
                            <i class="material-icons right">cancel</i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
