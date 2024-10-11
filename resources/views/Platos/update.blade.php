{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Platos')

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
<h1 class="text-center">Modificar</h1>
<h5 class="text-center">Formulario para modificar platos</h5>
  
<div class="container">
  <form action="/Platos/update/{{ $plato->codigo }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $plato->nombre }}">
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-6">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" value="{{ $plato->precio }}">
            @error('precio')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-6">
          <label for="ingredientes">Ingredientes</label>
          <input type="text" class="form-control" name="ingredientes" id="ingredientes" value="{{ $plato->ingredientes }}">
          @error('ingredientes')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
    </div>
    <div class="col-12 mt-3">
      <label for="id_categoria">ID_Categoría</label>
      <select name="id_categoria" id="id_categoria" class="form-control">
          @foreach ($categorias as $item)
              <option value="{{ $item->codigo }}" {{ ($item->codigo == $plato->id_categoria) ? 'selected' : '' }}>
                  {{ $item->nombre }}
              </option>
          @endforeach
      </select>
      @error('id_categoria')
          <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="col-12 mt-2">
      <button class="btn waves-effect waves-light" type="submit">Guardar
        <i class="material-icons right">send</i>
      </button>
  </div>
      </form>
    </div>
@endsection

@section('scripts')
  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
