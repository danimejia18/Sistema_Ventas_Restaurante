{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Accesos')

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
@section('content')
<h1 class="center-align">Agregar Acceso</h1>
<h3 class="center-align">Formulario para crear Accesos</h3>
 
<div class="container"><br>
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

        <div class="row mt-4">
            <!-- Botón Guardar -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection

