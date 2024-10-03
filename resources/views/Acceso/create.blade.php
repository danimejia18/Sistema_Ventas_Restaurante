<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Categoría</title>
  
  <!-- Importar Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  
  <!-- Fuentes de Google -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <style>
    /* Estilos personalizados */
    .form-container {
      margin-top: 20px;
    }
    .form-container form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h3 class="center-align">Agregar Categoría</h3>
    <br>
    <!-- Formulario para agregar categoría -->
    <div class="form-container">
      <form id="agregarAccesoForm">
        <div class="input-field col s12">
            <label>Tipo Acceso</label>
            <br><br>
                <select class="browser-default">
                    <option value="" disabled selected>Seleccione el tipo de Acceso</option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                </select>
        </div>
        <div class="input-field">
          <label for="descripcion">Descripción</label>
          <textarea id="descripcion" class="materialize-textarea"></textarea>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Guardar
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
  </div>

  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
