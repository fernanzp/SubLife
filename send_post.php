<?php
session_start();

include('conection.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_SESSION['user_data']['id'];

    //Imagen
    //$img = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    // Consulta para insertar en la base de datos
    $query = "INSERT INTO posts (id, title, body, created_at, status, user_id) 
              VALUES (NULL, '$title', '$body', NOW(), 1, '$user_id')";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al realizar la nueva publicación: " . $conexion->error;
        // Mostrar información sobre los permisos del usuario
        echo "Permisos del usuario: " . $conexion->get_server_info();
        echo "Mensaje de error de MySQL: " . $conexion->error;
    }
    // Cerrar la conexión
    $conexion->close();
}
?>