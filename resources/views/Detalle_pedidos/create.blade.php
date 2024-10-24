{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título de la página --}}
@section('title', 'Agregar Detalle de Pedidos')

{{-- Definimos el contenido principal --}}
@section('content')
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

@section('content')
    <h1 class="center-align">Agregar Detalle de pedido</h1>
    <br>
    <h3 class="center-align">Formulario para crear Detalle de pedido</h3>
    <div class="container"><br>
        <div class="table-container">
            <div class="form-container">
                <form action="/Detalle_pedidos/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="id_pedido">ID Pedido</label>
                            <br><br>
                            <select class="browser-default" id="id_pedido" name="id_pedido">
                                <option value="" disabled selected>Seleccione el ID del Pedido</option>
                                @foreach ($pedidos as $pedido)
                                    <option value="{{ $pedido->codigo }}">{{ $pedido->codigo }}</option>
                                @endforeach
                            </select>
                            @error('id_pedido')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field col s6">
                            <label for="id_producto">ID Producto</label>
                            <br><br>
                            <select class="browser-default" id="id_producto" name="id_producto">
                                <option value="" disabled selected>Seleccione el ID del Producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->codigo }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_producto')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" type="number" name="cantidad" class="validate" required>
                            @error('cantidad')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field col s6">
                            <label for="precio_unitario">Precio Unitario</label>
                            <input id="precio_unitario" type="decimal" name="precio_unitario" class="validate" required>
                            @error('precio_unitario')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <label for="subtotal">Subtotal</label>
                            <input id="subtotal" type="decimal" name="subtotal" class="validate" required>
                            @error('subtotal')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
                    <a class="btn waves-effect waves-light" href="/Detalle_pedidos/show">Cancelar
                        <i class="material-icons right">cancel</i>
                    </a>
                </div>
            </div>
                </form>
            </div>
        </div>
    @endsection
