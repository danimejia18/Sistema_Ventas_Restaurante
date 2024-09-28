@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Inicio')
    
{{-- Definimos el contenido --}}
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header bg-dark text-white">
                        <h2>Bienvenido al Sistema de Ventas</h2>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Un gusto saludarle </h4>
                        <p class="card-text">Gestiona tus ventas, productos, clientes, pedidos y más, de manera eficiente y rápida.</p>
                        <p>Accede a las diferentes secciones para comenzar:</p>
                        <div class="d-flex justify-content-around">
                            <a href="/Productos/Mostrar" class="btn btn-primary">
                                <i class="fas fa-box"></i> Productos
                            </a>
                            <a href="/Clientes/Mostrar" class="btn btn-success">
                                <i class="fas fa-users"></i> Clientes
                            </a>
                            <a href="/Pedidos/Mostrar" class="btn btn-warning text-white">
                                <i class="fas fa-shopping-cart"></i> Pedidos
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Sistema de Ventas
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection