<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <link rel="stylesheet" href="../resources/css/main.css">
    <link rel="stylesheet" href="../resources/css/principal.css">
    <title>SHAREBITES</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col principal_container">
                <h1 class="title">SHARE<span class="amarillo">BITES</span></h1>
                <img src="../resources/img/icon_white.svg" alt="Logo" class="logo" draggable="false">
                <div class="button_container">
                    <a href="{{ route('log_in_pages.log_in') }}">
                        <button class="btn_principal_yellow" href="{{ route('log_in_pages.log_in') }}">
                            LOG-IN</button>
                    </a>

                    <a href="{{ route('log_in_pages.register') }}">
                        <button class="btn_secondary" href="{{ route('log_in_pages.register') }}">
                            REGISTER</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
