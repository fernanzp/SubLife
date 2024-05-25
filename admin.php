<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" type="text/css" href="style_admin.css">
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="">
            <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbar-options">
            <a href="index.php">Blog</a>
            <a href="admin_posts.php">Publicaciones</a>
        </div>
    </header>

    <!--Menú-->
    <div class="usuarios-container">
        <h2>Usuarios</h2>
        <div class="table-container">
            <table class="tabla_usuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre de usuario</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('conection.php');
                        
                        // Función para convertir el rol numérico en texto
                        function getRoleName($role) {
                            switch ($role) {
                                case 2:
                                    return 'Administrador';
                                case 1:
                                    return 'Bloguero';
                                case 0:
                                case '':
                                    return 'Lector';
                                default:
                                    return 'Lector';
                            }
                        }

                        // Función para convertir el estado numérico en texto
                        function getStatusName($status) {
                            switch ($status) {
                                case 1:
                                    return 'Activo';
                                case 0:
                                case '':
                                    return 'Inactivo';
                                default:
                                    return 'Inactivo';
                            }
                        }

                        //Consulta para traer los datos en la base de datos
                        $query = "SELECT id, username, email, role, status FROM users";
                        $result = $conexion->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $roleName = getRoleName($row["role"]);
                                $statusName = getStatusName($row["status"]);
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $roleName . "</td>";
                                echo "<td>" . $statusName . "</td>";
                                echo '<td><a href="edit_user.php?id=' . $row["id"] . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" fill="#ffffff"/></svg></a></td>';
                                echo '<td><svg class="delete_user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-id="' . $row["id"] . '"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" fill="#ffffff"/></svg></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "No hay usuarios registrados.";
                        }
                        $conexion->close();
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const eliminarBtns = document.querySelectorAll('.delete_user');
        eliminarBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                if (confirm('¿Estás seguro de eliminar este usuario?')) {
                    fetch(`delete_user.php?id=${userId}`, {
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Ocurrió un error al eliminar el usuario.');
                        }
                        return response.text();
                    })
                    .then(data => {
                        location.reload();
                    })
                    .catch(error => {
                        alert(error.message);
                    });
                }
            });
        });
    });
</script>