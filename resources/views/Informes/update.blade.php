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
    <h5 class="text-center">Formulario para agregar Informe</h5>

    <div class="container">
        <div class="table-container">
            <div class="form-container">
                <form action="/Informes/update/{{ $informe->codigo }}" method="POST">
                    @csrf
                    @method('PUT')
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
