<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Detalle_pedidos</title>
  
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
    <h3 class="center-align">Modificar Detalle_pedidos</h3>
    
    <!-- Formulario para modificat Detalle_pedidos -->
    <div class="form-container">
      <form id="modificatDetalle_pedidosForm">
        <div class="row">
            <div class="input-field col s6">
                <label>ID Pedido</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Pedido</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
            <div class="input-field col s6">
                <label>ID Producto</label>
                <br><br>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione el ID del Producto</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="cantidad">Cantidad</label>
                <input id="cantidad" type="number" class="validate" value="5" required>
            </div>
            <div class="input-field col s6">
                <label for="PrecioU">Precio Unitario</label>
                <br><br>
                <input id="PrecioU" type="decimal" class="validate" value="$5.00" required>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="subtotal">Subtotal</label>
                <input id="subtotal" type="text" class="validate" value="$25.00" required>
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
