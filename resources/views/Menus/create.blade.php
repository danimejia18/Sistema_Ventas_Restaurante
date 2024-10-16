{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Menus')

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
  <h3 class="center-align">Agregar Menú</h3>
  <h4>Formulario para agregar Menú</h4>
  <div class="form-container">
    <form id="agregarMenuForm" action="Menus/store" method="POST">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <label for="nombre">Nombre</label>
          <input id="nombre" type="text" class="validate" id="nombre" required>
          @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <label>Plato</label>
          <select name="id_plato" id="id_plato" class="form-control">
            @foreach ($menus as $item)
                <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
            @endforeach
          </select>
            @error('id_plato')
            <span class="helper-text red-text" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-field col s6">
          <label for="id_categoria">Categoría</label>
          <select name="id_categoria" id="id_categoria" class="form-control">
            @foreach ($categorias as $item)
              <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
            @endforeach
          </select>
          @error('id_categoria')
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