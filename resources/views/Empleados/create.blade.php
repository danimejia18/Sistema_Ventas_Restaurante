{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Empleados')

{{-- Definimos el contenido --}}
@section('content')
  
  <!-- Importar Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  
  <!-- Fuentes de Google -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    /* Estilos personalizados */
    .form-container {
      margin-top: 20px;
    }
    .form-container form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>

  <div class="container">
    <h3 class="center-align">Agregar Empleado</h3>
    <br>
    <div class="form-container">
      <form action="/Empleados/store" method="POST">
        @csrf
        <div class="row">
          <div class="input-field col s6">
            <label for="nombre">Nombre</label>
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
                <label for="apellido">Apellido</label><br>
                <input type="text" class="form-control" name="apellido" id="apellido">
                @error('apellido')
                <span class="helper-text red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
              <div class="col-md-12"> 
                  <label for="correo" class="form-label">Correo Electrónico</label><br> 
                  <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" required>
                  
                  @error('correo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
          </div>
          
        <div class="row mt22">
          <div class="col 12">
            <!-- Teléfono -->
            <label for="telefono">Teléfono</label><br>
            <input type="tel" class="validate" name="telefono" id="telefono">
            @error('telefono')
            <span class="helper-text red-text" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
      </div>
      <div class="input-field col s6">
          <label>Rol</label><br>
          <br><br>
              <select class="browser-default" name="rol">
                  <option value="" disabled selected>Seleccione un Rol</option>
                  <option value="1">Mesero</option>
                  <option value="2">Cocinero</option>
                  <option value="3">Gerente</option>
                  <option value="4">Personal de Limpieza</option>
              </select>
        </div>
        </div>
        <div class="row mt22">
          <div class="col s12">
              <!-- Contraseña -->
              <label for="password">Contraseña</label><br>
              <input type="password" class="validate" name="password" id="password" required>
              @error('password')
              <span class="helper-text red-text" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>
      
      <div class="input-field col s6">
        <label for="id_acceso">ID Acceso</label><br><br>
        <select class="browser-default" name="id_acceso" id="id_acceso" required>
            <option value="" disabled selected>Seleccione el ID de Acceso</option>
            <option value="1">Admin 1</option>
            <option value="2">Admin 2</option>
            <option value="3">Admin 3</option>
        </select>
        @error('id_acceso')
        <span class="helper-text red-text" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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
  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>