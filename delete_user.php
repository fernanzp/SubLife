<?php
include('conection.php');

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $userId = $_GET['id'];

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $userId);
    if (!$stmt->execute()) {
        die("Error al eliminar el usuario: " . $stmt->error);
    }
    $stmt->execute();

    $stmt->close();
    $conexion->close();
}
?>