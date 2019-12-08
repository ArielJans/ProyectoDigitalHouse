
<?php

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
    <title>Recuperar Contraseña</title>
</head>

<body>

    <!--//////////////////// INICIO HEADER/NAV ////////////////////////////-->
    <header>
        <?php include("funciones/navbar.php");?>
</header>
<!--//////////////////// FIN HEADER/NAV ////////////////////////////-->

<main>
    <!--//////////////////// INICIO FORM ////////////////////////////-->
    <section class="text-center">
        <form class="form-signin" action="recuperarContraseña.php" method="POST" enctype="multipart/form-data">
            <img class="mb-4 logo" src="img/medal.png" alt="">
            <h1 class="h3 mb-3 font-weight-normal">Recuperar Contraseña</h1>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email"
            autofocus value="">
            <small class="" style="color: green"><?= (!empty($_POST["email"])) ? "Se ha enviado la solicitud de cambio de contraseña por correo!" : "" ?></small>
<?php// var_dump($_POST);?>
<!-- Button trigger modal -->
<button class="btn btn-lg btn-primary btn-block" type="submit"  >Enviar nueva contraseña</button> 

<button type="button" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#staticBackdrop" <?=(!empty($_POST["email"])) ? "" : "hidden" ?>>
 Ver contraseña recibida por correo
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Solicitud de nueva contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        Contraseña provisoria: PAssword22
        <?php //var_dump($_POST);?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>

        <a href="login.php">    <button type="button" class="btn btn-primary">Iniciar sesión</button>   </a> <!-- target="_blank" para que abra otra ventana -->
      </div>
    </div>
  </div>
</div>




             <a href="login.php" class="recupero-pass"><br>Iniciar sesión</a>
            <p class="mt-5 mb-3 text-muted">No estas registrado? <a href="register.php">Registrarme</a></p>
        </form>
    </section>
    <!--/////////////////////////// FIN FORM ///////////////////////////////-->
</main>

<!--///////////////////// FOOTER /////////////////////////-->
<?php include("funciones/footer.php"); ?>
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