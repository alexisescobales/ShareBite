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
                    <div class="tienda" data-lat="{{ $tienda->tiendas[0]->marca->lat }}" data-long="{{ $tienda->tiendas[0]->marca->long }}" data-nombre="{{ $tienda->nombre }}" data-direccion="{{ $tienda->tiendas[0]->direccion }}" data-lotes="{{ $tienda->tiendas[0]->menus }}">
                        <img src="../resources/img/tienda.png" alt="">
                        <div>
                            <h4>{{ $tienda->nombre }}</h4>
                            <ul>
                                @foreach ($tienda->tiendas as $tienda_individual)
                                    <p>Dirección: {{ $tienda_individual->direccion }}</p>
                                    <p>Lotes: {{ $tienda_individual->menus }}</p>
                                @endforeach
                            </ul>
                        </div>
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
                    let marca = tienda_individual.marca;
                    if (marca) {
                        let lat = marca.lat;
                        let long = marca.long;
                        if (lat && long) {
                            // Crear un elemento de imagen para el marcador
                            let el = document.createElement('img');
                            el.src = "../resources/img/tienda_pua.png"; // Ruta de la imagen del marcador
                            el.style.width = '40px'; // Ajusta el ancho según tus preferencias
                            el.style.height = '40px'; // Ajusta la altura según tus preferencias

                            // Crear el marcador con el elemento de imagen personalizado
                            let marker = new mapboxgl.Marker(el)
                                .setLngLat([parseFloat(long), parseFloat(lat)])
                                .addTo(map);

                            // Agregar popup al marcador
                            let popup = new mapboxgl.Popup()
                                .setHTML(`<h4>${tienda.nombre}</h4><p>Dirección: ${tienda_individual.direccion}</p><p>Lotes: ${tienda_individual.menus}</p>`);

                            marker.setPopup(popup);
                        }
                    }
                });
            });

            // Agregar evento de clic a todos los divs de la clase 'tienda'
            document.querySelectorAll('.tienda').forEach(function(tiendaDiv) {
                tiendaDiv.addEventListener('click', function() {
                    let lat = tiendaDiv.getAttribute('data-lat');
                    let long = tiendaDiv.getAttribute('data-long');

                    // Hacer zoom en la ubicación de la tienda
                    map.flyTo({
                        center: [long, lat],
                        zoom: 15, // Nivel de zoom deseado
                        essential: true // Marcar como esencial para evitar el bloqueo por el navegador
                    });
                });
            });
        }

        // Llamamos a la función para agregar los marcadores
        addMarkers(tiendas);
    </script>
@endsection
