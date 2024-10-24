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
            <form action="/Feservaciones/update/{{ $reservaciones->codigo }}" method="POST">
                @csrf
                @method('PUT') <!-- Esto indica que se está haciendo una actualización -->

                <div class="input-field col s12">
                    <label>ID Cliente</label>
                    <br><br>
                    <select class="browser-default" name="id_cliente" required>
                        <option value="" disabled>Seleccione el ID del Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->codigo }}"
                                {{ $cliente->codigo == $reservacion->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-field col s12">
                    <label>ID Mesa</label>
                    <br><br>
                    <select class="browser-default" name="id_mesa" required>
                        <option value="" disabled>Seleccione el ID de la Mesa</option>
                        @foreach ($mesas as $mesa)
                            <option value="{{ $mesa->codigo }}"
                                {{ $mesa->codigo == $reservacion->id_mesa ? 'selected' : '' }}>
                                {{ $mesa->numero }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-field col s6">
                    <label for="fecha_hora">Fecha y Hora</label>
                    <br><br>
                    <input id="fecha" type="date" name="fecha" class="validate"
                        value="{{ \Carbon\Carbon::parse($reservacion->fecha_hora)->format('Y-m-d') }}" required>
                    <input id="hora" type="time" name="hora" class="validate"
                        value="{{ \Carbon\Carbon::parse($reservacion->fecha_hora)->format('H:i') }}" required>
                </div>

                <div class="input-field col s6">
                    <label for="estado">Estado</label>
                    <br><br>
                    <p>
                        <label>
                            <input type="checkbox" name="estado[]" value="activa"
                                {{ in_array('activa', $reservacion->estado) ? 'checked' : '' }} />
                            <span>Activa</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="checkbox" name="estado[]" value="cancelada"
                                {{ in_array('cancelada', $reservacion->estado) ? 'checked' : '' }} />
                            <span>Cancelada</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="checkbox" name="estado[]" value="vencida"
                                {{ in_array('vencida', $reservacion->estado) ? 'checked' : '' }} />
                            <span>Vencida</span>
                        </label>
                    </p>
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
