<?php

$errores = [];
$nombre = "";
$email = "";
$password = "";
$repassword = "";
$salida = 2;
$elUsuario = [];
$extension = "";
$imagentemporal = "";

if($_POST)
{
	if(isset($_POST["nombre"]))
	{
		if(empty($_POST["nombre"]))
		{
			$errores["nombre"] = "Ténes que ingresar un nombre! lo dejaste en blanco";
		}
		if(strlen($_POST["nombre"]) < 3 && !empty($_POST["nombre"]))
		{
			$errores["nombre"] = "El nombre debe tener más de dos caracteres!";
		}
		else
		{
			$nombre = $_POST["nombre"];
		}
	}
	if(isset($_POST["email"]))
	{
		if(empty($_POST["email"]))
		{
			$errores["email"] = "Ténes que ingresar un email! lo dejaste en blanco";
		}
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && !empty($_POST["email"]))
		{
			$errores["email"] = "Lo que pones acá debe ser un email valido, no olvides poner un arroba y poner un dominio valido";
		}
		else
		{
			$email = $_POST["email"];
		}
	}

	if(isset($_POST["password"]))
	{
		if(empty($_POST["password"]))
		{
			$errores["password"] = "Tenes que poner una contraseña! lo dejaste en blanco";
		}
		if(strlen($_POST["password"]) < 6 && !empty($_POST["password"]))
		{
			$errores["password"] = "Su contraseña debe tener por lo menos seis caracteres, agregale más";
			$repassword = "";
			$password = "";

		}
		else
		{
			$password = $_POST["password"];
		}
	}

	if(isset($_POST["repassword"]))
	{
		if(empty($_POST["repassword"]))
		{
			$errores["repassword"] = "Este campo tiene que estar lleno, cargalo!<br><br>";
		}
		if(strcmp($_POST["repassword"], $_POST["password"]) && !empty($_POST["repassword"]))
		{
			$errores["repassword"] = "Contraseñas no coinciden, favor de verificar<br><br>";
			$repassword = "";

		}
		if (empty($password))
		{
			$repassword = "";
		}
		else
		{
			$repassword = $_POST["repassword"];
		}
	}
	if (count($errores) === 0)
	{
		$salida = 0;
		if (count($errores) === 0)
		{
			$elUsuario = [
				"nombre" => trim($nombre),
				"email" => trim($email),
				"pass" => password_hash($password, PASSWORD_DEFAULT)
			];
		}

		if($_FILES)
		{
			$extension = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);	//para tener la extensión del archivo
			$nombredelproyecto = dirname(__FILE__);	//para saber la ruta del archivo .php actual
			$nombredelproyecto = $nombredelproyecto . "\img\avatares";
			$nombredelproyecto = $nombredelproyecto . "\avatar_" . uniqid() . "." . $extension; //darle un nombre unico
			move_uploaded_file($imagentemporal, $nombredelproyecto); //guardar la imagen en el servidor
		}

		$usuarioenjson = json_encode($elUsuario);
		file_put_contents("usuarios.json", $usuarioenjson . PHP_EOL, FILE_APPEND);
		session_start();
		$_SESSION["nombre"] = $elUsuario["nombre"];
		$_SESSION["email"] = $elUsuario["email"];
		$_SESSION["avatar"] = $nombredelproyecto;
		header("Location: login.php");
		exit;

	}
	else
	{
		$salida = 1;
	}


}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles-login.css">
	<title>REGISTRO</title>
</head>

<body>
	<!--//////////////////// INICIO HEADER/NAV ////////////////////////////-->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.html">QUESTION RACE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="login.html">JUGAR</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ranking-de-usuarios.html">RANKING</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contacto.html">CONTACTO</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="preguntas-frecuentes.html">AYUDA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin.html">ADMIN</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<!--//////////////////// FIN HEADER/NAV ////////////////////////////-->
<main>
	<!--//////////////////// INICIO REGISTER //////////////////////////// -->
	<section class="text-center has-success">
			<form class="form-signin" action="" method="POST" enctype="multipart/form-data">
				<img class="mb-4 logo" src="img/medal.png" alt="">
				<h1 class="h3 mb-3 font-weight-normal"><?php// var_dump($_POST);?></h1>
				<input type="text" id="inputName" name="nombre" class="form-control " placeholder="Nombre" value="<?php if(empty($_POST["nombre"])){echo"";}else{echo $_POST["nombre"];}?>">
				<small class=""><?=(isset($errores["nombre"])) ? $errores["nombre"] : "" ?></small>
				<input type="email" id="inputEmail" name="email" class="form-control " placeholder="Email" value="<?php if(empty($_POST["email"])){echo"";}else{echo $_POST["email"];}?>">
				<small class=""><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
				<input type="password" id="inputPassword" name="password" class="form-control " placeholder="Contraseña" value="<?php 
				if(isset($errores["password"])){echo"";}else{echo $password;}?>">
				<small class=""><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
				<input type="password" id="rePassword" name="repassword" class="form-control " placeholder="Repetir Contraseña" value="<?php 
				if(isset($errores["repassword"])){echo"";}else{echo $repassword;}?>">
				<small class=""><?= (isset($errores["repassword"])) ? $errores["repassword"] : "" ?></small>
				<input class="btn" type="file" name="avatar"><br>
				<input type="checkbox" class="chek" value="remember-me" name="recordarme" <?php if(isset($_POST["recordarme"])){echo "checked";}else{echo "";}?>> Recordarme
				<button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
				<p class="mt-5 mb-3 text-muted">Ya estas registrado? <a href="login.php">Ingresar</a></p>
			</form>
		</section>
		<!--/////////////////////////// FIN REGISTER ///////////////////////////////-->
	</main>

	<!--///////////////////// FOOTER /////////////////////////-->
	<footer class="container-fluid bg-inverse">
		<div class="row text-white py-4 text-white">
			<div class="col-md-3 footer-brand">
				<img src="img/medal.png" class="float-left mr-3 imgfoter" alt="#">
				<h4 class="namber">QUESTION RACE</h4>
				<div class="blockquote-footer">Todos los derechos reservados <cite title="Source Title">2019</cite>
				</div>
			</div>
			<div class="col-md-3">
				<h4 class="lead">Contacto</h4>
				<p>Cualquier consulta que tengas no dudes en contáctanos haciendo click <a href="contacto.html">aquí</a>
				</p>
			</div>
			<div class="col-md-3">
				<h4 class="lead">Términos y condiciones</h4>
				<p>Lee nuestros <a href="#">términos</a> y <a href="#">condiciones</a> aquí para saber más sobre
				nosotros</p>
			</div>
			<div class="col-md-3">
				<h4 class="lead">Síguenos</h4>
				<a href="#"><span class="badge badge-primary">Facebook</span></a>
			</div>
		</div>
	</footer>
	<!--///////////////////// FIN FOOTER /////////////////////////-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
</body>

</html>