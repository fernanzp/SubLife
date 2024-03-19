<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="jquery.ripples-min.js"></script>
</head>
<body>
  <div class="preloader">
        <h1 id="preloader-text"></h1>
      </div>
      <div id="content" style="opacity: 0;">
    <header class="container_head" id="container_head">
        <div class="head">
            <div class="logo">
                <a href="">
                    <img class="img_logo" src="img/sublife_logo.png">
                </a>
            </div>
            <nav class="navbar">
                <a href="">Noticias</a>
                <a href="">Manzanillo</a>
                <?php
                if(isset($_SESSION['user_data']['role']) && $_SESSION['user_data']['role'] == 1) {
                    echo '<a href="post.html">Administrador</a>';
                }
                if(!empty($_SESSION['user_data']['id'])) {
                    echo '<a href="logout.php">Cerrar Sesión</a>';
                } else {
                    echo '<a href="login_register.html">Iniciar Sesión</a>';
                }
                ?>
            </nav>
        </div>
        <div class="social_media_head">
            <ul class="social_media">
                <li class="menu_options_item">
                    <a class="link_social_media" href="https://www.facebook.com/profile.php?id=61556395959661" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                             <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#ffffff" transform="scale(1.2)"></path>
                        </svg>
                    </a>
                </li>
                <li class="menu_options_item">
                    <a class="link_social_media" href="https://www.instagram.com/sublife.ucol/" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                             <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913a5.885 5.885 0 001.384 2.126A5.868 5.868 0 004.14 23.37c.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558a5.898 5.898 0 002.126-1.384 5.86 5.86 0 001.384-2.126c.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913a5.89 5.89 0 00-1.384-2.126A5.847 5.847 0 0019.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227a3.81 3.81 0 01-.899 1.382 3.744 3.744 0 01-1.38.896c-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421a3.716 3.716 0 01-1.379-.899 3.644 3.644 0 01-.9-1.38c-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678a6.162 6.162 0 100 12.324 6.162 6.162 0 100-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 01-2.88 0 1.44 1.44 0 012.88 0z" fill="#ffffff" transform="scale(1.2)"></path>
                        </svg>
                    </a>
                </li>
                <li class="menu_options_item">
                    <a class="link_social_media" href="https://twitter.com/uSubLife" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" class="social-media-icon" viewBox="0 0 512 512">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" fill="#ffffff"/>
                        </svg>
                    </a>
                </li>
                <li class="menu_options_item">
                    <a class="link_social_media" href="" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="#ffffff" d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <div class="content header">
        <video autoplay muted loop id="headerVideo">
            <source src="video/video.mp4" type="video/mp4">
        </video>
        <h2 class="main_title">SubLife</h2>
    </div>

    <div class="content sau">
        <div class="down-arrow-container">
            <div id="down-arrow"></div> <!--Boton para scrollear a noticias-->
        </div>
        <div class="banner_main_news" id="main_news">
            <div class="banner_main_news_title">Nuevo acuerdo mundial impulsa la protección de los mares</div>
            <a href="" class="btn">
                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                    <path fill="#071441" d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
                </svg>Leer aquí</a>
        </div>
        <div class="news-container" id="news-container">

            <div class="new-container new1">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new2">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new1">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new2">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new1">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new2">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new1">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>

            <div class="new-container new2">
                <a href="#">
                    <div class="new-content">
                        <h3>Title</h3>
                        <p>20/04/2024</p>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <!--<section class="content about">

        <h2 class="title">Nosotros</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores totam officiis est quas corporis,
            quisquam at sapiente? Culpa dolore dolorem animi voluptates,
            ratione alias dignissimos enim eligendi reiciendis illo nesciunt.
        </p>

        <a href="" class="btn">saber mas</a>

    </section>-->

    <section class="content price">

        <article class="contain">
            <h2 class="title">precio</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores totam officiis est quas corporis,
                quisquam at sapiente? Culpa dolore dolorem animi voluptates,
                ratione alias dignissimos enim eligendi reiciendis illo nesciunt.
            </p>
        </article>
    </section>

    <section class="content contact" id="footer">
        <figure class="map">
            <img src="img/sublife_logo.png" height="120px" width="100%" alt="mapa">
        </figure>
        <div class="social_media_footer">
            <ul class="social_media">
                <li class="menu_options_item">
                    <a class="link_social_media" href="https://www.facebook.com/profile.php?id=61556395959661" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                             <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#ffffff" transform="scale(1.2)"></path>
                        </svg>
                    </a>
                </li>
                <li class="menu_options_item">
                    <a class="link_social_media" href="https://www.instagram.com/sublife.ucol/" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                             <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913a5.885 5.885 0 001.384 2.126A5.868 5.868 0 004.14 23.37c.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558a5.898 5.898 0 002.126-1.384 5.86 5.86 0 001.384-2.126c.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913a5.89 5.89 0 00-1.384-2.126A5.847 5.847 0 0019.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227a3.81 3.81 0 01-.899 1.382 3.744 3.744 0 01-1.38.896c-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421a3.716 3.716 0 01-1.379-.899 3.644 3.644 0 01-.9-1.38c-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678a6.162 6.162 0 100 12.324 6.162 6.162 0 100-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 01-2.88 0 1.44 1.44 0 012.88 0z" fill="#ffffff" transform="scale(1.2)"></path>
                        </svg>
                    </a>
                </li>
                <li class="menu_options_item">
                    <a class="link_social_media" href="https://twitter.com/uSubLife" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" class="social-media-icon" viewBox="0 0 512 512">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" fill="#ffffff"/>
                        </svg>
                    </a>
                </li>
                <li class="menu_options_item">
                    <a class="link_social_media" href="" target="_blank">
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="#ffffff" d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('#container_head').ripples({
                resolution: 1024, // Cambia la resolución del efecto
                dropRadius: 10,  // Cambia el tamaño de las gotas de agua
                perturbance: 0.5 // Cambia la perturbación del agua
                // Puedes agregar más opciones según tus necesidades
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#news-container').ripples({
                resolution: 1024, // Cambia la resolución del efecto
                dropRadius: 15,  // Cambia el tamaño de las gotas de agua
                perturbance: 0.5 // Cambia la perturbación del agua
                // Puedes agregar más opciones según tus necesidades
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#footer').ripples({
                resolution: 1024, // Cambia la resolución del efecto
                dropRadius: 10,  // Cambia el tamaño de las gotas de agua
                perturbance: 0.5 // Cambia la perturbación del agua
                // Puedes agregar más opciones según tus necesidades
            });
        });
    </script>
</body>
</html>