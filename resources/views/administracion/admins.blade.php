@extends('administracion.plantilla')

@section('cap')
    <link rel="stylesheet" href="../resources/css/admin.css">
@endsection

@section('contenido')
<div class="container">
    <div class="titulo">
        <h1>ADMINISTRACIÓN</h1>
    </div>
    <div class="card-container">
        <div class="card">
            <i class="fas fa-home"></i>
            <h2>Riders</h2>
        </div>
        <div class="card">
            <i class="fas fa-user"></i>
            <h2>Proveedores</h2>
        </div>
        <div class="card">
            <i class="fas fa-envelope"></i>
            <h2>Puas</h2>
        </div>
    </div>
</div>
@endsection