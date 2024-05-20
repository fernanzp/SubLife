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
            <a href="admin_posts.php">Publicaciones</a>
            <?php
                echo '<a href="edit_post.php?id=' . $row["id"] . '">Editar</a>';
            ?>
        </div>
    </header>

    <!--Noticia-->
    <div class="main-container main-container-admin">
        <div class="post-container post-container-admin">
            <h2><?php echo $row['title']; ?></h2>
            <p class="post-date"><?php echo $row['created_at']; ?></p>
            <p class="post-body"><?php echo nl2br($row['body']); ?></p><br>
            <?php if ($row['img']) { ?>
                <img src='data:image/jpeg;base64,<?php echo base64_encode($row['img']); ?>'/>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php
$conexion->close();
?>