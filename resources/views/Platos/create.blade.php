{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Platos')

{{-- Definimos el contenido --}}
@section('content')
    <!-- Importar Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
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
        <h1 class="center-align">Agregar Platos</h1>
        <div class="table-container">
            <h5 class="card-title">Formulario para agregar Platos</h5>
            <div class="form-container">
                <form action="/Platos/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s6 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col s6 mb-3">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio">
                            @error('precio')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col s6 mb-3">
                            <label for="ingredientes">Ingredientes</label>
                            <input type="text" class="form-control" name="ingredientes" id="ingredientes">
                            @error('ingredientes')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 mb-3">
                            <label for="id_categoria">Categoría</label>
                            <select name="id_categoria" id="id_categoria" class="form-control">
                                @foreach ($categorias as $item)
                                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_categoria')
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
                                <a class="btn waves-effect waves-light" href="/Platos/show">Cancelar
                                    <i class="material-icons right">cancel</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Importar Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @endsection
