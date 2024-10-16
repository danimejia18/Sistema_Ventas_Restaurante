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
  
<h3 class="center-align">Agregar Acceso</h3>
<h4 class="center-align">Formulario para crear Acceso</h4>

<div class="container">
<div class="form-container">
   <form action="/Acceso/store" method="POST">
      @csrf
      <div class="row">
        <!-- Tipo de Acceso -->
        <div class="col s12">
          <label for="tipo_acceso">Tipo de Acceso</label>
          <select class="form-control" name="tipo_acceso" id="tipo_acceso">
              <option value="" disabled {{ old('tipo_acceso', $acceso->tipo_acceso ?? '') === '' ? 'selected' : '' }}>Seleccione el tipo de acceso</option>
              <option value="1" {{ old('tipo_acceso', $acceso->tipo_acceso ?? '') == 1 ? 'selected' : '' }}>Administrador</option>
              <option value="2" {{ old('tipo_acceso', $acceso->tipo_acceso ?? '') == 2 ? 'selected' : '' }}>Empleado</option>
          </select>
          @error('tipo_acceso')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      </div>
      <div class="row">
          <!-- Descripción -->
          <div class="col-6">
              <label for="descripcion">Descripción</label>
              <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
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

