<?php
	
	session_start();

	include('conection.php');

	$login_error_message = trim($login_error_message);

	if (!empty($_POST['btnIngresar'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = $conexion->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

		if ($datos = $sql->fetch_object()) {
			$session_array = array('id' => $datos->id, 'username' => $datos->username, 'role' => $datos->role);
			$_SESSION['user_data'] = $session_array;

			header("Location: index.php");
		} else{
			$login_error_message = "Usuario o contraseña inválidos. Inténtalo de nuevo.";
		}
	}

	exit();
?>