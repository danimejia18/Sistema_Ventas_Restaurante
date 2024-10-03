<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Producto</title>
  
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
    <h3 class="center-align">Modificar Producto</h3>
    
    <!-- Formulario para modificar producto -->
    <div class="form-container">
      <form id="modificarProductoForm">
        <div class="row">
          <div class="input-field col s6">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" class="validate" value="Tomate" required>
          </div>
          <div class="input-field col s6">
            <label for="descripcion">Descripción</label>
            <input id="descripcion" type="text" class="validate" value="Tomate manzana" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <label for="stock">Stock</label>
            <br><br>
            <input id="stock" type="number" class="validate" required>
          </div>
          <div class="input-field col s12">
            <label for="estado">Estado</label>
            <br>
            <p>
                <label>
                  <input type="checkbox" />
                  <span>Agotado</span>
                </label>
            </p>
            <p>
                <label>
                  <input type="checkbox" checked="checked" />
                  <span>Activo</span>
                </label>
            </p>
        </div>
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
