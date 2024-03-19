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

    // Verificar si se ha subido la imagen correctamente
    /*if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "Error al subir la imagen: ";
        switch ($_FILES['image']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "El archivo subido excede la directiva upload_max_filesize en php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "El archivo subido fue solo parcialmente cargado";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No se subió ningún archivo";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Falta la carpeta temporal";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Error al escribir el archivo en disco";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "Una extensión de PHP detuvo la subida de archivos";
                break;
            default:
                echo "Error desconocido al subir el archivo";
                break;
        }
        exit();
    }*/

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