<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Cliente</title>
  
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
    <h3 class="center-align">Modificar Cliente</h3>
    <br>
    <div class="form-container">
      <form class="col s12" id="modificarClienteForm">
        <div class="row">
          <div class="input-field col s6">
            <label for="nombre" class="active">Nombre</label>
            <input id="nombre" type="text" class="validate" value="Juan" required>
          </div>
          <div class="input-field col s6">
            <label for="apellido" class="active">Apellido</label>
            <input id="apellido" type="text" class="validate" value="Pérez" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <label for="correo" class="active">Correo Electrónico</label>
            <input id="correo" type="email" class="validate" value="juanperez@gmail.com" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <label for="telefono" class="active">Teléfono</label>
            <input id="telefono" type="tel" class="validate" value="12345678" required>
          </div>
          <div class="input-field col s6">
            <label for="direccion" class="active">Dirección</label>
            <input id="direccion" type="text" class="validate" value="Calle Principal 123"  required>
          </div>
        </div>
        <!-- Campo oculto para almacenar el ID del cliente -->
        <input type="hidden" id="idCliente" name="idCliente">

        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar Cambios
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  
  </script>
</body>
</html>
