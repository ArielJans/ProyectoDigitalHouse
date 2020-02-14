<?php
include_once 'core/init.php';

loginByCookie();

if (isset($_SESSION['login'])) {
  header("Location: index.php");exit;
}

$valid = new Validator();

  if ($_POST) {
    $valid->validateEmail($_POST["email"]);

    $valid->validatePassword($_POST['password']);


    $valid->validateUserPic($_FILES['userPic']);

    if (empty($valid->getErrors())) {
      $OBJ_user = new User(0);
      $OBJ_user->register();
      header("Location: login.php");
    }else{
      $errors = $valid->getErrors();
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
 		<?php include("partes/navbar.php");?>
 	</header>
 	<!--//////////////////// FIN HEADER/NAV ////////////////////////////-->
 	<main>
 		<!--//////////////////// INICIO REGISTER //////////////////////////// -->
 		<section class="text-center has-success">
 			<form class="form-signin" action="" method="POST" enctype="multipart/form-data">
 				<img class="mb-4 logo" src="img/medal.png" alt="">
 				<h1 class="h3 mb-3 font-weight-normal">Registrarse<?php// var_dump($_POST);?></h1>
 				<div class="form-group col-md-12">
         <label for="email"></label> <?php if(isset($errors['email'])){echo '<span>'. $errors['email'] .'</span>';} ?>
         <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if($_POST){echo $_POST['email']; }?>">
       </div>
 			<div class="form-group col-md-12">
 			<label for="password"></label> <?php if(isset($errors['password'])){echo '<span>'. $errors['password'] .'</span>';} ?>
 			<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
 		</div>

 				<!--///////////////////////-->
 				<div class="form-group col-md-12">
         <label for="userPic">Foto de perfil</label>
         <input type="file" name="userPic" id="userPic">
         <?php if(isset($errors['userPic'])){echo '<span class="zip-error">'. $errors['userPic'] .'</span>';} ?>
       </div>
 				<!--///////////////////////-->

 				<button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
 				<p class="mt-5 mb-3 text-muted">Ya estas registrado? <a href="login.php">Ingresar</a></p>
 			</form>
 		</section>
 		<!--/////////////////////////// FIN REGISTER ///////////////////////////////-->
 	</main>

 	<!--///////////////////// FOOTER /////////////////////////-->
 	<?php include("partes/footer.php"); ?>
 	<!--///////////////////// FIN FOOTER /////////////////////////-->

 	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 </body>

 </html>
