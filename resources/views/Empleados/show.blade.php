{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Empleados')

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
      max-width: 3000px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 20px;
    }
    .table-container table {
      width: 100%;
      border: black dotted 1px
    }
    .btn-floating
    {
      float: right;
      margin-right: 50px;
      bottom: 10px
    }
    thead
    {
      background-color: antiquewhite
    }
  </style>

<div class="container">
  <h3 class="center-align">Mostrar Empleados</h3>
  
  <!-- Tabla para mostrar Empleados -->
  <div class="table-container col-16">
    <h5 class="card-title">Empleados registrados</h5>
    <a href="/Empleados/create" class="btn-floating btn-large waves-effect waves-light green">
      <i class="material-icons">add</i>
    </a>
    <table class="striped responsive-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Rol</th>
        <th>Contraseña</th>
        <th>Id Acceso</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      {{-- Lista de Empleados --}}
      @foreach ($empleados as $item)
      <tr>
        <td>{{ $item->codigo }}</td>
        <td>{{ $item->nombre }}</td>
        <td>{{ $item->apellido }}</td>
        <td>{{ $item->correo }}</td>
        <td>{{ $item->telefono }}</td>
        <td> @if($item->rol == 1)
              Mesero
            @elseif($item->rol == 2)
              Cocinero
            @elseif($item->rol == 3)
              Gerente
            @elseif($item->rol == 4)
              Personal de Limpieza
            @endif
        </td>
        <td>{{ $item->contraseña }}</td>
        <td>
          @if($item->id_acceso == 1)
              Admin
          @elseif($item->id_acceso == 2)
              Empleado
          @endif
        </td>
        <td>
          <a class="btn-small blue btn-editar" href="/Empleados/edit/{{ $item->codigo }}"><i class="material-icons">edit</i></a>
          <button class="btn-small red btn-eliminar"   
                  onclick="destroy(this)" 
                  url="/Empleados/destroy/{{ $item->codigo }}" 
                  token="{{ csrf_token() }}"><i class="material-icons">delete</i>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection

@section('scripts')
<!-- Importar Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- JS --}}
<script src="{{ asset('js/empleado.js') }}"></script>
@endsection
