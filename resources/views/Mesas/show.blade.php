

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar Mesas</title>
  
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
</head>
<body>
  <div class="container">
    <h3 class="center-align">Mostrar Mesas</h3>
    
    <!-- Tabla para mostrar Mesas -->
    <div class="table-container">
      <h5 class="card-title">Mesas registradas</h5>
      <a href="create.blade.php" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
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
          <!-- Ejemplo de informe (se pueden agregar más filas dinámicamente) -->
          <tr>
            <td>1</td>
            <td>3</td>
            <td>2</td>
            <td>Reservada</td>
            <td>
                <a href="update.blade.php" class="btn-small blue btn-editar"><i class="material-icons">edit</i></a>
                <button class="btn-small red btn-eliminar"><i class="material-icons">delete</i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
