<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <script src="https://kit.fontawesome.com/6645ba3d64.js" crossorigin="anonymous"></script>
    <title>HOME</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_pages/first_page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_pages/listas_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_pages/estadisticas.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="#">
                <h1 class="title">SHARE<span class="amarillo">BITES</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @yield('navbar')
                </ul>
            </div>
        </div>
    </nav>
    <div class="row main-container d-flex">
        <div class="col-4 left-column">
            @yield('leftColumn')
        </div>
        <div class="col">
            <div id='map' style='width: 100%; height: 100%;'></div>
        </div>
    </div>
</body>

<script>
    //Coordenadas
    //Info de la marca
</script>

<script src='../resources/js/mapbox.js'></script>

</html>
