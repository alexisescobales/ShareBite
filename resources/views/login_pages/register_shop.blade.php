@extends('layout_login_screen')

@section('leftColumn')
    <form class="login_div" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'registro3']) }}" method="POST">
        @csrf
        <div class="inputs">
            <div class="input-wrapper mb-3">
                <p class="subtitle">NOMBRE DE LA TIENDA</p>
                <div class="input-label">
                    <i class="fa-solid fa-shop"></i>
                    <input type="text" class="form-control" name="nombreTienda">
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
                    <input type="text" class="form-control" name="direccion">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">HORARIO</p>
                <div class="input-label">
                    <i class="fa-solid fa-clock"></i>
                    <input type="text" class="form-control" name="horario">
                </div>
            </div>
        </div>
        <div class="my-3 button-login-group">
                <button type="button" class="btn_secondary btn_mediano" id="register_btn">Volver</button>
            <button type="submit" class="btn_principal_yellow btn_mediano" id="login_btn">REGISTER</button>
        </div>

        <input type="text" class="form-control" name="name" hidden value="{{$registro1["name"]}}">
        <input type="text" class="form-control" name="apellido" hidden value="{{$registro1["apellido"]}}">
        <input type="email" class="form-control" name="correo" hidden value="{{$registro1["correo"]}}">
        <input type="password" class="form-control" name="password" hidden value="{{$registro1["password"]}}">
        <input type="number" class="form-control" name="telefono" hidden value="{{$registro1["telefono"]}}">
    </form>
@endsection
