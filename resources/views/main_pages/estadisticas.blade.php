@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-house activo"></i></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-user"></i></a>
    </li>
@endsection


@section('leftColumn')
    <div class="left-column-container">
        <img src="{{ asset('img/tiendas/fornet.jpg') }}" alt="">
        <form action="">
            <div class="container-header" style="display: flex">
                <h2 class="nombreLocal">ElFornet</h2>
                <button id="btnGuardar" class="btn_guardar">Guardar</button>
            </div>
            <div class="lotesDisp" style="display: flex">
                <label for="">Lotes disponibles:</label>
                <p>3</p>
                <button><i class="fa-solid fa-plus"></i></button>
            </div>
            <label for="">Nombre tienda</label>
            <input type="text">
            <label for="">Dereccion</label>
            <input type="text" name="" id="">
            <label for="">Telefono de contacto</label>
            <input type="number">
            
        </form>   
    </div>
@endsection


