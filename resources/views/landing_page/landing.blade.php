<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing_page/landing.css') }}">
    <script src="https://kit.fontawesome.com/6645ba3d64.js" crossorigin="anonymous"></script>
    <title>SHAREBITES</title>
</head>

<body>
    <div class="landing-container">
        <div class="landing-main-container">
            <nav id="navbar-landing" class="navbar navbar-expand-xl navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand navbar-title" href="#">SHARE<span class="amarillo">BITES</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-landing-list" aria-controls="navbar-landing-list" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-landing-list">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item navbar-landing-list-item">
                                <a class="nav-link" href="#1">HISTORIA</a>
                            </li>
                            <li class="nav-item navbar-landing-list-item">
                                <a class="nav-link" href="#2">CÓMO FUNCIONA</a>
                            </li>
                            <li class="nav-item navbar-landing-list-item">
                                <a class="nav-link" href="#3">QUIENES SOMOS</a>
                            </li>
                            <li class="nav-item navbar-landing-list-item navbar-landing-list-item-comenzar">
                                <a class="nav-link" href="{{ route('principal') }}">COMENZAR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-landing-main">
                <div class="container-landing-main-izq">
                    <h1>AYUDAR NUNCA HABÍA SIDO TAN FÁCIL</h1>
                    <p>Desde Share<span class="amarillo">Bites</span> damos una solución para todos aquellos que tiran
                        comida</p>
                </div>
                <div class="container-landing-main-der">
                    <img src="{{ asset('img/icon_white.svg') }}" alt="">
                </div>
            </div>
        </div>

        <div id="1" class="container-landing-page page1">
            <div class="title">
                <h1>HISTORIA</h1>
            </div>
            <img src="{{ asset('img/bolsa.png') }}" alt="" draggable="false">
            <div class="content">
                <p>En ShareBites, nuestra historia comienza con el deseo de marcar una diferencia significativa en las
                    vidas de aquellos que luchan por satisfacer una necesidad básica: alimentarse. Inspirados por la
                    solidaridad y el compromiso con el medio ambiente, nos propusimos crear una plataforma que no solo
                    brinde alimentos a quienes lo necesitan, sino que también reduzca el desperdicio de comida. Desde
                    nuestros humildes comienzos hasta hoy, hemos crecido gracias al apoyo y la generosidad de nuestra
                    comunidad, formada por Riders y Proveedores.</p>
            </div>
        </div>

        <div id="2" class="container-landing-page page2">
            <div class="title">
                <h1>COMO FUNCIONA</h1>
            </div>
            <div class="container content content-row">
                <div class="col">
                    <div class="content-row-text">
                        <h4>Proveedores</h4>
                        <img src="{{ asset('img/proveedor.jpg') }}" alt="" draggable="false">
                        <p>Los proveedores son socios como mercados, restaurantes y bares, donando alimentos excedentes
                            para reducir el desperdicio y apoyar la misión solidaria de la organización mediante
                            relaciones de colaboración sostenibles.</p>
                    </div>
                </div>
                <div class="col">
                    <h4>Riders</h4>
                    <img src="{{ asset('img/rider.jpg') }}" alt="" draggable="false">
                    <div class="content-row-text">
                        <p>Los riders solidarios, como voluntarios, se encargan de transportar los alimentos
                            recolectados desde los proveedores hasta los destinatarios, garantizando una distribución
                            segura y puntual mediante el uso de medios de transporte sostenibles.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="content-row-text">
                        <h4>Personas Necesitadas</h4>
                        <img src="{{ asset('img/homeless.jpg') }}" alt="" draggable="false">
                        <p>Las personas necesitadas son los receptores de los alimentos distribuidos por la organización
                            solidaria, utilizando estos alimentos para cubrir sus necesidades nutricionales básicas. La
                            colaboración con refugios u otras entidades facilita una distribución efectiva de los
                            alimentos recolectados.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="3" class="container-landing-page page3">
            <div class="title">
                <h1>QUIENES SOMOS</h1>
            </div>
            <div class="content">
                <div class="carousel-content">
                    <div id="carouselProfiles" class="carousel carousel-dark slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselProfiles" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselProfiles" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselProfiles" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselProfiles" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-item-content">
                                    <img src="{{ asset('img/foto_mario.png') }}" alt="...">
                                    <div class="profiles-content">
                                        <h4>Mario</h4>
                                        <p>Hola, soy Mario. Siempre estoy lleno de ideas frescas y creativas. Me encanta
                                            pensar fuera de lo común y proponer soluciones innovadoras para los desafíos
                                            del proyecto. Constantemente estoy buscando nuevas tecnologías y enfoques
                                            que puedan mejorar nuestro producto. A veces mis ideas pueden parecer un
                                            poco locas, ¡pero siempre estoy emocionado de explorar nuevas posibilidades
                                            y llevar nuestro proyecto al siguiente nivel!</p>
                                        <a href="https://github.com/Mario23leiva" target="_blank"><i
                                                class="fa-brands fa-square-github"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-item-content">
                                    <img src="{{ asset('img/alexis.png') }}" alt="...">
                                    <div class="profiles-content">
                                        <h4>Alexis</h4>
                                        <p>Hola, soy Alexis. No solo me encanta programar, sino que también disfruto de
                                            interactuar con las personas. Soy el encargado de mantener una comunicación
                                            fluida dentro del equipo y con los demás departamentos. Me aseguro de que
                                            todos estén en la misma página y de que las ideas se compartan de manera
                                            efectiva. Además, soy el enlace entre nuestro equipo técnico y el resto de
                                            la empresa, asegurándome de que nuestro trabajo contribuya al éxito general
                                            del proyecto.</p>
                                        <a href="https://github.com/alexisescobales" target="_blank"><i
                                                class="fa-brands fa-square-github"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-item-content">
                                    <img src="{{ asset('img/alex.jpg') }}" alt="...">
                                    <div class="profiles-content">
                                        <h4>Alex</h4>
                                        <p>Hola, soy Alex. Mi pasión es la tecnología y tengo un profundo conocimiento
                                            técnico en varias áreas. Desde lenguajes de programación hasta las últimas
                                            tendencias en desarrollo, estoy siempre al tanto de todo. Me gusta aplicar
                                            mis habilidades técnicas para resolver problemas complejos y encontrar
                                            soluciones eficientes para nuestro proyecto. Pueden contar conmigo para
                                            estar al tanto de las últimas herramientas y técnicas que nos ayuden a
                                            alcanzar nuestros objetivos.</p>
                                        <a href="https://github.com/aalbala17" target="_blank"><i
                                                class="fa-brands fa-square-github"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-item-content">
                                    <img src="{{ asset('img/rachid.jpg') }}" alt="...">
                                    <div class="profiles-content">
                                        <h4>Rachid</h4>
                                        <p>Hola, soy Rachid. Mi habilidad principal es resolver problemas. Cuando nos
                                            enfrentamos a un desafío técnico, me pongo manos a la obra para encontrar la
                                            mejor solución posible. Me encanta analizar cada problema desde diferentes
                                            ángulos y trabajar en equipo para encontrar la mejor manera de abordarlo. Mi
                                            enfoque es pragmático y eficiente, y siempre estoy listo para enfrentar
                                            cualquier obstáculo que se presente en nuestro camino hacia el éxito del
                                            proyecto.</p>
                                        <a href="https://github.com/rachidjkl" target="_blank"><i
                                                class="fa-brands fa-square-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProfiles"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselProfiles"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer-landing-page">
            <p>Copyright © 2022 ShareBites. Todos los derechos reservados.</p>
            <p>Diseñado por: Team 2</p>
            <p>Desarrollado por: Team 2</p>
            <p>Coordinador de Proyectos: Team 2</p>
            <p>Coordinador de Diseño: Team 2</p>
            <p>Coordinador de Soporte: Team 2</p>
        </footer>
    </div>


</body>

</html>
