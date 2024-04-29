@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-house activo"></i></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('perfilRaider') }}"><i class="fa-solid fa-user"></i></a>
    </li>
@endsection

@section('leftColumn')
    <div class="left-column-container">
        <div style="padding: 35px">
            <h3>Puntos De Recogida</h3>
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
                            <h6>{{ ucwords($categoria_tiendas[$loop->index]->categoria) }}</h6>
                            <ul>
                                {{-- Muestra la direccion y los lotes disponibles --}}
                                @foreach ($tienda->tiendas as $tienda_individual)
                                    <p>Dirección: {{ ucwords($tienda_individual->direccion) }}</p>
                                    <p>Lotes: {{ $tienda_individual->menus }}</p>
                                @endforeach
                            </ul>
                            {{-- Boton para desplegar div de reserva de lote --}}
                            <button style="margin-left:140px;" class="toggle-button">Reservar Lotes</button>
                            {{-- Div para reservar lotes --}}
                            <div class="lotes-container" style="display: none;">
                                <p>Cantidad: <span class="lotes-count">0</span>/{{ $tienda_individual->menus }}</p>
                                {{-- Numero de lotes a reservar --}}
                                <p class="max-lotes" style="display: none;">{{ $tienda_individual->menus }}</p>
                                {{-- Añadir o quitar lotes a reservar --}}
                                <button class="ajuste-lotes btn_secondary btn_mediano" data-action="decrement">-</button>
                                <button class="ajuste-lotes btn_secondary btn_mediano" data-action="increment">+</button>

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
        // Convertimos las variable PHP a JSON
        let tiendas = @json($tiendas);

        let nombre_tiendas = @json($nombre_tiendas);

        let categoria_tiendas = @json($categoria_tiendas);

        console.log(categoria_tiendas)

        function addMarkers(tiendas, nombre_tiendas) {
    tiendas.forEach(function(tienda, index) {
        tienda.tiendas.forEach(function(tienda_individual) {
            let marca = tienda_individual.marca;
            if (marca) {
                let lat = marca.lat;
                let long = marca.long;
                if (lat && long) {
                    // Obtener el nombre de la tienda correspondiente usando el índice actual del bucle
                    let nombre_tienda = nombre_tiendas[index].nombre;

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
                            `<h4>${nombre_tienda}</h4><p>${tienda_individual.categoria}</p><p>${tienda_individual.direccion}</p>`
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
                zoom: 15, // Nivel de zoom 
                essential: true // Evitar el bloqueo por el navegador
            });
        });
    });
}




        // Llamamos a la función para agregar los marcadores
        addMarkers(tiendas, nombre_tiendas);
    </script>
@endsection
