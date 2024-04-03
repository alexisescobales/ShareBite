@extends('administracion.plantilla')

@section('titulo')
    Gestionar
@endsection

@section('cap')

@endsection

@section('contenido')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Gestionar <b>Riders</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="status" value="admins" checked="checked"> Administradores
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="status" value="riders"> Riders
                            </label>
                            <label class="btn btn-warning">
                                <input type="radio" name="status" value="provee"> Proveedores
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="status" value="puas"> Puas
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Foto</th>
                        <th>Tipo usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id_usuario }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->foto }}</td>
                        <td>{{ $usuario->tipo_usuario->nombre_tipo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $usuarios->links() }}
        </div>
    </div>
</div>
@endsection