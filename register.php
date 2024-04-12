<?php 
    include('conection.php');

    $register_error_message = trim($register_error_message);

    //Varificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	//Recoger datos del formulario
    	$email = $_POST['email'];
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$confirm_password = $_POST['confirm_password'];

    	if ($password != $confirm_password) {
    		$register_error_message = "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
    	} else {
    		//Consulta para insertar un nuevo usuario en la tabla "users"
    		$query = "INSERT INTO users (id, username, email, password, status) VALUES (NULL, '$username', '$email', '$password', 1)";

    		//Ejecutar la consulta
    		if ($conexion->query($query) === TRUE) {
    			header("Location: index.php");
    			exit();
    		} else {
    			$register_error_message = "Error al crear el usuario. Por favor, inténtelo más tarde.";
    		}
    		//Cerrar la conexión
    		$conexion->close();
    	}
    }/* else {
    	$error_message = "Hubo un error inesperado. Por favor inténtelo más tarde.";
    }*/
?>