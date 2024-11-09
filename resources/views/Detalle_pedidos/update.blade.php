@extends('layouts.app')

@section('title', 'Actualizar Detalle de Pedido')

@section('content')
    <!-- Importar Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
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
        <h1 class="text-center">Modificar</h1>
        <h5 class="text-center">Formulario para modificar Detalle de pedidos</h5>
        <div class="table-container">
            <div class="form-container">
                <form action="{{ route('detalle_pedidos.update', $detalle_pedido->codigo) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col s4 mb-3">
                            <label for="id_pedido">Pedido</label>
                            <select class="form-control" id="id_pedido" name="id_pedido" required>
                                @foreach ($pedidos as $item)
                                    <option value="{{ $item->codigo }}"
                                        {{ $detalle_pedido->id_pedido == $item->codigo ? 'selected' : '' }}>
                                        {{ $item->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_pedido')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col s4 mb-3">
                            <label for="id_plato">Plato</label>
                            <select class="form-control" id="id_plato" name="id_plato" required>
                                @foreach ($platos as $item)
                                    <option value="{{ $item->codigo }}"
                                        {{ $detalle_pedido->id_plato == $item->codigo ? 'selected' : '' }}>
                                        {{ $item->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_plato')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4 mb-3">
                            <label for="cantidad">Cantidad</label>
                            <input class="form-control" id="cantidad" type="number" name="cantidad"
                                value="{{ old('cantidad', $detalle_pedido->cantidad) }}" required
                                oninput="calculateSubtotal()"
                                style="border: 1px solid #bdbdbd; padding: 8px; border-radius: 4px;">
                            @error('cantidad')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col s4 mb-3">
                            <label for="precio_unitario">Precio Unitario</label>
                            <input class="form-control" id="precio_unitario" type="number" name="precio_unitario"
                                value="{{ old('precio_unitario', $detalle_pedido->precio_unitario) }}" step="0.01"
                                required oninput="calculateSubtotal()"
                                style="border: 1px solid #bdbdbd; padding: 8px; border-radius: 4px;">
                            @error('precio_unitario')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4 mb-3">
                            <label for="subtotal">Subtotal</label>
                            <input class="form-control" id="subtotal" type="number" name="subtotal" readonly
                                style="border: 1px solid #bdbdbd; padding: 8px; border-radius: 4px; background-color: #f1f1f1;"
                                value="{{ old('subtotal', $detalle_pedido->subtotal) }}">
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
    </div>

    <script>
        function calculateSubtotal() {
            const cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            const precioUnitario = parseFloat(document.getElementById('precio_unitario').value) || 0;
            const subtotal = cantidad * precioUnitario;
            document.getElementById('subtotal').value = subtotal.toFixed(2); // Muestra el subtotal con 2 decimales
        }
    </script>
@endsection
