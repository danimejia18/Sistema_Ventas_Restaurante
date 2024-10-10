{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Actualizar Empleado')

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
    <h3 class="center-align">Actualizar Empleado</h3>
    <br>
    <div class="form-container">
        <form action="/Empleados/update/{{ $empleado->codigo }}" method="POST">
            @csrf
            @method('PUT') <!-- Método PUT para la actualización -->
            <div class="row">
                <div class="input-field col s6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $empleado->nombre) }}">
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="input-field col s6">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" value="{{ old('apellido', $empleado->apellido) }}">
                @error('apellido')
                <span class="helper-text red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="correo">Correo Electrónico</label>
                    <input id="correo" type="email" class="validate" name="correo" value="{{ old('correo', $empleado->correo) }}" required>
                    @error('correo')
                    <span class="helper-text red-text" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mt22">
                <div class="col s12">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="validate" name="telefono" id="telefono" value="{{ old('telefono', $empleado->telefono) }}">
                    @error('telefono')
                    <span class="helper-text red-text" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="input-field col s6">
                <label for="rol">Rol</label><br><br>
                <select class="browser-default" name="rol" id="rol" required>
                    <option value="" disabled>Seleccione un Rol</option>
                    <option value="1" {{ $empleado->rol == 1 ? 'selected' : '' }}>Mesero</option>
                    <option value="2" {{ $empleado->rol == 2 ? 'selected' : '' }}>Cocinero</option>
                    <option value="3" {{ $empleado->rol == 3 ? 'selected' : '' }}>Gerente</option>
                    <option value="4" {{ $empleado->rol == 4 ? 'selected' : '' }}>Personal de Limpieza</option>
                </select>
                @error('rol')
                <span class="helper-text red-text" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row mt22">
                <div class="col s12">
                    <label for="password">Contraseña (dejar en blanco si no desea cambiarla)</label>
                    <input type="password" class="validate" name="password" id="password" placeholder="Dejar en blanco si no desea cambiarla">
                    @error('password')
                    <span class="helper-text red-text" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="input-field col s6">
                <label for="id_acceso">ID Acceso</label><br><br>
                <select name="id_acceso" id="acceso" class="form-control">
                    @foreach ($accesos as $item)
                    <option value="{{ $item->codigo }}" {{ ($item->codigo == $empleado->id_acceso) ? 'selected' : '' }}>
                        @if($item->tipo_acceso == 1)
                            Admin
                        @elseif($item->tipo_acceso == 2)
                            Empleado
                        @else
                            Desconocido
                        @endif
                    </option>
                    @endforeach
                </select>
                @error('id_acceso')
                <span class="helper-text red-text" role="alert">
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
</div>

<!-- Importar Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
