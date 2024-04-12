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
        <div style="padding: 35px">
            <h3>Puntos de entrega</h3>
        </div>
        <ul class="main_list">
            <a href="{{ route('main') }}">
                <li>
                    <div>
                        <img src="../resources/img/tienda.png" alt="">
                        <div>
                            <h4>Vivari</h4>
                            <p>3 paquetes disponibles</p>
                        </div>
                        <p>20m</p>
                    </div>
                </li>
            </a>
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>Vivari</h4>
                        <p>3 paquetes disponibles</p>
                    </div>
                    <p>20m</p>
                </div>
            </li>
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>Vivari</h4>
                        <p>3 paquetes disponibles</p>
                    </div>
                    <p>20m</p>
                </div>
            </li>
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>Vivari</h4>
                        <p>3 paquetes disponibles</p>
                    </div>
                    <p>20m</p>
                </div>
            </li>
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>Vivari</h4>
                        <p>3 paquetes disponibles</p>
                    </div>
                    <p>20m</p>
                </div>
            </li>
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>Vivari</h4>
                        <p>3 paquetes disponibles</p>
                    </div>
                    <p>20m</p>
                </div>
            </li>
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>Vivari</h4>
                        <p>3 paquetes disponibles</p>
                    </div>
                    <p>20m</p>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('rightColumn')
    <div id='map' style='width: 100%; height: 100%;'></div>
@endsection