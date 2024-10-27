{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título de la página --}}
@section('title', 'Modificar Detalle del Informe')

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
    <div class="container">
        <h3 class="center-align">Modificar Detalle del Informe</h3>

        <!-- Formulario para modificar un Detalle de Informe -->
        <div class="container form-container center">
            <form action="/Detalle_informes/update/{{ $detalle_informe->codigo }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_informe">ID Informe</label>
                        <br><br>
                        <select class="browser-default" id="id_informe" name="id_informe">
                            <option value="" disabled>Seleccione el ID del Informe</option>
                            @foreach ($informes as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_informe == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->codigo }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_informe')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="id_pedido">ID Pedido</label>
                        <br><br>
                        <select class="browser-default" id="id_pedido" name="id_pedido">
                            <option value="" disabled>Seleccione el ID del Pedido</option>
                            @foreach ($pedidos as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_pedido == $item->codigo ? 'selected' : '' }}>
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
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_cliente">ID Cliente</label>
                        <br><br>
                        <select class="browser-default" id="id_cliente" name="id_cliente">
                            <option value="" disabled>Seleccione el ID del Cliente</option>
                            @foreach ($clientes as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_cliente == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_cliente')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="id_empleado">ID Empleado</label>
                        <br><br>
                        <select class="browser-default" id="id_empleado" name="id_empleado">
                            <option value="" disabled>Seleccione el ID del Empleado</option>
                            @foreach ($empleados as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_empleado == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_empleado')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_pago">ID Pago</label>
                        <br><br>
                        <select class="browser-default" id="id_pago" name="id_pago">
                            <option value="" disabled>Seleccione el ID del Pago</option>
                            @foreach ($pagos as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_pago == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->codigo }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_pago')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="id_reservacion">ID Reservación</label>
                        <br><br>
                        <select class="browser-default" id="id_reservacion" name="id_reservacion">
                            <option value="" disabled>Seleccione el ID de la Reservación</option>
                            @foreach ($reservaciones as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_reservacion == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->codigo }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_reservacion')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_mesa">ID Mesa</label>
                        <br><br>
                        <select class="browser-default" id="id_mesa" name="id_mesa">
                            <option value="" disabled>Seleccione el ID de la Mesa</option>
                            @foreach ($mesas as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_mesa == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->numero }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_mesa')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="id_promocion">ID Promoción</label>
                        <br><br>
                        <select class="browser-default" id="id_promocion" name="id_promocion">
                            <option value="" disabled>Seleccione el ID de la Promoción</option>
                            @foreach ($promociones as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $detalleInforme->id_promocion == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_promocion')
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
                        <a class="btn waves-effect waves-light" href="/Detalle_informe/show">Cancelar
                            <i class="material-icons right">cancel</i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
