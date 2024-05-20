<?php
include('conection.php');

// Consulta para obtener las 3 publicaciones más recientes con status = 1, ordenadas por id de manera descendente
$sql = "SELECT id, title, created_at, img, category FROM posts WHERE status = 1 ORDER BY id DESC LIMIT 3";
$carousel_result = $conexion->query($sql);

// Consulta para obtener todas las publicaciones con status = 1, ordenadas por id de manera descendente
$sql_all = "SELECT id, title, created_at, img, category FROM posts WHERE status = 1 ORDER BY id DESC";
$result = $conexion->query($sql_all);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" href="style_news_panel.css">
</head>
<body>
	<!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="index.php">
            <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbar-options">
            <a href="index.php">Blog</a>
        </div>
    </header>

	<!--Carrusel de noticias-->
	<div class="post-slider-maincontainer">
	    <h2>Noticias recientes</h2>
	    <div class="post-slider-container">
	        <!--Left
	        <svg class="prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
	            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" fill="#ffffff"/>
	        </svg>-->

            <div class="posts-slider">
                <?php
                if ($carousel_result->num_rows > 0) {
                    while ($row = $carousel_result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $created_at = $row['created_at'];
                        $img_base64 = base64_encode($row['img']);
                        echo "
                        <div class=\"post-slider\">
                            <a href=\"news.php?id=$id\">
                                <img src=\"data:image/jpeg;base64,$img_base64\" alt=\"$title\" class=\"slider-image\">
                                <div class=\"post-info\">
                                    <h4>$title</h4>
                                    <p>$created_at</p>
                                </div>
                            </a>
                        </div>
                        ";
                    }
                } else {
                    echo "<p>No hay noticias recientes disponibles.</p>";
                }
                ?>
            </div>

	        <!--Right
	        <svg class="next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
	            <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" fill="#ffffff"/>
	        </svg>-->
	    </div>
	</div>

<!--Publicaciones-->
<div class="posts-container">
    <h2>Noticias</h2>

    <div class="posts_categories-container">
        <div id="posts" class="posts">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];
                $created_at = $row['created_at'];
                $img_base64 = base64_encode($row['img']);
                $category = $row['category'];
                echo "
                <div class=\"post $category\">
                    <a href=\"news.php?id=$id\">
                        <img src=\"data:image/jpeg;base64,$img_base64\" alt=\"$title\">
                        <div class=\"post-content\">
                            <h3>$title</h3>
                            <p>$created_at</p>
                        </div>
                    </a>
                </div>
                ";
            }
        } else {
            echo "<p>No hay publicaciones disponibles.</p>";
        }
        ?>
    </div>

    <!-- Categorías -->
    <div class="categories-container">
        <h3>Categorías</h3>
        <button onclick="filterNews(0)">Global</button>
        <button class="categories-mzo" onclick="filterNews(1)">Manzanillo</button>
    </div>
    </div>
</div>
    <?php $conexion->close(); ?>

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

<!-- Script para filtrar noticias por categoría -->
<script>
    function filterNews(category) {
        var posts = document.getElementById('posts').children;
        for (var i = 0; i < posts.length; i++) {
            if (category == 0 && posts[i].classList.contains('0')) {
                posts[i].style.display = 'block';
            } else if (category == 1 && posts[i].classList.contains('1')) {
                posts[i].style.display = 'block';
            } else {
                posts[i].style.display = 'none';
            }
        }
    }
</script>