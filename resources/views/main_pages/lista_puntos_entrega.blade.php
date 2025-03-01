@extends('layout_main_screen')

@section('navbar')
    <!-- Tu código de la barra de navegación si es necesario -->
@endsection

@section('leftColumn')
    <div class="left-column-container">
        <div style="padding: 35px">
            
        </div>
        <h3 style="">Pedidos Activos</h3>
        <ul class="main_list" id="pedidos">
            @foreach ($pedidos as $pedido)
                <li>
                    <div class="pedidos" data-id="{{ $pedido->id_pedido }}">
                        <p>Tienda: {{ $pedido->tiendas->nombre }}</p>
                        <p>Menús: {{ $pedido->cantidad_menus }}</p>
                        <button class="elegir-btn" type="submit">Seleccionar</button>
                    </div>
                </li>
            @endforeach
        </ul>
        <button style="margin-top:30px;" id="guardarDatosButton">Guardar Datos</button>
        <h3 style="margin-top:30px; margin-bottom:10px;">Puntos De Entrega</h3>
        <ul class="main_list" id="entregas">
            @foreach ($coordenadas as $key => $coordenada)
                <li>
                    <div class="entregas" data-lat="{{ $coordenada->lat }}" data-long="{{ $coordenada->long }}" data-id="{{ $coordenada->id_marcas }}">
                        <p>Punto {{ $key + 1 }}</p> <!-- Aquí se muestra el número de punto sumando 1 al índice de la iteración -->
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

    <style>
#entregas[disabled] {
    background-color: #f2f2f2; /* Cambia el color de fondo a gris */
    color: #888; /* Cambia el color del texto a gris oscuro */
    cursor: not-allowed; /* Cambia el cursor a no permitido */
}

#entregas[disabled] li {
    background-color: #f2f2f2; /* Cambia el color de fondo a gris */
    color: #888; /* Cambia el color del texto a gris oscuro */
    cursor: not-allowed; /* Cambia el cursor a no permitido */
}

#lista_entregas {
    background-color: #dbdbcf;
    cursor: not-allowed; /* Cambia el cursor a no permitido */
}

#lista_entregas li {
    background-color: #dbdbcf;
    cursor: not-allowed; /* Cambia el cursor a no permitido */
}
    </style>

    <script>

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Convertimos las coordenadas PHP a JSON
        let coordenadas = @json($coordenadas);
        console.log(coordenadas)

        let pedidos = @json($pedidos);
        console.log(pedidos)

        // Deshabilitar la lista de entregas al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('entregas').setAttribute('disabled', 'disabled'); // Deshabilita la lista
        });

        // Variable para almacenar el pedido seleccionado
        let pedidoSeleccionado = null;

        // Variable para mantener un registro de los menús asignados a cada punto de entrega
        let menusAsignados = {};

        // Variable para mantener un registro del total de menús disponibles
        let totalMenusDisponibles = 0;

// Agregar evento de clic a los elementos de la clase 'pedidos'
document.querySelectorAll('.pedidos').forEach(function(pedido) {
    pedido.addEventListener('click', function() {
        // Obtener el ID del pedido del atributo data-id
        let pedidoId = pedido.dataset.id;

        // Eliminar la clase 'seleccionado' de todos los pedidos
        document.querySelectorAll('.pedidos').forEach(function(pedido) {
            pedido.classList.remove('seleccionado');
        });

        // Agregar la clase 'seleccionado' al pedido seleccionado
        pedido.classList.add('seleccionado');

        // Obtener la información del pedido seleccionado
        let tienda = pedido.querySelector('p:nth-child(1)').textContent.split(': ')[1];
        let menus = parseInt(pedido.querySelector('p:nth-child(2)').textContent.split(': ')[1]);

        // Guardar el pedido seleccionado en la variable
        pedidoSeleccionado = {
            id: pedidoId,
            tienda: tienda,
            menus: menus
        };

        // Actualizar el total de menús disponibles
        totalMenusDisponibles = menus;

        // Mostrar la información del pedido seleccionado en la consola
        console.log('Pedido seleccionado:', pedidoSeleccionado);
    });
});


// Habilitar la lista de entregas cuando se hace clic en el botón "Elegir"
document.querySelectorAll('.elegir-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.getElementById('entregas').removeAttribute('disabled'); // Habilita la lista
        // Aplicar estilos a la lista de entregas
       // Mostrar los botones "+" a la derecha de cada punto de entrega
let listaEntregasConBoton = document.querySelectorAll('.entregas');
listaEntregasConBoton.forEach(function(entrega) {
    // Eliminar botones anteriores si existen
    let existingButton = entrega.querySelector('.agregar-menu-btn');
    if (existingButton) {
        existingButton.remove();
    }
    // Crear y añadir el botón "+" para agregar menús
    let addButton = document.createElement('button');
    addButton.textContent = '+';
    addButton.className = 'agregar-menu-btn';
    addButton.style.marginLeft = '10px'; // Espacio entre el botón "+" y el texto
    entrega.appendChild(addButton);

    // Crear elemento para mostrar la cantidad de lotes asignados
    let lotesAsignadosElement = document.createElement('span');
    lotesAsignadosElement.className = 'lotes-asignados';
    lotesAsignadosElement.textContent = 'Lotes: 0';
    entrega.appendChild(lotesAsignadosElement);

// Agregar evento de clic al botón "+" para agregar menús
addButton.addEventListener('click', function() {
    // Convertir el ID del punto de entrega de cadena de texto a entero
let puntoEntregaId = parseInt(entrega.getAttribute('data-id'));

    // Verificar si hay un pedido seleccionado
    if (pedidoSeleccionado) {
        // Verificar si aún hay menús disponibles para asignar
        if (totalMenusDisponibles > 0) {
            // Verificar si ya existe un objeto para este punto de entrega en el pedido seleccionado
            if (!(pedidoSeleccionado.id in menusAsignados)) {
                menusAsignados[pedidoSeleccionado.id] = {}; // Crear un objeto vacío para el ID del pedido
            }
            // Verificar si ya existe un objeto para este punto de entrega en el pedido seleccionado
            if (!(puntoEntregaId in menusAsignados[pedidoSeleccionado.id])) {
                menusAsignados[pedidoSeleccionado.id][puntoEntregaId] = {
                    id: puntoEntregaId,
                    lotes: 0 // Inicializar el número de lotes asignados a cero
                };
            }
            // Incrementar el número de lotes asignados al punto de entrega para el pedido seleccionado
            menusAsignados[pedidoSeleccionado.id][puntoEntregaId].lotes++;
            // Actualizar el total de menús disponibles
            totalMenusDisponibles--;
            // Actualizar el elemento que muestra la cantidad de lotes asignados
            lotesAsignadosElement.textContent = 'Lotes: ' + menusAsignados[pedidoSeleccionado.id][puntoEntregaId].lotes;
            // Aquí puedes implementar la lógica para agregar el lote al punto de entrega correspondiente
            console.log(`Se agregó 1 lote al punto de entrega con ID ${puntoEntregaId} para el pedido con ID ${pedidoSeleccionado.id}`);
            console.log(`Menús restantes: ${totalMenusDisponibles}`);
        } else {
            console.log('No hay más menús disponibles para asignar.');
        }
    } else {
        console.log('No hay un pedido seleccionado.');
    }
});



});
    });
});


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

// Agregar evento de clic al botón para guardar los datos en el servidor
document.getElementById('guardarDatosButton').addEventListener('click', function(event) {
    // Convertir el ID del pedido a entero
    let pedidoId = parseInt(pedidoSeleccionado.id);

    // Convertir los IDs de los lotes a enteros
    let lotesAsignadosInt = {};
    for (let puntoEntregaId in menusAsignados[pedidoSeleccionado.id]) {
        let puntoEntregaIdInt = parseInt(puntoEntregaId);
        lotesAsignadosInt[puntoEntregaIdInt] = menusAsignados[pedidoSeleccionado.id][puntoEntregaId];
    }

    // Crear un objeto con los datos a enviar al servidor
    let datosParaEnviar = {
        pedido: {
            id: pedidoId,
            tienda: pedidoSeleccionado.tienda,
            menus: pedidoSeleccionado.menus
        },
        lotesAsignados: lotesAsignadosInt
    };

    console.log(datosParaEnviar);


    // Realizar la solicitud AJAX para enviar los datos al servidor
    fetch('{{ route('marca_has_pedido') }}', {
        method: 'POST', // Método POST para enviar los datos al servidor
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(datosParaEnviar) // Convertir el objeto a formato JSON y enviarlo en el cuerpo de la solicitud
    })
    .then(response => {
        if (response.ok) {
            // La solicitud fue exitosa, puedes recargar la página o realizar alguna otra acción
            console.log('Datos guardados exitosamente');
        } else {
            // La solicitud no fue exitosa, manejar el error según sea necesario
            console.error('Error al guardar los datos');
        }
    })
    .catch(error => {
        // Manejar cualquier error de red u otro tipo
        console.error('Error de red:', error);
    });
});

    </script>
@endsection
