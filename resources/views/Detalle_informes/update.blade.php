{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Detalle_informe')

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
</head>
<body>
  <div class="container">
    <h3 class="center-align">Modificar Detalle_informes</h3>
    
    <!-- Formulario para agregar Detalle_informes -->
    <div class="form-container center">
      <form id="agregarDetalle_informesForm">
        <div class="row">
            <div class="input-field col s6">
                <label>ID Informe</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Informe</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
            <div class="input-field col s6">
                <label>ID Pedido</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Pedido</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label>ID Cliente</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Cliente</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
            <div class="input-field col s6">
                <label>ID Empleado</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Empleado</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label>ID Pago</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Pago</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
            <div class="input-field col s6">
                <label>ID Reservación</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID de la Reservación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label>ID Mesa</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID de la Mesa</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
            <div class="input-field col s6">
                <label>ID Promoción</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID de la Promoción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Guardar
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
  </div>

<!-- Importar Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

@endsection
