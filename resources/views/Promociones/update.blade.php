{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Promociones')

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

    <h5 class="text-center">Formulario para modificar mesas</h5>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Promociones registradas</h5>
            <form action="/Promociones/update/{{ $promocion->codigo }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" name="nombre" class="form-control"
                            value="{{ $promocion->nombre }}" required>
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" type="text" name="descipcion" class="form-control"
                            value="{{ $promocion->descripcion }}" required>
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="id_plato">ID_Plato</label>
                        <select name="id_plato" id="id_plato" name="id_plato" class="form-control">
                            @foreach ($platos as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $item->codigo == $promocion->id_plato ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_plato')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="descuento">Descuento</label>
                        <br><br>
                        <input id="descuento" type="float" name="descuento" class="form-control"
                            value="{{ $promocion->descuento }}" required>
                    </div><br><br>
                    <div class="input-field col s6">
                        <br>
                        <label for="fecha_inicio">Fecha inicio</label>
                        <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control"
                            value="{{ $promocion->fecha_inicio }}" required>
                    </div>
                    <div class="input-field col s6">
                        <br>
                        <label for="fecha_fin">Fecha fin</label>
                        <input id="fecha_fin" type="date" name="fecha_fin" class="form-control"
                            value="{{ $promocion->fecha_fin }}" required>
                    </div>
                    <div class="input-field col s6">
                        <label for="estado">Estado</label>
                        <br><br>
                            <label>
                                <input type="radio" name="estado" value="confirmada" required />
                                <span>Confirmada</span>
                            </label>
                            <label>
                                <input type="radio" name="estado" value="No confirmada" required />
                                <span>No confirmada</span>
                            </label>
                        @error('estado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <div class="col s6">
                            <button class="btn waves-effect waves-light" type="submit">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                    <div class="col s6">
                        <a class="btn waves-effect waves-light" href="/Promociones/show">Cancelar
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
