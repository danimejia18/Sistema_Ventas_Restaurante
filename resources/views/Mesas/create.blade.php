<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Mesa</title>
  
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
    <h3 class="center-align">Agregar Mesa</h3>
    
    <!-- Formulario para agregar mesa -->
    <div class="form-container">
      <form id="agregarMesaForm">
        <div class="input-field col s12">
            <label for="numero">Número</label>
            <input id="numero" type="number" class="validate" required>
        </div>
        <div class="input-field col s12">
            <label>Capacidad</label>
            <br><br>
                <select class="browser-default">
                    <option value="" disabled selected>Seleccione la Capacidad de personas</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="4">5</option>
                    <option value="4">6</option>
                    <option value="4">7</option>
                    <option value="4">8</option>
                    <option value="4">9</option>
                    <option value="4">10</option>
                </select>
        </div>
        <div class="input-field col s12">
            <label for="estado">Estado</label>
            <br>
            <p>
                <label>
                  <input type="checkbox" />
                  <span>Libre</span>
                </label>
            </p>
            <p>
                <label>
                  <input type="checkbox" />
                  <span>Reservada</span>
                </label>
            </p>
            <p>
                <label>
                  <input type="checkbox" />
                  <span>Ocupada</span>
                </label>
            </p>
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
