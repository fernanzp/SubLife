<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Recoger los datos del formulario
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Verificar que las contraseñas coincidan
  if ($password == $confirm_password) {

    // Hashear la contraseña
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);*/

    // Conectar a la base de datos
    $servername = "localhost";
    $username_db = "fernando";
    $password_db = "fernanpech2306";
    $dbname = "sublife";

    $connection = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verificar la conexión
    if ($connection->connect_error) {
      die("Error de conexión: " . $connection->connect_error);
    } else {
      echo "Conexión exitosa"; // Mensaje de debug
    }

    try {
      // Consulta para insertar datos en la tabla users
      $sql = "INSERT INTO users (id, username, email, password) VALUES (NULL, '$username', '$email', '$password')";

      // Ejecutar la consulta
      $connection->query($sql);

      // Mostrar mensaje de éxito
      echo "Registro exitoso";
    } catch (mysqli_sql_exception $e) {
      // Mostrar mensaje de error
      echo "Error en la consulta: " . $e->getMessage();
    }

    // Cerrar la conexión
    $connection->close();

  } else {
    echo "La contraseña no coincide";
  }
} else {
  echo "No se recibió el formulario correctamente"; // Mensaje de debug
}

/*
	// Verificar si se ha enviado el formulario
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// Recoger los datos del formulario
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		// Verificar que las contraseñas coincidan
		if ($password == $confirm_password) {
			// Hashear la contraseña
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			// Conectar a la base de datos
			$servername = "localhost";
			$username_db = "fernando";
			$password_db = "fernanpech2306";
			$dbname = "sublife";

			$connection = new mysqli($servername, $username_db, $password_db, $dbname);

			// Verificar la conexión
			if ($connection->connect_error) {
				die("Error de conexión: " . $connection->connect_error);
			} else {
				echo "Conexión exitosa"; // Mensaje de debug
			}

			// Consulta para insertar datos en la tabla users
			$sql = "INSERT INTO users (id, username, email, password) VALUES (NULL, '$username', '$email', '$hashed_password')";

			if ($connection->query($sql) == TRUE) {
				echo "Registro exitoso";
			} else {
				echo "Error en la consulta: " . $connection->error;
			}

			// Cerrar la conexión
			$connection->close();
		} else {
			echo "La contraseña no coincide";
		}
	} else {
		echo "No se recibió el formulario correctamente"; // Mensaje de debug
	}*/
?>
