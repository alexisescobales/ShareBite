<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_pages/layout_login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_pages/selection.css') }}">
    <script src="https://kit.fontawesome.com/6645ba3d64.js" crossorigin="anonymous"></script>
    <title>aaaaa</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />

</head>

<body>
    <div class="row login-container">
        <div class="col-5 d-flex left-column">
            @yield('leftColumn')
        </div>
        <div class="divider"></div>
        <div class="col right-column">
            <h1 class="title">SHARE<span class="amarillo">BITES</span></h1>
            <img src="../resources/img/icon_white.svg" alt="Logo" class="logo" draggable="false">
        </div>
    </div>
</body>

</html>
