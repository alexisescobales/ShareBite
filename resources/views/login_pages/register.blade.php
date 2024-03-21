@extends('layout_login_screen')

@section('leftColumn')
@if ($eleccion == "rider")
    <form class="login_div" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'registro1']) }}" method="POST">
@else
    <form class="login_div" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'registro2']) }}" method="POST">
@endif
    
        @csrf
        <div class="inputs">
            <div class="input-wrapper mb-3">
                <p class="subtitle">NOMBRE</p>
                <div class="input-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">APELLIDOS</p>
                <div class="input-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control" name="apellido">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CORREO</p>
                <div class="input-label">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" class="form-control" name="correo">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CONTRASEÑA</p>
                <div class="input-label">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CONFIRMAR CONTRASEÑA</p>
                <div class="input-label">
                    <i class="fa-solid fa-check"></i>
                    <input type="password" class="form-control" name="repitPassword">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">TELEFONO</p>
                <div class="input-label">
                    <i class="fa-solid fa-phone"></i>
                    <input type="number" class="form-control" name="telefono">
                </div>
            </div>
        </div>
        <div class="my-3 button-login-group">
            <a href="{{ route('principal') }}">
                <button type="button" class=" btn_mediano btn_secondary" id="register_btn">Volver</button>
            </a>
           
            @if ($eleccion == "proveedor")
                <button type="submit" class="btn_principal_yellow btn_mediano" id="login_btn">Continuar</button>
            @else
                <button type="submit" class="btn_principal_yellow btn_mediano" id="login_btn">Registro</button>
            @endif
            
        </div>
    </form>
@endsection
