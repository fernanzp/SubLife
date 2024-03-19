<?php

session_start();

include('conection.php');

$error_message = trim($error_message);

if (!empty($_POST['btnIngresar'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = $conexion->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

	if ($datos = $sql->fetch_object())
	{
		$session_array = array('id' => $datos->id, 'username' => $datos->username, 'role' => $datos->role);
		$_SESSION['user_data'] = $session_array;

		// Verify session variable
    	//echo "Username in session: " . $_SESSION['user_data']['id'];


		header("Location: index.php");
		//exit();
	} else 
	{
		$error_message = "Usuario o contraseña inválidos. Inténtalo de nuevo.";
	}
}

include('login_register.html');
exit();
?>