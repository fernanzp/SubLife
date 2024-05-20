<?php
include('conection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT id, title, body, img, created_at FROM posts WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Publicación no encontrada.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}

// Consulta para obtener las dos noticias más recientes con status = 1 y category = 0, excluyendo la noticia actual
$more_posts_query = "SELECT title, img FROM posts WHERE status = 1 AND category = 0 AND id != ? ORDER BY id DESC LIMIT 2";
$stmt_more_posts = $conexion->prepare($more_posts_query);
$stmt_more_posts->bind_param("i", $id);
$stmt_more_posts->execute();
$more_posts_result = $stmt_more_posts->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $row['title']; ?> - SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" type="text/css" href="style_news.css">
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

    <!--Noticia-->
    <div class="main-container">
        <div class="post-container">
            <h2><?php echo $row['title']; ?></h2>
            <p class="post-date"><?php echo $row['created_at']; ?></p>
            <p class="post-body"><?php echo nl2br($row['body']); ?></p><br>
            <?php if ($row['img']) { ?>
                <img src='data:image/jpeg;base64,<?php echo base64_encode($row['img']); ?>'/>
            <?php } ?>
        </div>
        <div class="moreposts-container">
            <h3>Más noticias</h3> 
            <?php if ($more_posts_result->num_rows > 0) { ?>
                <?php while($more_post = $more_posts_result->fetch_assoc()) { ?>
                    <div class="otherpost">
                        <?php if ($more_post['img']) { ?>
                            <img src='data:image/jpeg;base64,<?php echo base64_encode($more_post['img']); ?>'/>
                        <?php } ?>
                        <h4><?php echo $more_post['title']; ?></h4>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No hay más noticias disponibles.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php
$conexion->close();
?>