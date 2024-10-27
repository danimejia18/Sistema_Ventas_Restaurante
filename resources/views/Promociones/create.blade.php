{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Promociones')

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
    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para agregar Promociones</h5>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Promociones registradas</h5>
            <!-- Formulario para agregar mesa -->
            <form action="/Promociones/store" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <div class="col-12 mt-3">
                            <label for="id_plato">ID_Plato</label>
                            <select type="text" class="form-control" name="id_plato" id="id_plato">
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
                        <div class="input-field col s6">
                            <label for="descuento">Descuento</label>
                            <br><br>
                            <input type="num" class="form-control" name="descuento" id="descuento">
                            @error('descuento')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="input-field col s6">
                            <br>
                            <label for="fecha_inicio">Fecha inicio</label>
                            <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control" required>

                            @error('fecha_inicio')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <br>
                            <label for="fecha_fin">Fecha fin</label>
                            <input id="fecha_fin" type="date" name="fecha_fin" class="form-control" required>

                            @error('fecha_fin')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <div class="input-field col s6">
                        <label for="estado">Estado</label>
                        <br><br>
                        <p>
                            <label>
                                <input type="radio" name="estado" value="confirmada" required />
                                <span>Confirmada</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="radio" name="estado" value="no confirmada" required />
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
                </div>
            </form> 
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
