mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2x0b2hwNmIzMGdoZzJqbzY4NmlpdzVlYiJ9.CZoNf9VOaZAV8iojEmzQtw';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/navigation-night-v1', // Estilo de mapa predeterminado
    center: [41.38879,  2.15899], // Coordenadas del centro del mapa
    zoom: 6 // Nivel de zoom
});