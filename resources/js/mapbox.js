mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2x0b2hwNmIzMGdoZzJqbzY4NmlpdzVlYiJ9.CZoNf9VOaZAV8iojEmzQtw';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/navigation-night-v1', // Estilo de mapa predeterminado
    center: [2.1734, 41.3851], // Coordenadas del centro del mapa
    zoom: 12 // Nivel de zoom
});

let btn_entrega = document.getElementById('btn_entrega');

btn_entrega.addEventListener('click', mostrarEntregas);


function mostrarEntregas() {
    // Recorrer las coordenadas y agregar un marcador por cada una
    coordenadas.forEach(function (coordenada, index) {
        // Obtener la información de la marca correspondiente
        const infoMarca = info_marca[index];
        const tipoMarca = tipos_marca.find(tipo => tipo.id === infoMarca.tipo_marca_id_tipo_marca);

        // Crear un nuevo marcador con las coordenadas y color rojo
        const marker = new mapboxgl.Marker({ color: 'red' })
            .setLngLat([coordenada.long, coordenada.lat])
            .addTo(map);

        // Crear el contenido HTML del popup
        let popupContent = `
            <h5>Información de la marca</h5>
            <p>Usuario: ${infoMarca.usuario_id_usuario}</p>
            <p>Estado: ${infoMarca.estado}</p>
        `;

        // Si se encontró el tipo de marca, agregar el nombre al contenido del popup
        if (tipoMarca) {
            popupContent += `<p>Tipo: ${tipoMarca.nombre_marca}</p>`;
        } else {
            popupContent += `<p>Tipo: Desconocido</p>`; // Si el tipo de marca no se encontró, mostrar "Desconocido"
        }

        // Crear el popup y agregarlo al marcador
        const popup = new mapboxgl.Popup().setHTML(popupContent);
        marker.setPopup(popup);
    });
}

