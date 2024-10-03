<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Categoría</title>
  
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
    <h3 class="center-align">Editar Categoría</h3>
    <br>
    <!-- Formulario para editar categoría -->
    <div class="form-container">
        <form id="editarCategoriaForm">
          <input type="hidden" id="editarIdCategoria" name="idCategoria">
          <div class="input-field">
            <label for="editarNombreCategoria">Nombre de la Categoría</label>
            <input id="editarNombreCategoria" type="text" class="validate" value="Leal" required>
          </div>
          <div class="input-field">
            <label for="editarDescripcionCategoria">Descripción</label>
            <textarea id="editarDescripcionCategoria" class="materialize-textarea">Es aquel que va a desayunar al restaurante casi todos los días.</textarea>
          </div>
          <button class="btn waves-effect waves-light" type="submit">Guardar Cambios
            <i class="material-icons right">send</i>
          </button>
        </form>
    </div>
  </div>
  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>