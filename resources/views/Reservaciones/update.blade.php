{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Actualizar Reservación')

{{-- Definimos el contenido --}}
@section('content')

    <!-- Importar Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table-container table {
            width: 100%;
            border: black dotted 1px;
        }

        .btn-floating {
            float: right;
            margin-right: 50px;
            bottom: 10px;
        }

        thead {
            background-color: antiquewhite;
        }
    </style>

    <div class="container">
        <div class="table-container">
            <h5 class="card-title">Actualizar Reservación</h5>
            <form action="/Reservaciones/update/{{ $reservacion->codigo }}" method="POST">
                @csrf
                @method('PUT') <!-- Esto indica que se está haciendo una actualización -->

                <div class="row">
                    <div class="input-field col s6">
                        <label for="id_cliente">Cliente</label><br><br>
                        <select name="id_cliente" class="form-control" name="id_cliente" id="id_cliente" required>
                            <option value="" disabled selected>Seleccione un cliente</option>
                            @foreach ($clientes as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $reservacion->id_cliente == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_cliente')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="input-field col s6">
                        <label for="id_mesa">Mesa</label><br><br>
                        <select name="id_mesa" class="form-control" name="id_mesa" id="id_mesa" value="{{ $reservacion->id_mesa }}" required>
                            <option value="" disabled selected>Seleccione una mesa</option>
                            @foreach ($mesas as $item)
                                <option value="{{ $item->codigo }}"
                                    {{ $reservacion->id_mesa == $item->codigo ? 'selected' : '' }}>
                                    {{ $item->numero }}</option>
                            @endforeach
                        </select>
                        @error('id_mesa')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="input-field col s6">
                        <label for="fecha_hora">Fecha y Hora</label><br>
                        <input id="fecha_hora" type="datetime-local" name="fecha_hora" class="validate" value="{{ $reservacion->fecha_hora }}" required>
                        @error('fecha_hora')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s12">
                        <label for="estado">Estado</label><br><br>
                        <p>
                            <label>
                                <input name="estado" type="radio" value="reservado" required {{ (old('estado',$reservacion->estado) == 'reservado') ? 'checked' : '' }} />
                                <span>Reservada</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="estado" type="radio" value="cancelado" required {{ (old('estado',$reservacion->estado) == 'cancelado') ? 'checked' : '' }} />
                                <span>Cancelado</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="estado" type="radio" value="vencido" required {{ (old('estado', $reservacion->estado) == 'vencido') ? 'checked' : '' }} />
                                <span>Vencido</span>
                            </label>
                        </p>
                        @error('estado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="row mt-2">
                        <div class="col s6">
                            <button class="btn waves-effect waves-light" type="submit">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                        <div class="col s6">
                            <a class="btn waves-effect waves-light" href="/Reservaciones/show">Cancelar
                                <i class="material-icons right">cancel</i>
                            </a>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <!-- Importar Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/reservacion.js') }}"></script>
@endsection
