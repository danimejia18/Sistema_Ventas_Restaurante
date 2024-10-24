{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Informe')

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

    <h1 class="text-center">Actualizar Informe</h1>
    <h5 class="text-center">Formulario para actualizar el informe seleccionado</h5>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Modificar Informe</h5>
            <form action="/Informes/update/{{ $informes->codigo }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-field">
                    <label for="fechaHora">Fecha y Hora</label>
                    <br>
                    <input name="fecha_hora" id="fecha_hora" type="date" class="validate" value="2024-09-30" value="{{ old('fecha_hora', $informes->fecha_hora) }}" required>
                    <input name="fecha_hora" id="fecha_hora" type="time" class="validate" value="10:00 AM" value="{{ old('fecha_hora', $informes->fecha_hora) }}" required>
                    @error('fecha_hora')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <label for="usuarioActivo">Usuario Activo</label>
                    <input id="usuarioActivo" type="text" class="validate" required>
                </div>
                <div class="input-field">
                    <label for="empresa">Empresa</label>
                    <input name="empresa" id="empresa" type="text" class="validate" value="{{ old('empresa', $informes->empresa) }}" required>
                    @error('empresa')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <label for="rangosFecha">Rangos de Fecha</label>
                    <input name="rangos_fecha" id="rangos_fecha" type="text" class="validate" value="{{ old('rangos_fecha', $informes->rangos_fecha) }}" required>
                    @error('rangos_fecha')
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
                    <div class="col s6">
                        <a class="btn waves-effect waves-light" href="/Informes/show">Cancelar
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
