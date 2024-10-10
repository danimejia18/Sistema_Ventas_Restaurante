{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Categorías')

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
    .card {
      border-radius: 10px;
      border: none;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    .card-title {
      color: #333;
      text-align: center;
    }
    .btn-editar,
    .btn-eliminar {
      margin-left: 5px;
    }
    .btn-floating {
      float: right;
      margin-right: 50px;
    }
  </style>

  <div class="container"><br>
    <h3 class="center-align">Lista de Categorías</h3>
    <br>
    <!-- Mostrar Categorías -->
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title" >Categorías registradas</span>
            <a href="/Categorias/create" class="btn-floating btn-large waves-effect waves-light green">
              <i class="material-icons">add</i>
            </a>
            <table class="striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                {{-- Lista de Categorías --}}
                @foreach ($categorias as $item)
                <tr>
                  <td>{{ $item->codigo }}</td>
                  <td>{{ $item->nombre }}</td>
                  <td>{{ $item->descripcion }}</td>
                  <td>
                    <a class="btn-small blue btn-editar" href="/Categorias/edit/{{ $item->codigo }}"><i class="material-icons">edit</i></a>
                    <button class="btn-small red btn-eliminar"   
                            onclick="destroy(this)" 
                            url="/Categorias/destroy/{{ $item->codigo }}" 
                            token="{{ csrf_token() }}"><i class="material-icons">
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
@endsection

@section('scripts')
  {{-- SweetAlert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  {{-- JS --}}
  <script src="{{ asset('js/categoria.js') }}"></script>
@endsection
