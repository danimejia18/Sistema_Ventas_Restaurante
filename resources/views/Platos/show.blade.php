

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar Platos</title>
  
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
    <h3 class="center-align">Mostrar Platos</h3>
    
    <!-- Tabla para mostrar Platos -->
    <div class="table-container">
      <h5 class="card-title">Platos registrados</h5>
      <a href="create.blade.php" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
      <table class="highlight responsive-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Ingredientes</th>
            <th>ID_Categoría</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Ejemplo de informe (se pueden agregar más filas dinámicamente) -->
          <tr>
            <td>1</td>
            <td>Spaghetti con albóndigas</td>
            <td>12.99</td>
            <td>
                <ul>
                    <li>2 latas (8 onzas cada una) salsa de tomate</li>
                    <li>1 taza de agua</li>
                    <li>1/2 taza de cebolla finamente picada, uso dividido</li>
                    <li>2 tomates Roma, picadas</li>
                    <li>2 dientes de ajos, pelados</li>
                    <li>1 1/2 cucharaditas de MAGGI Caldo Sabor a Pollo Granulado, uso dividido</li>
                    <li>2 libras de carne molida bajo en grasa</li>
                    <li>1 huevo grande</li>
                    <li>1 diente de ajo, finamente picado</li>
                    <li>1 cucharada de aceite de uva</li>
                    <li>1 libra de espagueti seco</li>
                    <li>1/2 taza de leche evaporada baja en grasa NESTLÉ CARNATION Evaporated Lowfat 2% Milk</li>
                    <li>3 cucharadas de perejil picado para aderezar</li>
                    <li>2 cucharaditas de hojuelas de chile rojo seco para aderezar</li>
                </ul>
            </td>
            <td>3</td>
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
