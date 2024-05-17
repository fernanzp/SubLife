<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="jquery.ripples-min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="">
                <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <input type="checkbox" id="check">
        <label for="check" class="navbar-bars">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" fill="#ffffff"/></svg>
        </label>
        <div class="navbar-options-socialmedia-container">
            <!--Sección del lado izquierdo de la barra de navegación-->
            <div class="navbar-options-side">
                <nav class="navbar-options">
                    <a id="go-to-news">Noticias</a>
                    <a id="go-to-mzo">Manzanillo</a>
                    <?php
                        if(isset($_SESSION['user_data']['role']) && $_SESSION['user_data']['role'] == 1) {
                            echo '<a href="newpost.php">Nueva Publicación</a>';
                        }
                        if(isset($_SESSION['user_data']['role']) && $_SESSION['user_data']['role'] == 2) {
                            echo '<a href="admin.php">Administrador</a>';
                        }
                        if(!empty($_SESSION['user_data']['id'])) {
                            echo '<a href="logout.php">Cerrar Sesión</a>';
                        } else {
                            echo '<a href="login_register.php">Iniciar Sesión</a>';
                        }
                    ?>
                </nav>
            </div>
            <!--Sección del lado derecho de la barra de navegación-->
            <div class="navbar-socialmedia-side">
                <ul class="navbar-socialmedia">
                    <li class="navbar-socialmedia-item">
                        <a class="navbar-socialmedia-item-link" href="https://www.facebook.com/profile.php?id=61556395959661" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" fill="#ffffff"/>
                            </svg>
                        </a>
                    </li>
                    <li class="navbar-socialmedia-item">
                        <a class="navbar-socialmedia-item-link" href="https://www.instagram.com/sublife.ucol/" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" fill="#ffffff"/>
                            </svg>
                        </a>
                    </li>
                    <li class="navbar-socialmedia-item">
                        <a class="navbar-socialmedia-item-link" href="https://twitter.com/uSubLife" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="social-media-icon" viewBox="0 0 512 512">
                                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" fill="#ffffff"/>
                            </svg>
                        </a>
                    </li>
                    <li class="navbar-socialmedia-item">
                        <a class="navbar-socialmedia-item-link" href="" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#ffffff" d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!--Inicio-->
    <div class="main">
        <div class="main-video-container">
            <video autoplay muted loop class="main-video">
                <source src="video/video.mp4" type="video/mp4">
            </video>
        </div>
        <h1 class="main-title">SubLife</h1>
        <div class="main-downarrow-container">
            <div class="main-downarrow"></div>
        </div>
    </div>

    <!--Main News-->
    <div class="mainnews-container" id="mainnews-container">
        <div class="mainnews">
            <h2 class="mainnews-title">Minería submarina, el nuevo riesgo para la vida submarina</h2>
            <p>03/05/2024</p>
            <a href="" class="mainnews-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                <path fill="#071441" d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
                </svg>Leer aquí</a>
        </div>
    </div>

    <!--News-->
    <div class="news-container" id="news-container">
        <div class="news-newscontainer new1 n1">
            <a href="#" class="news-newcontent">
                <h3>Un paso crucial para la salud del mar: Perú aprueba la creación de la Reserva Nacional Mar Tropical de Grau</h3>
                <p>29/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new2 n2">
            <a href="#" class="news-newcontent">
                <h3>El Cambio Climático Podría Causar Olas de Frío Severas en los Mares</h3>
                <p>15/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new1 n3">
            <a href="#" class="news-newcontent">
                <h3>Upcycling the Oceans Implementa Tecnología de Satlink para Proteger Áreas Marinas</h3>
                <p>03/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new2 n4">
            <a href="#" class="news-newcontent">
                <h3>El Pez Vela</h3>
                <p>10/03/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new1 n5">
            <a href="#" class="news-newcontent">
                <h3>La Ballena Azul</h3>
                <p>6/03/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new2 n6">
            <a href="#" class="news-newcontent">
                <h3>Nuevo acuerdo mundial impulsa la protección de los mares</h3>
                <p>2/03/2024</p>
            </a>
        </div>
    </div>

    <!--Manzanillo News-->
    <div class="news-container mzo-container" id="mzo">
        <h2>Manzanillo</h2>
        <div class="news-newscontainer new1">
            <a href="#" class="news-newcontent">
                <h3>Nuevo acuerdo mundial impulsa la protección de los mares</h3>
                <p>20/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new2">
            <a href="#" class="news-newcontent">
                <h3>Title</h3>
                <p>20/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new1">
            <a href="#" class="news-newcontent">
                <h3>Title</h3>
                <p>20/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new2">
            <a href="#" class="news-newcontent">
                <h3>Title</h3>
                <p>20/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new1">
            <a href="#" class="news-newcontent">
                <h3>Title</h3>
                <p>20/04/2024</p>
            </a>
        </div>
        <div class="news-newscontainer new2">
            <a href="#" class="news-newcontent">
                <h3>Title</h3>
                <p>20/04/2024</p>
            </a>
        </div>
    </div>

    <!--Footer-->
    <footer class="footer">
        <a href="">
            <img class="footer-logo" src="img/sublife_logo.png">
        </a>
        <div class="footer-socialmedia-container">
            <ul class="footer-socialmedia">
                <li class="footer-socialmedia-item">
                    <a class="footer-socialmedia-item-link" href="https://www.facebook.com/profile.php?id=61556395959661" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" fill="#ffffff"/>
                        </svg>
                    </a>
                </li>
                <li class="footer-socialmedia-item">
                    <a class="footer-socialmedia-item-link" href="https://www.instagram.com/sublife.ucol/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" fill="#ffffff"/>
                        </svg>
                    </a>
                </li>
                <li class="footer-socialmedia-item">
                    <a class="footer-socialmedia-item-link" href="https://twitter.com/uSubLife" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="social-media-icon" viewBox="0 0 512 512">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" fill="#ffffff"/>
                        </svg>
                    </a>
                </li>
                <li class="footer-socialmedia-item">
                    <a class="footer-socialmedia-item-link" href="" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="#ffffff" d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>


<!--Animación ondas de agua-->
<script>
    $(document).ready(function(){
        $('#navbar').ripples({
            resolution: 1024, // Cambia la resolución del efecto
            dropRadius: 10,  // Cambia el tamaño de las gotas de agua
            perturbance: 0.5 // Cambia la perturbación del agua
            // Puedes agregar más opciones según tus necesidades
        });
        $('#news-container').ripples({
            resolution: 1024, // Cambia la resolución del efecto
            dropRadius: 15,  // Cambia el tamaño de las gotas de agua
            perturbance: 0.5 // Cambia la perturbación del agua
            // Puedes agregar más opciones según tus necesidades
        });
        $('#mzo').ripples({
            resolution: 1024, // Cambia la resolución del efecto
            dropRadius: 15,  // Cambia el tamaño de las gotas de agua
            perturbance: 0.5 // Cambia la perturbación del agua
            // Puedes agregar más opciones según tus necesidades
        });
    });
</script>

<!--<dotlottie-player class="dotlottie-fish" src="https://lottie.host/fb44bb21-fcb5-4aad-ad40-37847598f1ab/wdcNnb8zHm.json" background="transparent" speed="1" style="width: 300px; height: 300px" loop hover></dotlottie-player>-->