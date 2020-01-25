
<?php
include_once 'core/init.php';

loginByCookie();

  if (isset($_SESSION['login'])) {
    header("Location: index.php");exit;
  }


  if ($_POST) {
    $OBJ_user = new User(0);

    $errorMessage = $OBJ_user->login($_POST['email'], $_POST['password'], isset($_POST['remember']));
  }

 ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles-login.css">
        <title>Iniciar Sesión</title>
    </head>

    <body>

        <!--//////////////////// INICIO HEADER/NAV ////////////////////////////-->
        <header>
            <?php include("partes/navbar.php");?>
        </header>
        <!--//////////////////// FIN HEADER/NAV ////////////////////////////-->

        <main>
            <!--//////////////////// INICIO FORM ////////////////////////////-->
            <section class="text-center">
                <form class="form-signin" action="" method="POST" enctype="multipart/form-data">
                    <img class="mb-4 logo" src="img/medal.png" alt="">
                    <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
                    <div class="form-row" id="lila">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control"
         id="inputEmail4" placeholder="Email" value="<?php if($_POST){echo $_POST['email']; }?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Contraseña</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="***********">
      </div>
      <div class="form-group col-md-6">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recordarme</label>
      </div>
      <div class="form-group col-md-6">
        <?php if(isset($errorMessage) && $errorMessage != ""){echo $errorMessage;} ?>
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Iniciar sesión</button>
      <a href="reset-pwd-request.php">Olvidé mi contraseña</a>
    </div>
                    <p class="mt-5 mb-3 text-muted">No estas registrado? <a href="register.php">Registrarme</a></p>
                </form>
            </section>
            <!--/////////////////////////// FIN FORM ////////////////////////////////-->
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
