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
                        <button style="background: none;" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                class="fa-solid fa-right-from-bracket"></i></button>
                    </li>>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('contenido')
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'CerrarSesion']) }}"
                    method="GET">
                    @csrf
                    <div class="modal-body">
                        <h1>Quieres cerrar sesion?</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Salir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
