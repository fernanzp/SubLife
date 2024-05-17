<?php
include('conection.php');

// Verificar si se recibió el ID del post por GET y es un número válido
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $postId = $_GET['id'];

    // Consulta para obtener los datos del post
    $query = "SELECT id, title, body, status, created_at FROM posts WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $postId = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        $status = $post['status'];
        $created_at = $post['created_at'];
    } else {
        echo "Post no encontrado.";
    }

    $stmt->close();
}

$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife - Editar Post</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" type="text/css" href="style_edit_post.css">
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="">
            <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbar-options">
            <a href="admin_posts.php">Publicaciones</a>
        </div>
    </header>

    <!--Editar post-->
    <div class="edit_post">
        <h2>Editar Post</h2> 
        <form action="update_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br>

            <label for="body">Contenido:</label>
            <textarea id="body" name="body" rows="5" required><?php echo htmlspecialchars($body); ?></textarea><br>

            <label for="created_at">Fecha de Creación:</label>
            <input type="date" id="created_at" name="created_at" value="<?php echo htmlspecialchars($created_at); ?>"><br>

            <label for="status">Estado:</label>
            <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($status); ?>"><br>

            <!-- Aquí puedes agregar la parte para editar la imagen si lo necesitas -->

            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
