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

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Modificar Pago</h5>
            <form action="/Pagos/update/{{ $pago->codigo }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_pedido">ID_PEDIDO</label>
                        <select name="id_pedido" id="id_categoria" class="form-control">
                            @foreach ($pedidos as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $item->codigo == $pago->id_pedido ? 'selected' : '' }}>
                                    {{ $item->codigo }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="monto">Monto</label>
                        <br><br>
                        <input id="monto" type="decimal" class="validate" value="{{ $pago->monto }}" required>
                        @error('nonto')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="metodo">Método</label>
                        <br>
                        <p>
                            <label>
                                <input type="checkbox" checked="checked" />
                                <span>Efectivo</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" />
                                <span>Transferencia</span>
                            </label>
                        </p>
                    </div>
                    <div class="input-field col s6">
                        <label for="fecha">Fecha</label>
                        <br>
                        <input id="fecha" type="date" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="estado">Estado</label>
                        <br>
                        <p>
                            <label>
                                <input type="checkbox" />
                                <span>Pendiente</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" checked="checked" />
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
@endsection
