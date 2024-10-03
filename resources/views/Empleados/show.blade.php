<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Empleados</title>
  
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
    }
    .btn-editar,
    .btn-eliminar {
      margin-left: 5px;
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
    <h3 class="center-align">Lista de Empleados</h3>
    <br>
    <!-- Mostrar Categorías -->
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Empleados registrados</span>
            <a href="create.blade.php" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
            <table class="striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Teléfono</th>
                  <th>Rol</th>
                  <th>Contraseña</th>
                  <th>Id_Acceso</th>
                  <th>Dirección</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- Ejemplo de categoría -->
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>johndoe@gmail.com</td>
                    <td>12345690</td>
                    <td>Mesero</td>
                    <td>*******</td>
                    <td>3</td>
                    <td>San Salvador</td>
                  <td>
                    <a href="update.blade.php" class="btn-small blue btn-editar"><i class="material-icons">edit</i></a>
                    <button class="btn-small red btn-eliminar"><i class="material-icons">delete</i></button>
                  </td>
                </tr>
                <!-- Puedes agregar más categorías según sea necesario -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>