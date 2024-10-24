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
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para agregar Empleado</h5>

    <div class="container">
        <div class="table-container">
            <div class="form-container">
                <form action="/Empleados/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="nombre">Apellido</label><br><br>
                            <input type="text" class="form-control" name="apellido" id="apellido" required>
                            @error('apellido')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="correo">Correo Electrónico</label><br>
                            <input type="email" class="form-control" name="correo" id="correo" required>
                            @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="telefono" class="form-label">Teléfono</label><br>
                            <input type="tel" class="validate" name="telefono" id="telefono" required>
                            @error('telefono')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Rol</label><br>
                            <br><br>
                            <select class="browser-default" name="rol" required>
                                <option value="" disabled selected>Seleccione un Rol</option>
                                <option value="1">Mesero</option>
                                <option value="2">Cocinero</option>
                                <option value="3">Gerente</option>
                                <option value="4">Personal de Limpieza</option>
                            </select>
                            @error('rol')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col s12">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" placeholder="Crear contraseña" required>
                            @error('password')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col s12">
                            <label for="password_confirmation">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation"
                                placeholder="Confirmar nueva contraseña (opcional)">
                            @error('password_confirmation')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <label for="id_acceso">Id Acceso</label>
                            <select name="id_acceso" class="form-control" required>
                                <option value="">Seleccione un acceso</option>
                                @foreach ($accesos as $item)
                                    <option value="{{ $item->codigo }}">{{ $item->tipo_acceso }}</option>
                                @endforeach
                            </select>
                            @error('id_acceso')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mt-2">
                            <div class="col s6">
                                <button class="btn waves-effect waves-light" type="submit">Guardar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div class="col s6">
                                <a class="btn waves-effect waves-light" href="/Empleados/show">Cancelar
                                    <i class="material-icons right">cancel</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
