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

    <script src='/resources/js/mapbox.js'></script>
@endsection

@section('rightColumn')
<div id='map' style='width: 1000px; height: 700px;'></div>

<script>
    console.log('Coordenadas:', @json($coordenadas));
    console.log('Información de la marca:', @json($info_marca));
    console.log('Tipos de marca:', @json($tipos_marca));
</script>
@endsection
