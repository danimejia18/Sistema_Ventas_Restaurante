{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Categorías')

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
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>

  <h1 class="center-align">Agregar Categoría</h1>
  <h3 class="center-align">Formulario para crear Categorias</h3>
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

          <div class="row mt-4">
              <!-- Botón Guardar -->
              <div class="col-12">
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
          </div>
      </form>
  </div>
@endsection
