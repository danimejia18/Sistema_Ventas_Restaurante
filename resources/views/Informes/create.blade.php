{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Informe')

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

@section('content')
    <h1 class="center-align">Agregar Informe</h1>
    <br>
    <h3 class="center-align">Formulario para crear Informe</h3>
    <div class="container"><br>
        <div class="table-container">
            <div class="form-container">
                <form action="/Informes/store" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Tipo de Acceso -->
                        <div class="input-field">
                            <label for="fechaHora">Fecha y Hora</label>
                            <br>
                            <input id="FechaHora" type="date" class="validate" required>
                            <input id="FechaHora" type="time" class="validate" required>
                        </div>
                        <div class="input-field">
                            <label for="usuarioActivo">Usuario Activo</label>
                            <input id="usuarioActivo" type="text" class="validate" required>
                        </div>
                        <div class="input-field">
                            <label for="empresa">Empresa</label>
                            <input id="empresa" type="text" class="validate" required>
                        </div>
                        <div class="input-field">
                            <label for="rangosFecha">Rangos de Fecha</label>
                            <input id="rangosFecha" type="text" class="validate" required>
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
                    </div>
                </form>
            </div>
        </div>

        <!-- Importar Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @endsection
