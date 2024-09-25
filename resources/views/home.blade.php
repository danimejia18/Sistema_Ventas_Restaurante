{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Inicio')
    
{{-- Definimos el contenido --}}
@section('content')

    <h1><b>{{$nombre}}</b><br></h1>
@endsection