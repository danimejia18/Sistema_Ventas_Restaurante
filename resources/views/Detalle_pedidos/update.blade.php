{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título de la página --}}
@section('title', 'Actualizar Detalle de Pedido')

{{-- Definimos el contenido principal --}}
@section('content')
    <style>
        /* Estilos personalizados */
        .form-container {
            margin-top: 20px;
        }

        .form-container form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-size: 1.2em;
            /* Ajusta el tamaño según lo que necesites */
            font-weight: bold;
            /* Opcional: negrita */
        }

        .form-label1 {
            font-size: 1.2em;
            /* Ajusta el tamaño según lo que necesites */
            font-weight: bold;
            /* Opcional: negrita */
        }
    </style>

    <h1 class="text-center">Modificar Detalle de pedido</h1>
    <br>
    <h5 class="text-center">Formulario para actualizar el Detalle de pedido</h5>
    <hr>

    <div class="container form-container center">
        <form action="/Detalle_pedidos/update/{{ $detalle_pedido->codigo }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="input-field col s6">
                    <label for="id_pedido">ID Pedido</label>
                    <br><br>
                    <select class="browser-default" id="id_pedido" name="id_pedido" required>
                        <option value="" disabled>Seleccione el ID del Pedido</option>
                        @foreach ($pedidos as $pedido)
                            <option value="{{ $pedido->codigo }}"
                                {{ $pedido->codigo == $detallePedido->id_pedido ? 'selected' : '' }}>
                                {{ $pedido->codigo }}
                            </option>
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
                    <select class="browser-default" id="id_producto" name="id_producto" required>
                        <option value="" disabled>Seleccione el ID del Producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->codigo }}"
                                {{ $producto->codigo == $detallePedido->id_producto ? 'selected' : '' }}>
                                {{ $producto->nombre }}
                            </option>
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
                    <input id="cantidad" type="number" name="cantidad" class="validate"
                        value="{{ old('cantidad', $detallePedido->cantidad) }}" required>
                    @error('cantidad')
                        <span class="helper-text red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s6">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input id="precio_unitario" type="decimal" name="precio_unitario" class="validate"
                        value="{{ old('precio_unitario', $detallePedido->precio_unitario) }}" required>
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
                    <input id="subtotal" type="decimal" name="subtotal" class="validate"
                        value="{{ old('subtotal', $detallePedido->subtotal) }}" required>
                    @error('subtotal')
                        <span class="helper-text red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col s6">
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
@endsection
