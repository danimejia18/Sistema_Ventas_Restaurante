{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título de la página --}}
@section('title', 'Actualizar Detalle de Pedido')

{{-- Definimos el contenido principal --}}
@section('content')
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
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-size: 1.2em;
            /* Ajusta el tamaño según lo que necesites */
            font-weight: bold;
            /* Opcional: negrita */
        }

        .form-label1 {
            font-size: 1.2em;
            /* Ajusta el tamaño según lo que necesites */
            font-weight: bold;
            /* Opcional: negrita */
        }
    </style>

    <h1 class="text-center">Modificar Detalle de pedido</h1>
    <br>
    <h5 class="text-center">Formulario para actualizar el Detalle de pedido</h5>
    <hr>

    <div class="container form-container center">
        <form action="/Detalle_pedidos/update/{{ $detalle_pedidos->codigo }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col s6">
                    <label for="id_pedido">ID Pedido</label>
                    <select class="form-control" id="id_pedido" name="id_pedido" value="{{ $detalle_pedidos->id_pedido }}" required>
                        @foreach ($pedidos as $item)
                            <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_pedido')
                        <span class="helper-text red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col s6">
                    <label for="id_producto">ID Producto</label>
                    <select class="form-control" id="id_producto" name="id_producto" value="{{ $detalle_pedidos->id_producto }}" required>
                        @foreach ($productos as $item)
                            <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_producto')
                        <span class="helper-text red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <label for="cantidad">Cantidad</label>
                    <input id="cantidad" type="number" name="cantidad" class="validate" required oninput="calculateSubtotal()" 
                           style="border: 1px solid #bdbdbd; padding: 8px; border-radius: 4px;">
                    @error('cantidad')
                        <span class="helper-text red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="col s6">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input id="precio_unitario" type="number" name="precio_unitario" class="validate" step="0.01" required 
                           oninput="calculateSubtotal()" 
                           style="border: 1px solid #bdbdbd; padding: 8px; border-radius: 4px;">
                    @error('precio_unitario')
                        <span class="helper-text red-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col s6">
                        <label for="subtotal">Subtotal</label>
                        <input id="subtotal" type="number" name="subtotal" class="validate" readonly 
                               style="border: 1px solid #bdbdbd; padding: 8px; border-radius: 4px; background-color: #f1f1f1;">
                        @error('subtotal')
                            <span class="helper-text red-text" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

            <div class="row mt-2">
                <div class="col s6">
                    <button class="btn waves-effect waves-light" type="submit">Guardar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                <div class="col s6">
                    <a class="btn waves-effect waves-light" href="/Detalle_pedidos/show">Cancelar
                        <i class="material-icons right">cancel</i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    function calculateSubtotal() {
        const cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
        const precioUnitario = parseFloat(document.getElementById('precio_unitario').value) || 0;
        const subtotal = cantidad * precioUnitario;
        document.getElementById('subtotal').value = subtotal.toFixed(2); // Muestra el subtotal con 2 decimales
    
    }
</script>
@endsection