<?php
	include('register.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SubLife</title>
	<link rel="shortcut icon" href="img/sublife_logo.png" type="">
    <link rel="stylesheet" href="style_login_register.css">
</head>
<body>
	<!--Barra superior de navegación login-->
    <header class="navbarlogin" id="navbarlogin">
        <a href="">
            <img class="navbarlogin-logo" src="img/sublife_logo.png">
        </a>
        <div class="navbarlogin-options">
        	<a href="index.php">Blog</a>
        </div>
    </header>

    <!--Barra superior de navegación register-->
    <header class="navbarregister" id="navbarregister">
    	<div class="navbarregister-options">
        	<a href="index.php">Blog</a>
        </div>
        <a href="">
            <img class="navbarregister-logo" src="img/sublife_logo.png">
        </a>
    </header>

	<!--Video de fondo-->
	<div class="video-container">
        <video autoplay muted loop class="video">
            <source src="video/video.mp4" type="video/mp4">
        </video>
	</div>

	<!--Fondo del login y register-->
	<div class="background-loginregister"></div>

	<!--Login y register-->
	<div class="container-loginregister" id="container-loginregister">
		<!--Login-->
		<div class="login">
			<h2>Inicia Sesión</h2>
			<p>¿Aún no tienes una cuenta? <a href="#" id="go-to-register"> Crea una</a></p>
			<form method="post" action="login.php">
				<div class="login-inputcontainer">
					<input type="text" name="username" required>
					<label class="lbl">
						<span class="text-span">Usuario</span>
					</label>
				</div>
				<div class="login-inputcontainer">
					<input type="password" name="password" required>
					<label class="lbl">
						<span class="text-span">Contraseña</span>
					</label>
				</div>
				<input type="submit" value="Iniciar Sesión" class="login-btn" name="btnIngresar">
			</form>
		</div>
		<!--Register-->
		<div class="register">
			<h2>Crea una cuenta nueva</h2>
			<p>¿Ya tienes una cuenta? <a href="#" id="go-to-login"> Inicia sesión</a></p>
			<form method="post">
				<!--Obtener el mensaje de error-->
				<div class="register-errormessage" <?php if (empty($register_error_message)) echo 'style="display: none;"'; ?>>
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="alert_icon" viewBox="0 0 512 512">
                        <path fill="#99a3a4" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                    </svg>
                    <p class="error_message_text"><?php echo $register_error_message; ?></p>
                </div>
				<div class="login-inputcontainer uno">
					<input type="email" name="email" required>
					<label class="lbl">
						<span class="text-span">Correo</span>
					</label>
				</div>
				<div class="login-inputcontainer">
					<input type="text" name="username" required>
					<label class="lbl">
						<span class="text-span">Usuario</span>
					</label>
				</div>
				<div class="login-inputcontainer">
					<input type="password" name="password" required>
					<label class="lbl">
						<span class="text-span">Contraseña</span>
					</label>
				</div>
				<div class="login-inputcontainer">
					<input type="password" name="confirm_password" required>
					<label class="lbl">
						<span class="text-span">Confirmar contraseña</span>
					</label>
				</div>
				<input type="submit" value="Crear Cuenta" class="register-btn">
			</form>
		</div>
	</div>	
</body>
</html>

<script>
//Verificar si $error_message está vacío
<?php if (!empty($error_message)) : ?>
	//Si $error_message no está vacío ejecutará la función goToRegister
	goToRegister();
<?php endif; ?>

//Función para ir a register
function goToRegister(){
    document.querySelector('.background-loginregister').classList.remove('translate-to-login');
    document.querySelector('.video-container').classList.remove('translate-to-login');
    document.querySelector('.login').classList.remove('translate-to-login');
    document.querySelector('.register').classList.remove('translate-to-login');
    document.querySelector('.navbarlogin').classList.remove('translate-to-login');
    document.querySelector('.navbarregister').classList.remove('translate-to-login');

    setTimeout(function() {
        document.querySelector('.video-container').classList.add('translate-to-register');
    }, 100);

    setTimeout(function() {
        document.querySelector('.background-loginregister').classList.add('translate-to-register');
        document.querySelector('.login').classList.add('translate-to-register');
        document.querySelector('.register').classList.add('translate-to-register');
        document.querySelector('.navbarlogin').classList.add('translate-to-register');
        document.querySelector('.navbarregister').classList.add('translate-to-register');
    }, 50);
}


// Variable que verifica si register se está mostrando
let isRegisterShown = false;

document.getElementById('go-to-register').addEventListener('click', function() {
  // Eliminar las clases anteriores
  document.querySelector('.background-loginregister').classList.remove('translate-to-login');
  document.querySelector('.video-container').classList.remove('translate-to-login');
  document.querySelector('.login').classList.remove('translate-to-login');
  document.querySelector('.register').classList.remove('translate-to-login');
  document.querySelector('.navbarlogin').classList.remove('translate-to-login');
  document.querySelector('.navbarregister').classList.remove('translate-to-login');

  setTimeout(function() {
  	document.querySelector('.video-container').classList.add('translate-to-register');
  }, 100);

  setTimeout(function() {
    document.querySelector('.background-loginregister').classList.add('translate-to-register');
    document.querySelector('.login').classList.add('translate-to-register');
    document.querySelector('.register').classList.add('translate-to-register');
    document.querySelector('.navbarlogin').classList.add('translate-to-register');
    document.querySelector('.navbarregister').classList.add('translate-to-register');
  }, 50);

  // Actualizar el estado de la animación
  isRegisterShown = true;
});

document.getElementById('go-to-login').addEventListener('click', function() {
  // Eliminar las clases de animación anteriores antes de aplicar la animación de inicio de sesión
  document.querySelector('.background-loginregister').classList.remove('translate-to-register');
  document.querySelector('.video-container').classList.remove('translate-to-register');
  document.querySelector('.login').classList.remove('translate-to-register');
  document.querySelector('.register').classList.remove('translate-to-register');
  document.querySelector('.navbarlogin').classList.remove('translate-to-register');
  document.querySelector('.navbarregister').classList.remove('translate-to-register');

  setTimeout(function() {
  	document.querySelector('.video-container').classList.add('translate-to-login');
  }, 100);

  setTimeout(function() {
    document.querySelector('.background-loginregister').classList.add('translate-to-login');
    document.querySelector('.login').classList.add('translate-to-login');
    document.querySelector('.register').classList.add('translate-to-login');
    document.querySelector('.navbarlogin').classList.add('translate-to-login');
    document.querySelector('.navbarregister').classList.add('translate-to-login');
  }, 50);

  // Actualizar el estado de la animación
  isRegisterShown = false;
});
</script>