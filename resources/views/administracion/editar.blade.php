@extends('administracion.plantilla')

@section('titulo')
    Editar Usuario
@endsection

@section('contenido')
    <div class="container mt-5">
        <h2>Editar Usuario</h2>
        <form method="POST" action="{{ route('editar', ['id' => $usuario->id_usuario]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{ $usuario->correo }}" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="text" class="form-control" id="foto" name="foto" value="{{ $usuario->foto }}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="activo" name="activo" {{ $usuario->activo ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo Usuario</label>
                <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                    <option value="1" {{ $usuario->tipo_usuario_id_tipo == 1 ? 'selected' : '' }}>Superadministrador</option>
                    <option value="2" {{ $usuario->tipo_usuario_id_tipo == 2 ? 'selected' : '' }}>Administrador</option>
                    <option value="3" {{ $usuario->tipo_usuario_id_tipo == 3 ? 'selected' : '' }}>Rider</option>
                    <option value="4" {{ $usuario->tipo_usuario_id_tipo == 4 ? 'selected' : '' }}>Proveedor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Editar Usuario</button>
        </form>
    </div>
@endsection