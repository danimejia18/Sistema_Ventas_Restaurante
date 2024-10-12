{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Mesas')

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

<h1>Mesas</h1>
<h5>Listado de mesas</h5>
<hr>

  <div class="container">
    
    <!-- Tabla para mostrar Mesas -->
    <a class="btn-floating btn-large waves-effect waves-light green" href="/Mesas/create"><i class="material-icons">add</i></a>
    <table class="highlight responsive-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Capacidad</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          {{-- Listado de mesas --}}
                     @foreach ($mesas as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->numero }}</td>
                    <td>{{ $item->capacidad }}</td>
                    <td>{{ $item->estado }}</td>
                    <td>
                        <a class="btn-small blue btn-editar" href="/Mesas/edit/{{ $item->codigo }}"><i class="material-icons">edit</i></a>
                        <button class="btn-small red btn-eliminar" 
                                onclick="destroy(this)" 
                                url="/Mesas/destroy/{{ $item->codigo }}" 
                                token="{{ csrf_token() }}"><i class="material-icons">
                                delete</i>
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
<script src="{{ asset('js/mesa.js') }}"></script>
@endsection
    
