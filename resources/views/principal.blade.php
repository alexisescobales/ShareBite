<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../resources/css/principal.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHAREBITES</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1 class="title">SHARE<span class="amarillo">BITES</span></h1>
        <img src="../resources/img/icon_white.svg" alt="Logo" class="logo">
    </div>

    <div class="button_container">
        <a href="{{ route('log-in') }}">
        <button class="login_btn">LOG-IN</button>
        </a> 

        <a href="{{ route('register') }}">
        <button class="register_btn">REGISTER</button>
        </a> 
    </div>
</body>
</html>
