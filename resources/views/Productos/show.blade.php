
{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Productos')

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
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 20px;
    }
    .table-container table {
      width: 100%;
    }
    .btn-floating
    {
      float: right;
      margin-right: 50px
    }
  </style>
<h1>Productos</h1>
<h5>Listado de Productos</h5>
<hr>
    <a class="btn-floating btn-large waves-effect waves-light green" href="/Productos/create"><i class="material-icons">add</i></a>
      <table class="highlight responsive-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          {{-- Listado de productos --}}
          @foreach ($productos as $item)
          <tr>
              <td>{{ $item->codigo }}</td>
              <td>{{ $item->nombre }}</td>
              <td>{{ $item->descripcion }}</td>
              <td>{{ $item->stock }}</td>
              <td>{{ $item->estado }}</td>
              <td>
                  <a class="btn btn-success btn-sm" href="/Productos/edit/{{ $item->codigo }}">Modificar</a>
                  <button class="btn btn-danger btn-sm" 
                          onclick="destroy(this)" 
                          url="/Productos/destroy/{{ $item->codigo }}" 
                          token="{{ csrf_token() }}">
                      Eliminar
                  </button>
              </td>
          </tr>
        @endforeach
        </tbody>
      </table>
  @endsection

  @section('scripts')
  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  {{-- SweetAlert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- JS --}}
  <script src="{{ asset('js/plato.js') }}"></script>
  @endsection
