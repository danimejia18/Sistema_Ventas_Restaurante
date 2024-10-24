{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Acceso')

{{-- Definimos el contenido --}}
@section('content')

    <!-- Importar Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        .form-container {
            margin-top: 20px;
        }

        .form-container form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-size: 1.2em;
            /* Ajusta el tamaño según lo que necesites */
            font-weight: bold;
            /* Opcional: negrita */
        }

        .form-label1 {
            font-size: 1.2em;
            /* Ajusta el tamaño según lo que necesites */
            font-weight: bold;
            /* Opcional: negrita */
        }
    </style>

    <h1 class="text-center">Modificar Acceso</h1>
    <br>
    <h5 class="text-center">Formulario para actualizar el acceso</h5>
    <hr>

    <div class="container form-container center">
        <form action="/Acceso/update/{{ $acceso->codigo }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-6">
                <label for="tipo_aceso">Tipo de acceso</label>
                <textarea id="tipo_acceso" name="tipo_acceso" class="form-control" class="materialize-textarea">{{ $acceso->tipo_acceso }}</textarea>
                @error('tipo_acceso')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><br><br>
            <div class="input-field col s12">
                <label class="form-label1" for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{ $acceso->descripcion }}</textarea>
                @error('descripcion')
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
                    <a class="btn waves-effect waves-light" href="/Acceso/show">Cancelar
                        <i class="material-icons right">cancel</i>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
