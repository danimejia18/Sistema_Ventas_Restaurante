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
                    <form action="/Clientes/store" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col s6">
                                <label for="nombre">Nombre del cliente</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" id="nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col s6">
                                <label for="apellido">Apellido del cliente</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                    name="apellido" id="apellido" value="{{ old('apellido') }}">
                                @error('nombre')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6">
                                <label for="correp">Correo del cliente</label>
                                <input type="email" class="form-control @error('correo') is-invalid @enderror"
                                    name="correo" id="correo" value="{{ old('correo') }}">
                                @error('correo')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="col s6">
                                <label for="telefono"> Teléfono del cliente</label>
                                <input type="tel" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" id="telefono" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6">
                                <label for="direccion">Dirección del cliente</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                                    name="direccion" id="direccion" value="{{ old('direccion') }}">
                                @error('direccion')
                                    <span class="helper-text red-text">{{ $message }}</span>
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
                                <a class="btn waves-effect waves-light" href="/Clientes/show">Cancelar
                                    <i class="material-icons right">cancel</i>
                                </a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
    </div>
@endsection
