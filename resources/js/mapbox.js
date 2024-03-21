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
        // Crear un nuevo marcador con las coordenadas y color rojo
        const marker = new mapboxgl.Marker({ color: 'red' })
            .setLngLat([coordenada.long, coordenada.lat])
            .addTo(map);

        // Agregar información adicional sobre la marca usando info_marca
        const infoMarca = info_marca[index]; // Obtener la información de la marca correspondiente
        const popup = new mapboxgl.Popup().setHTML(`
            <h5>Información de la marca</h5>
            <p>Tipo: ${infoMarca.tipo_marca_id_tipo_marca}</p>
            <p>Usuario: ${infoMarca.usuario_id_usuario}</p>
            <p>Estado: ${infoMarca.estado}</p>
        `);

        // Agregar un popup al marcador
        marker.setPopup(popup);
    });
}

