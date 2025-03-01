<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <script src="https://kit.fontawesome.com/6645ba3d64.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_pages/first_page.css') }}">
    <title>@yield('titulo')</title>
    @yield('cap')

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
                    <li class="nav-item">
                        <i class="fa-solid fa-house activo"></i>
                    </li>
                    <li class="nav-item">
                        <i class="fa-solid fa-chart-simple"></i>
                    </li>
                    <li class="nav-item">
                        <i class="fa-solid fa-user"></i>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('contenido')
    </div>
</body>

</html>