{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Mesas')

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
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>

  <h1 class="text-center">Crear</h1>
  <h5 class="text-center">Formulario para agregar mesas</h5>

  <div class="container">
    <!-- Formulario para agregar mesa -->
        <form action="/Mesas/store" method="POST">
          @csrf
          <div class="row">
              <div class="col-6">
                  <label for="numero">Numero</label>
                  <input type="numero" class="form-control" name="numero" id="numero">
                  @error('numero')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
        <div class="input-field col s12">
            <label>Capacidad</label>
            <br><br>
                <select class="browser-default" name="capacidad">
                    <option value="" disabled selected>Seleccione la Capacidad de personas</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="4">5</option>
                    <option value="4">6</option>
                    <option value="4">7</option>
                    <option value="4">8</option>
                    <option value="4">9</option>
                    <option value="4">10</option>
                </select>
                @error('capacidad')
                <span class="helper-text red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="input-field col s12">
          <label for="estado">Estado</label><br>
          <p><br>
            <label>
              <input type="radio" name="estado" value="Libre" />
              <span>Libre</span>
            </label>
          </p>
          <p>
            <label>
              <input type="radio" name="estado" value="Reservada" />
              <span>Reservada</span>
            </label>
          </p>
          <p>
            <label>
              <input type="radio" name="estado" value="Ocupada" />
              <span>Ocupada</span>
            </label>
          </p>
            @error('estado')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn waves-effect waves-light" type="submit">Guardar
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection

