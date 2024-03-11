<?php
include('conection.php');

$different_passwords_message = trim($different_passwords_message);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        $different_passwords_message = "Las contraseñas no coinciden. Inténtalo de nuevo.";
        include('login_register.html');
    } else {
        /* Encriptar la contraseña antes de almacenarla en la base de datos (puedes usar otras técnicas de encriptación más seguras)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);*/

        // Consulta para insertar un nuevo usuario en la tabla "users"
        $query = "INSERT INTO users (id, username, email, password, status) VALUES (NULL, '$username', '$email', '$password', 1)";

        // Ejecutar la consulta
        if ($conexion->query($query) === TRUE) {
            header("Location: index.html");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $conexion->error;
        }
        // Cerrar la conexión
        $conexion->close();
    }
}
?>