<?php 
	session_start();
?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
	<h1>Panel de administración</h1>
	<h2>Bienvenido: <?php echo $_SESSION['user_data']['username'] ?></h2>
	<h2>Bienvenido: <?php echo $_SESSION['user_data']['id'] ?></h2>
	<h2>Bienvenido: <?php echo $_SESSION['user_data']['role'] ?></h2>
</body>
</html>