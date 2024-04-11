mapboxgl.accessToken = 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2x0b2hwNmIzMGdoZzJqbzY4NmlpdzVlYiJ9.CZoNf9VOaZAV8iojEmzQtw';
let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/navigation-night-v1', // Estilo de mapa predeterminado
    // center: [2.1734, 41.3851], // Coordenadas del centro del mapa
    zoom: 12 // Nivel de zoom
});



// Obtener la ubicación actual del usuario
navigator.geolocation.getCurrentPosition(function (position) {
    var lng = position.coords.longitude;
    var lat = position.coords.latitude;

    // Centrar el mapa en la ubicación actual del usuario
    map.setCenter([lng, lat]);
});

// Agregar control de navegación
map.addControl(new mapboxgl.NavigationControl());




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//Maneja la funcionalidad de alternar la visibilidad de los elementos con la clase 
document.querySelectorAll('.toggle-button').forEach(button => {
    button.addEventListener('click', function () {
        const lotesContainer = this.parentNode.querySelector('.lotes-container');
        lotesContainer.style.display = (lotesContainer.style.display === 'none') ? 'block' : 'none';
    });
});


//Cantidad de lotes: Este bloque maneja la funcionalidad de ajustar la cantidad de lotes. Para cada botón con la clase 
document.querySelectorAll('.ajuste-lotes').forEach(button => {
    button.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const lotesCount = parseInt(this.parentNode.querySelector('.lotes-count').textContent); // Obtenemos el numero de lotes ah reservar
        const maxLotes = parseInt(this.parentNode.querySelector('.max-lotes').textContent); // Obtenemos la clase max-lotes que indica el numero de lotes disponibles en tienda

        if (action === 'increment' && lotesCount < maxLotes) {
            this.parentNode.querySelector('.lotes-count').textContent = lotesCount + 1;
        } else if (action === 'decrement' && lotesCount > 0) {
            this.parentNode.querySelector('.lotes-count').textContent = lotesCount - 1;
        }
    });
});














