mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2x0b2hwNmIzMGdoZzJqbzY4NmlpdzVlYiJ9.CZoNf9VOaZAV8iojEmzQtw';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/navigation-night-v1', // Estilo de mapa predeterminado
    center: [2.1734, 41.3851], // Coordenadas del centro del mapa
    zoom: 12 // Nivel de zoom
});

// Añadir marcadores para cada punto de entrega
puntosEntrega.forEach(function (puntoEntrega) {
    new mapboxgl.Marker()
        .setLngLat(puntoEntrega.coordenadas)
        .addTo(map);
});




// Añadir un marcador al hacer clic en el mapa
// map.on('click', function(e) {
//     var coordinates = e.lngLat;
//     new mapboxgl.Marker()
//       .setLngLat(coordinates)
//       .addTo(map);
//   });