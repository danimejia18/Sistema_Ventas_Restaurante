<!-- resources/views/Informes/create.blade.php -->
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Informe')

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
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table-container table {
            width: 100%;
            border: black dotted 1px;
        }

        .btn-floating {
            float: right;
            margin-right: 50px;
            bottom: 10px;
        }

        thead {
            background-color: antiquewhite;
        }
    </style>

<<<<<<< HEAD
    <h1 class="text-center">Actualizar</h1>
    <h5 class="text-center">Formulario para actualizar Informe</h5>
=======
    <h1 class="text-center">Modificar</h1>
    <h5 class="text-center">Formulario para editar Informe</h5>
>>>>>>> b121f38bb6457fb9af55c5bc721630481c9c3624

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Modificar Informe</h5>
                <form action="/Informes/update/{{ $informe->codigo }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" class="form-control" value="{{ $informe->titulo }}" required>
                            @error('titulo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" value="{{ $informe->descripcion }}"></textarea>
                            @error('descripcion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
<<<<<<< HEAD
                    
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" required>{{ $informe->descripcion }}</textarea>
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                    <div class="form-group">
                        <label for="fecha_creacion">Fecha</label>
                        <input type="date" name="fecha_creacion" class="form-control" value="{{ $informe->fecha_creacion }}" required>
                        @error('fecha_creacion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" value="{{ $informe->estado }}"required>
                            <option value="pendiente">Pendiente</option>
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                        </select>
                        @error('estado')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

=======
                    <div class="row">
                        <div class="form-group">
                            <label for="fecha_creacion">Fecha</label>
                            <input type="date" name="fecha_creacion" class="form-control" value="{{ $informe->fecha_creacion }}" required>
                            @error('fecha_creacion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control" value="{{ $informe->estado }}"required>
                                <option value="pendiente">Pendiente</option>
                                <option value="aprobado">Aprobado</option>
                                <option value="rechazado">Rechazado</option>
                            </select>
                            @error('estado')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
>>>>>>> b121f38bb6457fb9af55c5bc721630481c9c3624
                    <div class="row mt-2">
                        <div class="col s6">
                            <button class="btn waves-effect waves-light" type="submit">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                        <div class="col s6">
                            <a class="btn waves-effect waves-light" href="/Informes/show">Cancelar
                                <i class="material-icons right">cancel</i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        @endsection
