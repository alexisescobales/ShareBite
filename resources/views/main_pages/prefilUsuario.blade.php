@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-house activo"></i></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-user"></i></a>
    </li>>
@endsection


@section('leftColumn')
    <div class="left-column-container">
        <div class="divImg">
            <img src="{{ asset('img/tiendas/fornet.jpg') }}" alt="">
            <p><i class="fa-solid fa-pen-to-square"></i></p>
        </div>
        
        <form class="formLocal" action="{{ action([App\Http\Controllers\PerfilProveedorControler::class, 'actualizarTienda']) }}" method="POST">
            @csrf
            <div class="container-header" style="display: flex">
                <h2 class="nombreLocal">{{ $tienda[0]->nombre }}</h2>
                <button id="btnGuardar" type="submit" class="btn_guardar">Guardar</button>
            </div>
            <div class="lotesDisp" style="display: flex">
                <label for="">Lotes disponibles:</label>
                <p>{{ $tienda[0]->menus }}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i></button>
            </div>
            <label for="">Nombre tienda</label>
            <input name="nombreTienda" type="text" value="{{ $tienda[0]->nombre }}">
            <label for="">Direccion</label>
            <input name="direccion" type="text" name="" value="{{ $tienda[0]->direccion }}">
            <label for="">Telefono de contacto</label>
            <input name="telefono" type="text" value="{{ $user->telefono }}">
        </form>
    </div>
@endsection


@section('rightColumn')
    <div class="right-column-container">
        <div id='map' style='width: 1000px; height: 700px;'></div>
    </div>
@endsection