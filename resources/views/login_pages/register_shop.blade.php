@extends('layout_login_screen')

@section('leftColumn')
    <form class="login_div">
        <div class="inputs">
            <div class="input-wrapper mb-3">
                <p class="subtitle">NOMBRE DE LA TIENDA</p>
                <div class="input-label">
                    <i class="fa-solid fa-shop"></i>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">CATEGORIA</p>
                <div class="input-label">
                    <i class="fa-solid fa-list"></i>
                    <select id="categoria" name="categoria" class="form-control" placeholder="Selecciona una categoría">
                        <option value="restaurante">Restaurante</option>
                        <option value="panaderia">Panadería</option>
                        <option value="supermercado">Supermercado</option>
                    </select>
                </div>

            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">DIRECCIÓN</p>
                <div class="input-label">
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">HORARIO</p>
                <div class="input-label">
                    <i class="fa-solid fa-clock"></i>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="my-3 button-login-group">
                <button type="button" class="btn_principal_yellow btn_mediano" id="register_btn">REGISTER</button>
            <button type="submit" class="btn_secondary btn_mediano" id="login_btn">LOGIN</button>
        </div>

        <input type="text" class="form-control" name="name" hidden value="{{$registro1["name"]}}">
        <input type="text" class="form-control" name="apellido" hidden value="{{$registro1->apellido}}">
        <input type="email" class="form-control" name="correo" hidden value="{{$registro1->email}}">
        <input type="password" class="form-control" name="password" hidden value="{{$registro1->password}}">
        <input type="number" class="form-control" name="telefono" hidden value="{{$registro1->telefono}}">
    </form>
@endsection
