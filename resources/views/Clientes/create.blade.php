{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Clientes')

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
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>

  <div class="container">
    <h1 class="center-align">Agregar Cliente</h>
      <br>
      <h3 class="center-align">Formulario para agregar Clientes</h3>
      <div class="form-container">
        <form action="/Clientes/store" method="POST">
            @csrf
            <div class="row">
              <!-- Nombre de la Categoría -->
            <div class="col s12">
              <label for="nombre">Nombre del cliente</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="row mt-2">
              <!-- Apellido -->
              <div class="col 12">
                  <label for="apellido">Apellido</label>
                  <input type="text" class="form-control" name="apellido" id="apellido">
                  @error('apellido')
                  <span class="helper-text red-text" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
    
            <div class="row mt-2">
            <!-- Correo Electrónico -->
              <div class="col 12">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="validate" name="correo" id="correo">
                @error('correo')
                <span class="helper-text red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
    
          <div class="row mt22">
              <div class="col 12">
                <!-- Teléfono -->
                <label for="telefono">Teléfono</label>
                <input type="tel" class="validate" name="telefono" id="telefono">
                @error('telefono')
                <span class="helper-text red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
          </div>

          <div class="row mt22">
            <div class="col 12">
              <!-- Dirección -->
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" name="direccion" id="direccion">
              @error('direccion')
              <span class="helper-text red-text" role="alert">
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
@endsection
