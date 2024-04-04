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
        <h3>¿A DONDE QUIERES IR?</h3>
        <div class="left-column-container-buttons">
            <a href="{{ route('proveedores') }}"><button>Puntos de entrega</button></a>
            <a href="{{ route('lista_puntos_entrega') }}"><button>Puntos de recogida</button></a>
        </div>
    </div>
@endsection

@section('rightColumn')
    <div class="right-column-container">
        <div id='map' style='width: 1000px; height: 700px;'></div>
    </div>
@endsection
