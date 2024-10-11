{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Productos')

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
<h5 class="text-center">Formulario para crear productos</h5>

  <div class="container">
    <form action="/Productos/store" method="POST">
      @csrf
      <div class="row">
          <div class="col-6">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
              @error('nombre')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="col-6">
            <label for="descripion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
          <div class="col-6">
              <label for="stock">Stock</label>
              <input id="stock" type="number" class="form-control" name="stock" required>
              @error('stock')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      
          <div class="input-field col s12">
            <label for="estado">Estado</label><br>
            <p><br>
              <label>
                <input type="radio" name="estado" value="Agotado" />
                <span>Agotado</span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="estado" value="Activo" />
                <span>Activo</span>
              </label>
            </p>
              @error('estado')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
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
