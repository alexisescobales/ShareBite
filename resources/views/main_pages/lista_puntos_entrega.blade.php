@extends('layout_main_screen')

@section('navbar')
    <!-- Tu código de la barra de navegación si es necesario -->
@endsection

@section('leftColumn')
    <div class="left-column-container">
        <div style="padding: 35px">
            <h3>Puntos de entrega</h3>
        </div>
        <ul class="main_list">
            @foreach ($coordenadas as $coordenada)
                <li>
                    <div class="entregas" data-lat="{{ $coordenada->lat }}" data-long="{{ $coordenada->long }}">
                        <div class="entregas">
                            <p>Punto de entrega</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('rightColumn')
    {{-- Mapa --}}
    <div id='map' style='width: 100%; height: 100%;'>
        <button id="addMarkerButton" style="position: absolute; top: 20px; left: 20px; z-index: 1000;">Agregar Marca</button>
    </div>

    {{-- Script Mapbox --}}
    <script src="{{ asset('../resources/js/mapbox.js') }}"></script>

    <script>
        // Convertimos las coordenadas PHP a JSON
        let coordenadas = @json($coordenadas);
        console.log(coordenadas)

        // Cuando el mapa esté completamente cargado
        map.on('load', function() {
            // Llamar a la función para agregar los marcadores al mapa
            addMarkers(coordenadas);
        });
        // Función para agregar marcadores al mapa
        function addMarkers(coordenadas) {
            coordenadas.forEach(function(coordenada) {
                let lat = coordenada.lat;
                let long = coordenada.long;
                if (lat && long) {
                    // Crear un elemento de imagen para el marcador
                    let el = document.createElement('img');
                    el.src = "../resources/img/destino.png"; // Ruta de la imagen del marcador
                    el.style.width = '40px'; // Ajusta el ancho según tus preferencias
                    el.style.height = '40px'; // Ajusta la altura según tus preferencias

                    // Crear el marcador con el elemento de imagen personalizado
                    let marker = new mapboxgl.Marker(el)
                        .setLngLat([parseFloat(long), parseFloat(lat)])
                        .addTo(map);

                    // Agregar popup al marcador
                    let popup = new mapboxgl.Popup()
                        .setHTML(`<p>Latitud: ${coordenada.lat}</p><p>Longitud: ${coordenada.long}</p>`);

                    marker.setPopup(popup);

                    // Agregar evento de clic a todos los divs de la clase 'entregas'
                    document.querySelectorAll('.entregas').forEach(function(entregaDiv) {
                        entregaDiv.addEventListener('click', function() {
                            let lat = entregaDiv.getAttribute('data-lat');
                            let long = entregaDiv.getAttribute('data-long');

                            // Hacer zoom en la ubicación de la entrega
                            map.flyTo({
                                center: [long, lat], // Corregir el orden de latitud y longitud
                                zoom: 15,
                                essential: true
                            });
                        });
                    });

                }
            });
        }


        // Agregar evento de clic al botón para agregar una nueva marca
        document.getElementById('addMarkerButton').addEventListener('click', function(event) {
            // Obtener las coordenadas del click en el mapa
            let clickCoords = map.getCenter();
            let lat = clickCoords.lat;
            let long = clickCoords.lng;

            // Crear un objeto con los datos a enviar al servidor
            let data = {
                lat: lat,
                long: long,
                estado: 1, // Puedes definir el estado deseado aquí
                usuario_id_usuario: 1, // ID del usuario que realiza la inserción (puedes cambiarlo según tu lógica)
                tipo_marca_id_tipo_marca: 0 // ID del tipo de marca (puedes cambiarlo según tu lógica)
            };

            console.log(data);

            // Obtener el token CSRF
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Realizar la solicitud AJAX para enviar los datos al servidor
            fetch('{{ route('crear_pua') }}', {
                    method: 'POST', // Método POST para enviar los datos al servidor
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify(
                        data) // Convertir el objeto a formato JSON y enviarlo en el cuerpo de la solicitud
                })
                .then(response => {
                    if (response.ok) {
                        // La solicitud fue exitosa, recargar la página
                        location.reload();
                    } else {
                        // La solicitud no fue exitosa, manejar el error según sea necesario
                        console.error('Error al agregar la marca');
                    }
                })
                .catch(error => {
                    // Manejar cualquier error de red u otro tipo
                    console.error('Error de red:', error);
                });
        });
    </script>
@endsection
