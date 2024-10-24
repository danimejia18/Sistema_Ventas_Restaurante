{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título de la página --}}
@section('title', 'Detalle del Pedido')

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

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Agregar Nuevo Detalle</h5>
            <form action="/Detalle_informes/store" method="POST">
                @csrf
                <div class="row">
                    <div class="col s6">
                        <label for="id_informe">ID Informe</label>
                        <select name="id_informe" id="id_informe" class="form-control">
                            @foreach ($informes as $item)
                                <option value="{{ $item->codigo }}">{{ $item->codigo }}</option><br><br>
                            @endforeach
                        </select>
                        @error('id_informe')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                    </div>
                    <div class="col s6">
                        <label for="id_pedido">ID Pedido</label>
                        <select name="id_pedido" id="id_pedido" class="form-control">
                            @foreach ($pedidos as $item)
                                <option value="{{ $item->codigo }}"></option>
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
                    <div class="col s6">
                        <label for="id_cliente">ID Cliente</label>
                        <select name="id_cliente" id="id_cliente" class="form-control">
                            @foreach ($clientes as $item)
                                <option value="{{ $item->codigo }}">
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
                    <br>
                    <div class="col s6">
                        <label for="id_empleado">ID Empleado</label>
                        <select name="id_empleado" id="id_empleado" class="form-control">
                            @foreach ($empleados as $item)
                                <option value="{{ $item->codigo }}">
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
                </div><br>
                <div class="row">
                    <div class="col s6">
                        <label for="id_reservacion">ID Pago</label>
                        <select name="id_reservacion" id="id_reservacion" class="form-control">
                            @foreach ($pagos as $item)
                                <option value="{{ $item->codigo }}"></option>
                            @endforeach
                        </select>
                        @error('id_pago')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col s6">
                        <label for="id_reservacion">ID Reservación</label>
                        <select name="id_reservacion" id="id_reservacion" class="form-control">
                            @foreach ($reservaciones as $item)
                                <option value="{{ $item->codigo }}"></option>
                            @endforeach
                        </select>
                        @error('id_reservacion')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div><br>

                <div class="row">
                    <div class="col s6">
                        <label for="id_mesa">ID Mesa</label>
                        <select name="id_mesa" id="id_mesa" class="form-control">
                            @foreach ($mesas as $item)
                                <option value="{{ $item->codigo }}">
                                    {{ $item->numero }} </option>
                            @endforeach
                        </select>
                        @error('id_mesa')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col s6">
                        <label for="id_promocion">ID Promoción</label>
                        <select name="id_promocion" id="id_promocion" class="form-control">
                            @foreach ($promociones as $item)
                                <option value="{{ $item->codigo }}">
                                    {{ $item->nombre }} </option>
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
                        <a class="btn waves-effect waves-light" href="/Detalle_informes/show">Cancelar
                            <i class="material-icons right">cancel</i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
