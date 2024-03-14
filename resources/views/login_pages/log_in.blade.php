@extends('layout_login_screen')

@section('leftColumn')
    <form class="login_div">
        <div class="inputs">
            <div class="input-wrapper mb-3">
                <p class="subtitle">CORREO</p>
                <div class="input-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CONTRASEÑA</p>
                <div class="input-label">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="form-control">
                </div>
            </div>
        </div>
        <div class="my-3 button-login-group">
            <button type="submit" class="btn_principal_yellow btn_mediano" id="login_btn">LOGIN</button>
            <button type="button" class="btn_secondary btn_mediano" id="register_btn">REGISTER</button>
        </div>
    </form>
@endsection
