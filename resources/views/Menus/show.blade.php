{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Menus')

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
      margin-right: 50px
    }
    thead
    {
      background-color: antiquewhite
    }
  </style>
</head>
<body>
  <div class="container">
    <h3 class="center-align">Mostrar Menús</h3>
    
    <!-- Tabla para mostrar Menús -->
    <div class="table-container">
      <h5 class="card-title">Menús registrados</h5>
      <a href="/Menus/create" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
      <table class="highlight responsive-table">
        <thead class="striped responsive-table">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>ID_Plato</th>
            <th>ID_Categoría</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          {{-- Listado de menús --}}
          @foreach ($menus as $item)
              <tr>
                <td>{{$item->codigo}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->id_plato}}</td>
                <td>{{$item->id_categoria}}</td>
                <td>
                  <a href="/Menus/edit/{{$item->codigo}}" class="btn-small blue btn-editar"><i class="material-icons">edit</i></a>
                  <button class="btn-small red btn-eliminar"
                  onclick="destroy(this)"
                  url="/Menus/destroy/{{$item->codigo}}"
                  token="{{csrf_token()}}"><i class="material-icons">delete</i></button>
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
  <script src="{{ asset('js/menu.js') }}"></script>
  @endsection
      
