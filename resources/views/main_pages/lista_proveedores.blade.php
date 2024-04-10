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
            <h3>Puntos de recogida</h3>
        </div>
        <ul class="main_list">
            @foreach ($tiendas as $tienda)
            <li>
                <div>
                    <img src="../resources/img/tienda.png" alt="">
                    <div>
                        <h4>{{ $tienda->nombre }}</h4>
                        <ul>
                            @foreach ($tienda->tiendas as $tienda_individual)
                                <p>Dirección: {{ $tienda_individual->direccion }}</p>
                                <p>Lotes: {{ $tienda_individual->menus }}</p>
                                <ul>
                                    @foreach ($tienda_individual->marca as $marca_individual)
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Aquí puedes calcular la distancia desde la ubicación actual si es necesario -->
                </div>
            </li>
        @endforeach
        
        </ul>
    </div>
@endsection

@section('rightColumn')
    {{-- Mapa --}}
    <div id='map' style='width: 1000px; height: 700px;'></div>

    {{-- Script Mapbox --}}
    <script src="{{ asset('../resources/js/mapbox.js') }}"></script>

    <script>
        // Convertimos la variable PHP a JSON
        let tiendas = @json($tiendas);
    
        // Función para agregar marcadores
        function addMarkers(tiendas) {
            tiendas.forEach(function(tienda) {
                tienda.tiendas.forEach(function(tienda_individual) {
                    // Accedemos a la propiedad "marca" de cada tienda_individual
                    let marca = tienda_individual.marca;
    
                    // Verificamos si la marca es un objeto válido
                    if (marca) {
                        // Obtenemos la latitud y longitud de la marca
                        let lat = marca.lat;
                        let long = marca.long;
    
                        // Verificamos que tengamos valores válidos de latitud y longitud
                        if (lat && long) {
                            // Agregamos un marcador al mapa con la latitud y longitud
                            new mapboxgl.Marker()
                                .setLngLat([parseFloat(long), parseFloat(lat)]) // Convertimos a números flotantes
                                .addTo(map);
                        }
                    }
                });
            });
        }
    
        // Llamamos a la función para agregar los marcadores
        addMarkers(tiendas);
    </script>
@endsection
