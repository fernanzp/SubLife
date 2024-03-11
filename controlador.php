<?php

include('conection.php');

$error_message = trim($error_message);

if (!empty($_POST['btnIngresar'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = $conexion->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

	if ($datos = $sql->fetch_object())
	{
		header("Location: index.html");
		exit();
	} else 
	{
		$error_message = "Usuario o contraseña inválidos. Inténtalo de nuevo.";
	}
}

include('login_register.html');
exit();
?>