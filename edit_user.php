<?php
    include('conection.php');

    // Verificar si se recibió el ID del usuario por GET y es un número válido
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $userId = $_GET['id'];

        // Consulta para obtener los datos del usuario
        $query = "SELECT id, username, email, role, status FROM users WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $userId = $user['id'];
            $username = $user['username'];
            $email = $user['email'];
            $role = $user['role'];
            $status = $user['status'];
        } else {
            echo "Usuario no encontrado.";
        }

        $stmt->close();
    }

    $conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" type="text/css" href="style_edit_user.css">
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="">
            <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbar-options">
            <a href="admin.php">Usuarios</a>
        </div>
    </header>

    <!--Editar usuario-->
    <div class="edituser">
        <h2>Editar Usuario</h2> 
        <form action="update_user.php" method="POST">
            <!--<input type="text" name="user_id" value="<?php /*echo $userId; */?>">-->
            <div class="edituser-inputcontainer">
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
                <label class="lbl">
                    <span class="text-span">Usuario</span>
                </label>
            </div>

            <div class="edituser-inputcontainer">
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                <label class="lbl">
                    <span class="text-span">Correo</span>
                </label>
            </div>

            <div class="edituser-inputcontainer-role">
                <label for="role">Rol</label>
                <select id="role" name="role" required>
                    <option value="2" <?php echo ($role == 2) ? 'selected' : ''; ?>>Administrador</option>
                    <option value="1" <?php echo ($role == 1) ? 'selected' : ''; ?>>Bloguero</option>
                    <option value="0" <?php echo ($role == 0) ? 'selected' : ''; ?>>Lector</option>
                </select>
            </div>

            <div class="edituser-inputcontainer-status">
                <label for="status">Estado</label>
                <select id="status" name="status" required>
                    <option value="1" <?php echo ($status == 1) ? 'selected' : ''; ?>>Activo</option>
                    <option value="0" <?php echo ($status == 0) ? 'selected' : ''; ?>>Inactivo</option>
                </select>
            </div>

            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
            <button type="submit" class="edituser-btn">Guardar</button>
        </form>
    </div>
</body>
</html>