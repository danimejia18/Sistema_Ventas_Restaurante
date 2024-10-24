{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Crear Acceso')

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

    <h1 class="center-align">Agregar Acceso</h1>
    <br>
    <h3 class="center-align">Formulario para crear Accesos</h3>
    <div class="container"><br>
        <div class="table-container">
            <div class="form-container">
                <form action="/Acceso/store" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Tipo de Acceso -->
                        <div class="col-s12">
                            <label for="tipo_aceso">Tipo de acceso</label>
                            <textarea id="tipo_acceso" name="tipo_acceso" class="form-control" required></textarea>
                            @error('tipo_acceso')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br><br>
                        <div class="col-s12">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                            @error('descripcion')
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
                                <a class="btn waves-effect waves-light" href="/Acceso/show">Cancelar
                                    <i class="material-icons right">cancel</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
