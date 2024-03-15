@extends('layout_login_screen')

@section('leftColumn')
    <form class="login_div">
        <div class="inputs">
            <div class="input-wrapper mb-3">
                <p class="subtitle">NOMBRE</p>
                <div class="input-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">APELLIDOS</p>
                <div class="input-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CORREO</p>
                <div class="input-label">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CONTRASEÑA</p>
                <div class="input-label">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CONFIRMAR CONTRASEÑA</p>
                <div class="input-label">
                    <i class="fa-solid fa-check"></i>
                    <input type="password" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">TELEFONO</p>
                <div class="input-label">
                    <i class="fa-solid fa-phone"></i>
                    <input type="number" class="form-control">
                </div>
            </div>
        </div>
        <div class="my-3 button-login-group">
            <a href="{{ route('log_in_pages.register_shop') }}">
                <button type="button" class="btn_principal_yellow btn_mediano" id="register_btn">REGISTER</button>
            </a>
            <button type="submit" class="btn_secondary btn_mediano" id="login_btn">LOGIN</button>
        </div>
    </form>
@endsection
