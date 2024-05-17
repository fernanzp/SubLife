<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubLife</title>
    <link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" type="text/css" href="style_newpost.css">
</head>
<body>
    <!--Barra superior de navegación-->
    <header class="navbar" id="navbar">
        <a href="">
            <img class="navbar-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbar-options">
            <a href="index.php">Blog</a>
        </div>
    </header>

    <!--Nueva publicación-->
    <div class="newpost">
        <h2>Nueva Publicación</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="newpost-inputcontainer">
                <input type="text" name="title" required>
                <label class="lbl">
                    <span class="text-span">Titulo</span>
                </label>
            </div>
            <div class="newpost-inputcontainer_body">
                <textarea name="body" rows="5" required></textarea>
                <label class="lbl">
                    <span class="textarea-text-span">Contenido</span>
                </label>
            </div>

            <div class="newpost-image">
                <label for="img">Subir imagen</label>
                <input type="file" name="img" id="img">
            </div>
            <div class="newpost-image-preview"></div>

            <!--<div class="newpost-pdf">
                <label for="pdf">Subir PDF</label>
                <input type="file" name="pdf" id="pdf">
            </div>-->

            <input type="submit" value="Enviar" class="newpost-btn" name="newpost">
        </form> 
    </div>

    <script>
        // Obtener el input de archivo y la vista previa de la imagen
        const imgInput = document.querySelector('input[name="img"]');
        const imagePreview = document.querySelector('.newpost-image-preview'); // Agrega una clase a tu div de previsualización

        // Escuchar cambios en el input de archivo
        imgInput.addEventListener('change', function() {
            const file = this.files[0]; // Obtener el archivo seleccionado
            if (file) {
                const reader = new FileReader(); // Crear un objeto FileReader
                reader.onload = function(e) {
                    // Mostrar la vista previa de la imagen en el div de la vista previa
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                }
                reader.readAsDataURL(file); // Leer el archivo como URL de datos
            } else {
                imagePreview.innerHTML = ''; // Limpiar la vista previa si no hay archivo seleccionado
            }
        });
    </script>

</body>
</html>

<?php
    session_start();

    include('conection.php');

    //Verificar si se ha enviado el dormulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Recoger datos del formulario
        $title = $_POST['title'];
        $body = $_POST['body'];
        $img = $_FILES['img']['tmp_name'];
        $img_content = addslashes(file_get_contents($img));
        /*$pdf = $_FILES['pdf']['tmp_name'];
        $pdf_content = addslashes(file_get_contents($pdf));*/

        //Consulta para insertar en la base de datos
        $query = "INSERT INTO posts (id, title, body, img, pdf, created_at, status) VALUES (NULL, '$title', '$body', '$img_content', 'PDF', NOW(), 0)";

        //Ejecutar la consulta
        if ($conexion->query($query) === TRUE) {
            header("Location: index.php");
            exit();
        }
        $conexion->close();
    }
?>