{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Detalle_pedido')

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
    <h3 class="center-align">Agregar Detalle_pedido</h3>
    <h4>Formulario para agregar Detalle_pedido</h4>
    <div class="form-container">
      <form action="/Detalle_pedidos/store" method="POST">
        @csrf
        <div class="row">
          <div class="col-12 mt-3">
            <label for="pedidos">Pedido</label>
            <select name="pedidos" id="pedidos" class="form-control">
                @foreach ($pedidos as $item)
                    <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
                @endforeach
            </select>
            @error('pedidos')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 mt-3">
            <label for="productos">Producto</label>
            <select name="productos" id="productos" class="form-control">
                @foreach ($productos as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('productos')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <label for="cantidad">Cantidad de pedidos</label>
            <input id="cantidad" type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required>
            @error('cantidad')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col s6">
            <label for="precio_unitario">Precio unitario</label>
            <input id="precio_unitario" type="decimal" class="form-control" name="precio_unitario" value="{{ old('precio_unitario') }}" required>
            @error('precio_unitario')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <label for="subtotal">Subtotal</label>
            <input id="subtotal" type="decimal" class="form-control" name="subtotal" value="{{ old('subtotal') }}" required>
            @error('subtotal')
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