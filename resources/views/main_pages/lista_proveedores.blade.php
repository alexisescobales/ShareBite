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
                    {{-- Guardamos lat y long de la tienda actual en data-set --}}
                    <div class="tienda" data-lat="{{ $tienda->tiendas[0]->marca->lat }}"
                        data-long="{{ $tienda->tiendas[0]->marca->long }}">
                        <img src="../resources/img/tienda.png">
                        <div>

                            {{-- Muestra el nombre de la tienda  ($loop->index para acceder al índice actual del bucle y obtener el nombre de la tienda correspondiente desde el array $nombre_tiendas.) --}}
                            <h4>{{ $nombre_tiendas[$loop->index]->nombre }}</h4>

                            {{-- Boton para desplegar div de reserva de lote --}}
                            <button class="toggle-button">Reservar Lotes</button>
                            <ul>
                                {{-- Muestra la direccion y los lotes disponibles --}}
                                @foreach ($tienda->tiendas as $tienda_individual)
                                    <p>Dirección: {{ $tienda_individual->direccion }}</p>
                                    <p>Lotes: {{ $tienda_individual->menus }}</p>
                                @endforeach
                            </ul>
                            {{-- Div para reservar lotes --}}
                            <div class="lotes-container" style="display: none;">
                                <p>Cantidad: <span class="lotes-count">0</span>/{{ $tienda_individual->menus }}</p>
                                {{-- Numero de lotes a reservar --}}
                                <p class="max-lotes" style="display: none;">{{ $tienda_individual->menus }}</p>
                                {{-- Añadir o quitar lotes a reservar --}}
                                <button class="ajuste-lotes" data-action="decrement">-</button>
                                <button class="ajuste-lotes" data-action="increment">+</button>

                                <!-- Formulario para crear pedido -->
                                <form id="reservaForm" action="{{ route('crear_pedido') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tienda_id" id="tiendaIdInput"
                                        value="{{ $tienda_individual->tienda_id_usuario }}">
                                    <!-- Value 0 como default de lotes predeterminados -->
                                    <input type="hidden" name="cantidad_menus" id="lotesReservados" value="0">
                                    <button type="submit">Crear Pedido</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('rightColumn')
    {{-- Mapa --}}
    <div id='map' style='width: 100%; height: 100%;'></div>

    {{-- Script Mapbox --}}
    <script src="{{ asset('../resources/js/mapbox.js') }}"></script>

    <script>
        // Convertimos la variable PHP a JSON
        let tiendas = @json($tiendas);

        console.log(tiendas)

        let nombre_tiendas = @json($nombre_tiendas);

        console.log(nombre_tiendas)

        // Función para agregar marcadores
        function addMarkers(tiendas, nombre_tiendas) {
            tiendas.forEach(function(tienda) {
                tienda.tiendas.forEach(function(tienda_individual) {
                    let marca = tienda_individual.marca;
                    if (marca) {
                        let lat = marca.lat;
                        let long = marca.long;
                        if (lat && long) {
                            // Encontrar el nombre correspondiente a la tienda actual
                            let nombre_tienda = nombre_tiendas.find(item => item.id === tienda_individual
                                .id).nombre;

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
                                .setHTML(
                                    `<h4>${nombre_tienda}</h4><p>Dirección: ${tienda_individual.direccion}</p><p>Lotes: ${tienda_individual.menus}</p>`
                                );

                            marker.setPopup(popup);
                        }
                    }
                });
            });

            // Agregar evento de clic a todos los divs de la clase 'tienda'
            document.querySelectorAll('.tienda').forEach(function(tiendaDiv, index) {
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
        addMarkers(tiendas, nombre_tiendas);
    </script>
@endsection
