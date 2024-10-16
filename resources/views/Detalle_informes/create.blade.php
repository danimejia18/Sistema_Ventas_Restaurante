{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Detalle_informe')

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
          <div class="col-12 mt-3">
            <label for="informes">Informe</label>
            <select name="informes" id="informes" class="form-control">
                @foreach ($informes as $item)
                    <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
                @endforeach
            </select>
            @error('informes')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
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
        </div>
        <div class="row">
          <div class="col-12 mt-3">
            <label for="clientes">Cliente</label>
            <select name="clientes" id="clientes" class="form-control">
                @foreach ($clientes as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
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
          <div class="col-12 mt-3">
            <label for="pagos">Pago</label>
            <select name="pagos" id="pagos" class="form-control">
                @foreach ($pagos as $item)
                    <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
                @endforeach
            </select>
            @error('pagos')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 mt-3">
            <label for="reservaciones">Reservación</label>
            <select name="reservaciones" id="reservaciones" class="form-control">
                @foreach ($reservaciones as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('reservaciones')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-12 mt-3">
            <label for="mesas">Mesa</label>
            <select name="mesas" id="mesas" class="form-control">
                @foreach ($mesas as $item)
                    <option value="{{ $item->codigo }}">{{ $item->numero }}</option>
                @endforeach
            </select>
            @error('mesas')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 mt-3">
            <label for="promociones">Promoción</label>
            <select name="promociones" id="promociones" class="form-control">
                @foreach ($promociones as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('promociones')
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