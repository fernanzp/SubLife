<?php
include('conection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Consulta para actualizar los datos del usuario
    $query = "UPDATE users SET username = ?, email = ?, role = ?, status = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssiii", $username, $email, $role, $status, $userId);
    
    if ($stmt->execute()) {
        // Redirigir a la página admin.php después de actualizar los datos
        header("Location: admin.php");
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