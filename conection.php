<?php
	// Datos para la conexión con la base de datos
    $servername = "localhost";
    $username_db = "fernando";
    $password_db = "fernanpech2306";
    $dbname = "sublife";

    $conexion = new mysqli($servername, $username_db, $password_db, $dbname);
    $conexion->set_charset("utf8");
?>