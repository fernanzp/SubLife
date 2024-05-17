<?php
include('conection.php');

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $postId = $_GET['id'];

    $query = "DELETE FROM posts WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $postId);
    if (!$stmt->execute()) {
        die("Error al eliminar el post: " . $stmt->error);
    }
    $stmt->close();
}

$conexion->close();
?>
