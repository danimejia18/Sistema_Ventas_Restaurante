{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Modificar Cliente')

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
    border-radius: 30px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
</style>

<h1 class="text-center">Modificar Clientes</h1>
<h3 class="text-center">Formulario para actualizar los clientes</h3>

<div class="container form-container center">
    <form action="/Clientes/update/{{ $cliente->codigo }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-field col s12">
            <label class="form-label" for="nombre">Nombre del cliente</label>
            <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}">
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field col s12">
            <label class="form-label" for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}">
            @error('apellido')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
  
        <div class="input-field col s12">
            <label class="form-label" for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" value="{{ $cliente->correo }}" required>
            @error('correo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-field col s12">
            <label class="form-label" for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" value="{{ $cliente->telefono }}" required pattern="[0-9]*">
            @error('telefono')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field col s12">
            <label class="form-label" for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{  $cliente->direccion }}" required>
            @error('direccion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col s12 mt-2">
            <button class="btn waves-effect waves-light" type="submit">Guardar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

<!-- Importar Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

@endsection
