<?php
include('conection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" type="text/css" href="style_admin_posts.css">
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="">
            <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbar-options">
            <a href="index.php">Blog</a>
            <a href="admin.php">Usuarios</a>
        </div>
    </header>

    <!--Menú-->
    <div class="publicaciones-container">
        <h2>Publicaciones</h2>
        <div class="table-container">
            <table class="tabla_publicaciones">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Publicación</th>
                        <th>Imagen</th>
                        <!--<th>PDF</th>-->
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Consulta para traer los datos de la base de datos
                        $query = "SELECT id, title, body, img, pdf, created_at, status FROM posts";
                        $result = $conexion->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["title"] . "</td>";
                                echo '<td><a href="view_post.php?id=' . $row["id"] . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="viewpost_icon"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" fill="#ffffff"/>
                                </svg>Ver publicación</a></td>';
                                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["img"]) . "'/></td>";
                                /*echo "<td><a href='data:application/pdf;base64," . base64_encode($row["pdf"]) . "' target='_blank'>Ver PDF</a></td>";*/
                                echo "<td>" . $row["created_at"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo '<td><a href="edit_post.php?id=' . $row["id"] . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" fill="#ffffff"/></svg></a></td>';
                                echo '<td><a class="delete_post" href="#" data-id="' . $row["id"] . '"><svg class="delete_user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-id="' . $row["id"] . '"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" fill="#ffffff"/></svg></a></td>';

                                echo "</tr>";
                            }
                        } else {
                            echo "No hay publicaciones registradas.";
                        }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
$conexion->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const eliminarBtns = document.querySelectorAll('.delete_post');
        eliminarBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const postId = this.getAttribute('data-id');
                if (confirm('¿Estás seguro de eliminar este post?')) {
                    fetch(`delete_post.php?id=${postId}`, {
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Ocurrió un error al eliminar el post.');
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