@extends('administracion.plantilla')

@section('cap')
    <link rel="stylesheet" href="/resources/css/administracion/admin.css">
@endsection

@section('contenido')
<div class="card-container">
    <div class="card">
        <i class="fas fa-home"></i>
        <h2>Card 1</h2>
    </div>
    <div class="card">
        <i class="fas fa-user"></i>
        <h2>Card 2</h2>
    </div>
    <div class="card">
        <i class="fas fa-envelope"></i>
        <h2>Card 3</h2>
    </div>
</div>
@endsection