<?php
	// Datos para la conexión con la base de datos
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "SubLife";

    $conexion = new mysqli($servername, $username_db, $password_db, $dbname);
    $conexion->set_charset("utf8");
?>
