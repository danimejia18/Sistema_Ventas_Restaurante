{{-- Heredamos la estructura del archivo app.blade.php --}}
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
    .form-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
  
  <div class="container">
    <h3 class="center-align">Agregar Detalle_informe</h3>
    <h4>Formulario para agregar Detalle_informe</h4>
    <div class="form-container">
      <form action="/Detalle_informes/store" method="POST">
        @csrf
        <div class="row">
          <div class="col s12">
            <label for="fecha_hora">Fecha y Hora</label>
            <input id="fecha_hora" type="datetime" class="form-control" name="fecha_hora" value="{{ old('fecha_hora') }}" required>
            @error('fecha_hora')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col s12">
            <label for="usuario_activo">Usuario activo</label>
              <select class="form-control" name="usuario_activo" id="usuario_activo">
                  <option value="" disabled {{ old('usuario_activo', $acceso->usuario_activo ?? '') === '' ? 'selected' : '' }}>Seleccione si el usuario está activo o inactivo</option>
                  <option value="1" {{ old('usuario_activo') == 1 ? 'selected' : '' }}>Activo</option>
                  <option value="2" {{ old('usuario_activo') == 2 ? 'selected' : '' }}>Inactivo</option>
              </select>
              @error('usuario_activo')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <label for="empresa">Empresa</label>
            <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" required>
            @error('empresa')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col s6">
            <label for="rangos_fecha">Rangos de fecha</label>
            <input id="rangos_fecha" type="text" class="form-control" name="rangos_fecha" value="{{ old('rangos_fecha') }}" required>
            @error('rangos_fecha')
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
  </div>

  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
  @endsection