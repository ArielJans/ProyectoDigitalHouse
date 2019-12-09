<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/contacto.css">
</head>

    <header>
        <?php include("funciones/navbar.php");?>
</header>

<body>
      
<main>

	<section class="text-center subnombre">
            <form class="" action="login.php" method="POST" enctype="multipart/form-data">
                <img class="mb-4 logo" src="img/medal.png" alt="">
                <h1 class="h3 mb-3 font-weight-normal">Contacto</h1>
                <input type="email" name="nombre" class="form-control subnombre" placeholder="Nombre"
                autofocus value="">
                <input type="password" name="email" class="form-control subnombre" placeholder="Email" value="">
                <textarea class="form-control subnombre" rows="3" placeholder="Escriba su mensaje aquí"></textarea>
                <button class="btn btn-lg btn-primary btn-block subnombre enviar" type="submit">Enviar</button>
            </form>
        </section>
  </main>

<?php include("funciones/footer.php"); ?>


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