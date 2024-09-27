@extends('layout.app')

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
                        <h4 class="card-title">Hola, <b>{{$nombre}}</b></h4>
                        <p class="card-text">Gestiona tus ventas, productos, clientes, pedidos y más, de manera eficiente y rápida.</p>
                        <p>Accede a las diferentes secciones para comenzar:</p>
                        <div class="d-flex justify-content-around">
                            <a href="/productos" class="btn btn-primary">
                                <i class="fas fa-box"></i> Productos
                            </a>
                            <a href="/clientes" class="btn btn-success">
                                <i class="fas fa-users"></i> Clientes
                            </a>
                            <a href="/pedidos" class="btn btn-warning text-white">
                                <i class="fas fa-shopping-cart"></i> Pedidos
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Sistema de Ventas - Gestiona tu negocio fácilmente
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection