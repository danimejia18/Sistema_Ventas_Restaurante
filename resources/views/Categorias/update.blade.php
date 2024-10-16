{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Categoría')

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
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>

  <h1 class="text-center">Modificar Categoría</h1>
  <br>
  <h5 class="text-center">Formulario para actualizar la categoría</h5>
  <hr>

  <div class="container form-container center">
    <form action="/Categorias/update/{{ $categoria->codigo }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-field col s12">
            <label class="form-label" for="nombre">Nombre de la Categoría</label>
            <input type="text" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        
        <div class="input-field col s12">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="materialize-textarea {{ $categoria->descripcion }}"></textarea>
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col s12 mt-2">
            <button class="btn waves-effect waves-light" type="submit">Guardar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

@endsection
