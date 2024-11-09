{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', ' Crear Mesas')

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
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
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
        <h1 class="center-aling">Agregar Nueva Mesa</h1>
        <h5 class="center-aling">Formulario para agregar mesas</h5>
        <div class="table-container">
            <div class="form-container">
                <form action="/Mesas/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s4 mb-3">
                            <label for="numero">Número de Mesa</label>
                            <input type="text" class="validate" name="numero" id="numero" required>
                            @error('numero')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col s4 mb-3">
                            <label for="capacidad">Capacidad</label>
                            <select name="capacidad" id="capacidad" required>
                                <option value="" disabled selected>Seleccione la Capacidad de personas</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('capacidad')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s4 mb-3">
                            <label for="estado">Estado</label>
                            <div>
                                <p>
                                    <label>
                                        <input type="radio" name="estado" value="Disponible" required />
                                        <span>Disponible</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" name="estado" value="reservada" required />
                                        <span>Reservada</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" name="estado" value="ocupada" required />
                                        <span>Ocupada</span>
                                    </label>
                                </p>
                                @error('estado')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col s4 mb-3"></div> <!-- Espacio vacío para mantener el diseño de 2 columnas -->
                    </div>

                    <div class="row mt-2">
                        <div class="col s6">
                            <button class="btn waves-effect waves-light" type="submit">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                        <div class="col s6">
                            <a class="btn waves-effect waves-light" href="/Mesas/show">Cancelar
                                <i class="material-icons right">cancel</i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Importar Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            // Inicializar el select
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems);
            });
        </script>
    @endsection
