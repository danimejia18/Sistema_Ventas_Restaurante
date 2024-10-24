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
        max-width: auto;
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
        <h3 class="center-align">Lista de Clientes</h3>
        <br>
        <!-- Mostrar Clientes -->
        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Clientes registrados</span>
                <a href="/Clientes/create" class="btn-floating btn-large waves-effect waves-light green"><i
                  class="material-icons">add</i></a>
                  <table class="striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Lista de clientes -->
                    @foreach ($clientes as $item)
                      <tr>
                          <td>{{ $item->codigo }}</td>
                          <td>{{ $item->nombre }}</td>
                          <td>{{ $item->apellido }}</td>
                          <td>{{ $item->correo }}</td>
                          <td>{{ $item->telefono }}</td>
                          <td>{{ $item->direccion }}</td>
                          <td>
                              <a class="btn-small blue btn-editar"
                                  href="/Clientes/edit/{{ $item->codigo }}"><i
                                      class="material-icons">edit</i></a>
                              <button class="btn-small red btn-eliminar" onclick="destroy(this)"
                                  url="/Clientes/destroy/{{ $item->codigo }}" token="{{ csrf_token() }}"><i
                                      class="material-icons">
                                      delete</i>
                              </button>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- JS --}}
    <script src="{{ asset('js/cliente.js') }}"></script>
@endsection
