@extends('administracion.plantilla')

@section('titulo')
    Crear Usuario
@endsection

@section('contenido')
    <div class="container mt-5">
        <h2>Crear Nuevo Usuario</h2>
        <form method="POST" action="{{ route('crearUser') }}">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contrasenya</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="text" class="form-control" id="foto" name="foto" required>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo Usuario</label>
                <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                    <option value="1">Superadministrador</option>
                    <option value="2">Administrador</option>
                    <option value="3">Rider</option>
                    <option value="4">Proveedor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuari</button>
        </form>
    </div>
@endsection