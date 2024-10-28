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

<h3 class="text-center">Modificar Pedido</h3>

        <!-- Formulario para modificar informe -->
    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Pedidos registrados</h5>
            <form action="/Pedidos/update/{{ $pedidos->codigo }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $pedidos->nombre }}">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="id_cliente">Cliente</label>
                        <select type="text" class="form-control" name="id_cliente" id="id_cliente" value="{{ $pedidos->id_cliente }}" required>
                            @foreach ($clientes as $item)
                                <option value="{{ $item->codigo }}">
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_cliente')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 mt-3">
                        <label for="id_empleado">Empleado</label>
                        <select type="text" class="form-control" name="id_empleado" id="id_empleado" value="{{ $pedidos->id_empleado }}" required>
                            @foreach ($empleados as $item)
                                <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_empleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Campo de Fecha -->
                    <div class="col-md-6 mt-3">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" class="form-control" value="{{ $pedidos->fecha }}" required>
                        @error('fecha')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <!-- Campo de Total -->
                    <div class="col-md-6 mt-3">
                        <label for="total">Total</label>
                        <input id="total" type="number" name="total" class="form-control" value="{{ $pedidos->total }}" required>
                        @error('total')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12">
                        <fieldset>
                            <legend>Estado</legend> <!-- Cambia 'Estado' a un título sobre las opciones -->
                
                            <p>
                                <label>
                                    <input name="estado" type="radio" value=" {{ $pedidos->estado == 'pendiente' ? 'checked' : '' }}" required />
                                    <span>Pendiente</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="estado" type="radio" value="{{ $pedidos->estado == 'cancelado' ? 'checked' : '' }}" required />
                                    <span>Cancelado</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="estado" type="radio" value="{{ $pedidos->estado == 'completado' ? 'checked' : '' }}" required />
                                    <span>Completado</span>
                                </label>
                            </p>   
                
                            @error('estado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
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
