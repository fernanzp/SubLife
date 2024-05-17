<?php
include('conection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $status = $_POST['status'];
    $created_at = $_POST['created_at'];

    // Consulta para actualizar los datos del post
    $query = "UPDATE posts SET title = ?, body = ?, status = ?, created_at = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssssi", $title, $body, $status, $created_at, $postId);
    
    if ($stmt->execute()) {
        // Redirigir a la página admin_posts.php después de actualizar los datos
        header("Location: admin_posts.php");
        exit(); // Asegurar que el script se detenga después de la redirección
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No se recibieron datos válidos para actualizar.";
}

$conexion->close();
?>

