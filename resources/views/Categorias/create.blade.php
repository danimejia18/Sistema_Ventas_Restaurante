{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Categorías')

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

  <h3 class="center-align">Agregar Categoría</h3>
  <h4 class="center-align">Formulario para crear Categoría</h4>
  <div class="form-container">
      <form action="/Categorias/store" method="POST">
          @csrf
          <div class="row">
              <!-- Nombre de la Categoría -->
              <div class="col s12">
                  <label for="nombre">Nombre de la Categoría</label>
                  <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                  @error('nombre')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mt-2">
              <!-- Descripción -->
              <div class="col-12">
                  <label for="descripcion">Descripción</label>
                  <textarea id="descripcion" name="descripcion" class="form-control" rows="4">{{ old('descripcion') }}</textarea>
                  @error('descripcion')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
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