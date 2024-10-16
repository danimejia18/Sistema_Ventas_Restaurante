{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Pedido')

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
    <h3 class="center-align">Agregar Pedido</h3>
    <h4>Formulario para agregar Pedido</h4>
    <div class="form-container">
      <form action="/Pedidos/store" method="POST">
        @csrf
        <div class="row">
          <div class="col-12 mt-3">
            <label for="clientes">Cliente</label>
            <select name="clientes" id="clientes" class="form-control">
                @foreach ($clientes as $item)
                    <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
                @endforeach
            </select>
            @error('clientes')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 mt-3">
            <label for="empleados">Empleado</label>
            <select name="empleados" id="empleados" class="form-control">
                @foreach ($empleados as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('empleados')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <label for="fecha">Fecha</label>
            <input type="text" class="form-control" name="fecha" id="fecha">
              @error('fecha')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="col s6">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="" disabled {{ old('estado', $pedido->estado ?? '') === '' ? 'selected' : '' }}>Seleccione el estado del pedido</option>
                <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Pendiente</option>
                <option value="2" {{ old('estado') == 2 ? 'selected' : '' }}>Cancelado</option>
            </select>
            @error('estado')
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