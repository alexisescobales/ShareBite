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


// Cantidad de lotes: Este bloque maneja la funcionalidad de ajustar la cantidad de lotes. Para cada botón con la clase 'ajuste-lotes'
document.querySelectorAll('.ajuste-lotes').forEach(button => {
    button.addEventListener('click', function () {
        const action = this.getAttribute('data-action');
        const lotesCountElement = this.parentNode.querySelector('.lotes-count'); // Elemento que muestra la cantidad de lotes seleccionados
        let lotesCount = parseInt(lotesCountElement.textContent); // Obtener la cantidad actual de lotes seleccionados
        const maxLotes = parseInt(this.parentNode.querySelector('.max-lotes').textContent); // Número máximo de lotes disponibles en la tienda

        if (action === 'increment' && lotesCount < maxLotes) {
            lotesCount++; // Incrementar la cantidad de lotes seleccionados
        } else if (action === 'decrement' && lotesCount > 0) {
            lotesCount--; // Decrementar la cantidad de lotes seleccionados
        }

        // Actualizar el valor de la cantidad de lotes seleccionados en el elemento HTML
        lotesCountElement.textContent = lotesCount;

        // Actualizar el valor del campo oculto en el formulario
        this.closest('.lotes-container').querySelector('.lotes-count').textContent = lotesCount;
        this.closest('.lotes-container').querySelector('#lotesReservados').value = lotesCount;

        // Imprimir el valor de lotesCount en la consola del navegador
        console.log("Valor de lotesCount:", lotesCount);
    });
});
















