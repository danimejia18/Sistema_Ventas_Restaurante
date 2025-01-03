{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Pagos')

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

    <h1 class="text-center">Actualizar Pago</h1>
    <h5 class="text-center">Formulario para actualizar el pago seleccionado</h5>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Modificar Pago</h5>
            <form action="/Pagos/update/{{ $pago->codigo }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col s4 mb-3">
                        <label for="id_pedido">Pedido</label>
                        <select class="form-control" id="id_pedido" name="id_pedido" required>
                            <option value="" disabled selected>Seleccione el ID del Pedido</option>
                            @foreach ($pedidos as $item)
                            <option value="{{ $item->codigo }}"
                                {{ $pago->id_pedido == $item->codigo ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option> @endforeach
                        </select>
                    </div>
                    <div class="col s4 mb-3">
                        <label for="monto">Monto</label>
                        <input type="number" class="form-control" name="monto" id="monto"
                            value="{{ $pago->monto }}">
                        @error('nonto')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 mb-3">
                        <label for="metodo">Método</label>
                        <p>
                            <label>
                                <input type="checkbox" name="metodo" value="efectivo"
                                    {{ strpos($pago->metodo ?? '', 'efectivo') !== false ? 'checked' : '' }} />
                                <span>Efectivo</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" name="metodo" value="tarjeta"
                                    {{ strpos($pago->metodo ?? '', 'tarjeta') !== false ? 'checked' : '' }} />
                                <span>Tarjeta</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" name="metodo" value="transferencia"
                                    {{ strpos($pago->metodo ?? '', 'transferencia') !== false ? 'checked' : '' }} />
                                <span>Transferencia</span>
                            </label>
                        </p>
                        @error('metodo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 mb-3">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" class="form-control"
                               value="{{ \Carbon\Carbon::parse($pago->fecha)->format('Y-m-d') }}" required>
                        @error('fecha')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    

                    <div class="col s4 mb-3">
                        <label for="estado">Estado</label>
                        <p>
                            <label>
                                <input type="radio" name="estado" value="pagado" 
                                       {{ (old('estado', $pago->estado ?? '') === 'pagado') ? 'checked' : '' }} required />
                                <span>Pagado</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="radio" name="estado" value="pendiente" 
                                       {{ (old('estado', $pago->estado ?? '') === 'pendiente') ? 'checked' : '' }} required />
                                <span>Pendiente</span>
                            </label>
                        </p>
                        @error('estado')
                            <span class="invalid-feedback d-block" role="alert">
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
@endsection
