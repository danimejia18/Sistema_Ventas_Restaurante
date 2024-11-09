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
                    <div class="col s4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $promocion->nombre }}">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col s4 mb-3">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion"
                            value="{{ $promocion->descripcion }}">
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col s4 mb-3">
                        <label for="id_plato">Plato</label>
                        <select type="text" class="form-control" name="id_plato" id="id_plato"
                            value="{{ $promocion->id_plato }}">
                            @foreach ($platos as $item)
                                <option value="{{ $item->codigo }}">
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
                </div>
                <div class="row">
                    <div class="col s4 mb-3">
                        <label for="descuento">Descuento</label>
                        <br><br>
                        <input type="num" class="form-control" name="descuento" id="descuento"
                            value="{{ $promocion->descuento }}">
                        @error('descuento')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col s4 mb-3">
                        <br>
                        <label for="fecha_inicio">Fecha inicio</label>
                        <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control"
                            value="{{ $promocion->fecha_inicio }}" required>

                        @error('fecha_inicio')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col s4 mb-3">
                        <br>
                        <label for="fecha_fin">Fecha fin</label>
                        <input id="fecha_fin" type="date" name="fecha_fin" class="form-control"
                            value="{{ $promocion->fecha_fin }}" required>

                        @error('fecha_fin')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 mb-3">
                        <label for="estado">Estado</label>
                        <br><br>
                        <p>
                            <label>
                                <input type="radio" name="estado" value="confirmada" required 
                                       {{ (old('estado', $promocion->estado) == 'confirmada') ? 'checked' : '' }} />
                                <span>Confirmada</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="radio" name="estado" value="no confirmada" required 
                                       {{ (old('estado', $promocion->estado) == 'no confirmada') ? 'checked' : '' }} />
                                <span>No Confirmada</span>
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
