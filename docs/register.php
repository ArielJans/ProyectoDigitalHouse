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
			$errores["repassword"] = "Este campo tiene que estar lleno, cargalo!";
		}
		if(strcmp($_POST["repassword"], $_POST["password"]) && !empty($_POST["repassword"]))
		{
			$errores["repassword"] = "Contraseñas no coinciden, favor de verificar";
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
		if($_FILES)
		{
			$extension = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);	//para tener la extensión del archivo
			$nombredelproyecto = dirname(__FILE__);	//para saber la ruta del archivo .php actual
			$imagentemporal = $_FILES["avatar"]["tmp_name"];
			$nombredelproyecto = $nombredelproyecto . "\img\avatares";
			$nombredelproyecto = $nombredelproyecto . "\avatar_" . uniqid() . "." . $extension; //darle un nombre unico
			move_uploaded_file($imagentemporal, $nombredelproyecto); //guardar la imagen en el servidor
		}
		if (count($errores) === 0)
		{
			$elUsuario = [
				"nombre" => trim($nombre),
				"email" => trim($email),
				"pass" => password_hash($password, PASSWORD_DEFAULT)
			];


			if(!empty($_FILES["avatar"]["name"]))
			{
				$elUsuario["avatar"] = $nombredelproyecto;
			}

			$usuarioenjson = json_encode($elUsuario);
			file_put_contents("usuarios.json", $usuarioenjson . PHP_EOL, FILE_APPEND);
			session_start();
			$_SESSION["nombre"] = $elUsuario["nombre"];
			$_SESSION["email"] = $elUsuario["email"];
			if(!empty($_FILES["avatar"]["name"]))
			{
				$_SESSION["avatar"] = $nombredelproyecto;
			}

		header("Location: login.php");
		exit;

		}
		else
		{
			$salida = 1;
		}
		if(!empty($_POST["recordarme"]))
		{
			// echo "usuario quiere recordar";
			$password = $_POST["password"];
			$repasword = $_POST["repassword"];
			$email = $_POST["email"];
			$nombre = $_POST["nombre"];
		}
		else
		{
			// echo "usuario no quiere recordar";
			$password = "";
			$repassword = "";
			$email = "";
			$nombre = "";
		}

	}
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles-login.css">
	<title>Registrarse</title>
</head>

<body>
	<!--//////////////////// INICIO HEADER/NAV ////////////////////////////-->
    <header>
        <?php include("funciones/navbar.php");?>
</header>
<!--//////////////////// FIN HEADER/NAV ////////////////////////////-->
<main>
	<!--//////////////////// INICIO REGISTER //////////////////////////// -->
	<section class="text-center has-success">
		<form class="form-signin" action="" method="POST" enctype="multipart/form-data">
			<img class="mb-4 logo" src="img/medal.png" alt="">
			<h1 class="h3 mb-3 font-weight-normal">Registrarse<?php// var_dump($_POST);?></h1>
			<input type="text" id="inputName" name="nombre" class="form-control " placeholder="Nombre" value="<?php if(empty($_POST["nombre"])){echo"";}else{echo $nombre;}?>"> <?php //se modifica $_POST["nombre"] por $nombre ?>
			<small class=""><?=(isset($errores["nombre"])) ? $errores["nombre"] : "" ?></small>
			<input type="email" id="inputEmail" name="email" class="form-control " placeholder="Email" value="<?php if(empty($_POST["email"])){echo"";}else{echo $email;}?>"> <?php //se modifica $_POST["email"] por $email ?>
			<small class=""><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
			<input type="password" id="inputPassword" name="password" class="form-control " placeholder="Contraseña" value="<?php 
			if(isset($errores["password"])){echo"";}else{echo $password;}?>">
			<small class=""><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
			<input type="password" id="rePassword" name="repassword" class="form-control " placeholder="Repetir Contraseña" value="<?php 
			if(isset($errores["repassword"])){echo"";}else{echo $repassword;}?>">
			<small class="text-center"><?= (isset($errores["repassword"])) ? $errores["repassword"] : "" ?></small>
			<p class="btn text-center" id="imagenAvatar">Imagen de avatar:</p>
			<div class="input-group-prepend">
			</div>
			<div class="custom-file">
				<input type="file" class="" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
			</div>
			<p><input type="checkbox" class="chek" value="remember-me" name="recordarme" <?php if(isset($_POST["recordarme"])){echo "checked";}else{echo "";}?>> Recordarme</p>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
			<p class="mt-5 mb-3 text-muted">Ya estas registrado? <a href="login.php">Ingresar</a></p>
		</form>
	</section>
	<!--/////////////////////////// FIN REGISTER ///////////////////////////////-->
</main>

<!--///////////////////// FOOTER /////////////////////////-->
<?php include("funciones/footer.php"); ?>
<!--///////////////////// FIN FOOTER /////////////////////////-->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>