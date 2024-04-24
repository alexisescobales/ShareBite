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
            <div class="container justify-content-centre">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="
                        height: 50px;
                        width: 50px;
                        font-size: 24px;
                        background-color: #FBFBFB;
                    ">
                    <i class="fa-solid fa-language"></i>
                </button>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @yield('navbar')
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Traductor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('translate') }}">
                        @csrf
                        <textarea name="" id="" cols="50" rows="10"></textarea>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Selecciona el idioma</option>
                            <option value="AR">Arabe</option>
                            <option value="DE">Aleman</option>
                            <option value="EN-US">Ingles</option>
                            <option value="FR">Frances</option>
                            <option value="PL">Polaco</option>
                            <option value="RO">Rumano</option>
                            <option value="RU">Ruso</option>
                            <option value="TR">Turco</option>
                            <option value="UK">Ucraniano</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Traducir</button>
                    </form>
                    @yield('trad')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="row main-container d-flex">
        <div class="col-4 left-column">
            @yield('leftColumn')
        </div>
        <div class="col">
            @yield('rightColumn')
        </div>
    </div>
</body>

<script>
    //Coordenadas
    //Info de la marca
</script>

<script src='../resources/js/mapbox.js'></script>

</html>