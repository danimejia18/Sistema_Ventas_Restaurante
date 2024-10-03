<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Empleado</title>
  
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
    <h3 class="center-align">Agregar Empleado</h3>
    <br>
    <div class="form-container">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" class="validate" required>
          </div>
          <div class="input-field col s6">
            <label for="apellido">Apellido</label>
            <input id="apellido" type="text" class="validate" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <label for="correo">Correo Electrónico</label>
            <input id="correo" type="email" class="validate" required>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="telefono">Teléfono</label>
                <input id="telefono" type="tel" class="validate" required>
            </div>
            <div class="input-field col s6">
                <label>Rol</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione un Rol</option>
                        <option value="1">Mesero</option>
                        <option value="2">Cocinero</option>
                        <option value="3">Gerente</option>
                        <option value="4">Personal de Limpieza</option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="validate" required>
            </div>
            <div class="input-field col s6">
                <label>ID Acceso</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID de Acceso</option>
                        <option value="1">Admin 1</option>
                        <option value="2">Admin 2</option>
                        <option value="3">Admin 3</option>
                    </select>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Importar Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
