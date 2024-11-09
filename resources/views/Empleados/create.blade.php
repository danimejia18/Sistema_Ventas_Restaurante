{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Empleado')

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

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table-container table {
            width: 100%;
            border: black dotted 1px
        }

        .btn-floating {
            float: right;
            margin-right: 50px;
            bottom: 10px
        }

        thead {
            background-color: antiquewhite
        }
    </style>

    <div class="container">
        <h1 class="center-align">Agregar Cliente</h1>
            <h3 class="center-align">Formulario para agregar Clientes</h3>
        <div class="table-container">
            <div class="form-container">
                <form action="/Empleados/store" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Primera fila -->
                        <div class="col s4 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col s4 mb-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" required>
                            @error('apellido')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col s4 mb-3">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" id="correo" required>
                            @error('correo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Segunda fila -->
                        <div class="col s4 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono" required>
                            @error('telefono')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col s4 mb-3">
                            <label>Rol</label>
                            <select class="browser-default form-control" name="rol" required>
                                <option value="" disabled selected>Seleccione un Rol</option>
                                <option value="1">Mesero</option>
                                <option value="2">Cocinero</option>
                                <option value="3">Gerente</option>
                                <option value="4">Personal de Limpieza</option>
                            </select>
                            @error('rol')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col s4 mb-3">
                            <label for="id_acceso">Acceso</label>
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
                    </div>
                    
                    <div class="row">
                        <!-- Tercera fila -->
                        <div class="col s6 mb-3">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Crear contraseña" required>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col s6 mb-3">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar nueva contraseña">
                            @error('password_confirmation')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
