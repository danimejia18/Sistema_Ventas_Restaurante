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

    <h1 class="text-center">Modificar</h1>
    <h5 class="text-center">Formulario para modificar empleados</h5>
    <div class="container">
        <div class="container">
            <div class="table-container">
                <h5 class="card-title">Empleados registrados</h5>
                <form action="/Empleados/update/{{ $empleado->codigo }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Método PUT para la actualización -->
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{old('nombre', $empleado->nombre)}}">
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido"
                                value="{{ old('apellido', $empleado->apellido) }}">
                            @error('apellido')
                                <span class="helper-text red-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="correo">Correo Electrónico</label>
                                <input id="correo" type="email" class="validate" name="correo"
                                    value="{{ old('correo', $empleado->correo)}}" required>
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
                                <input type="tel" class="validate" name="telefono" id="telefono"
                                    value="{{ old('telefono', $empleado->telefono)}}">
                                @error('telefono')
                                    <span class="helper-text red-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <label for="rol">Rol</label><br><br>
                            <select class="browser-default" name="rol" id="rol" value="{{old('rol', $empleado->rol) }}" 
                                required>
                                <option value="" disabled>Seleccione un Rol</option>
                                <option value="1" {{ $empleado->rol == 1 ? 'selected' : '' }}>Mesero</option>
                                <option value="2" {{ $empleado->rol == 2 ? 'selected' : '' }}>Cocinero</option>
                                <option value="3" {{ $empleado->rol == 3 ? 'selected' : '' }}>Gerente</option>
                                <option value="4" {{ $empleado->rol == 4 ? 'selected' : '' }}>Personal de Limpieza
                                </option>
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
                                <input type="password" name="password" placeholder="Nueva contraseña (opcional)" value="{{old('password', $empleado->password)}}">
                                @error('password')
                                    <span class="helper-text red-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt22">
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
                        </div>

                    </div>
                    <div class="col-12 mt-3">
                        <label for="id_acceso">Id Acceso</label>
                        <select name="id_acceso" id="id_acceso" class="form-control">
                            @foreach ($accesos as $item)
                                <option value="{{ $item->codigo }}">
                                    {{ $item->tipo_acceso }}
                                </option>
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
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
