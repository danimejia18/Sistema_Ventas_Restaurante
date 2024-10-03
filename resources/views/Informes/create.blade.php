<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Informe</title>
  
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
    .form-container {
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
    <h3 class="center-align">Agregar Informe</h3>
    
    <!-- Formulario para agregar informe -->
    <div class="form-container">
      <form id="agregarInformeForm">
        <div class="input-field">
          <label for="fechaHora">Fecha y Hora</label>
          <br>
          <input id="FechaHora" type="date" class="validate" required>
          <input id="FechaHora" type="time" class="validate" required>
        </div>
        <div class="input-field">
          <label for="usuarioActivo">Usuario Activo</label>
          <input id="usuarioActivo" type="text" class="validate" required>
        </div>
        <div class="input-field">
          <label for="empresa">Empresa</label>
          <input id="empresa" type="text" class="validate" required>
        </div>
        <div class="input-field">
          <label for="rangosFecha">Rangos de Fecha</label>
          <input id="rangosFecha" type="text" class="validate" required>
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
