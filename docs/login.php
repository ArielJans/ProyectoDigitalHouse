
<?php
$email = "";
$password = "";
$errores = [];
$validador = 2;

if($_POST)
{
    if(isset($_POST["email"]))
    {
        if(empty($_POST["email"]))
        {
            $errores["email"] = "Ténes que ingresar un email! lo dejaste en blanco <br><br>";
            $password = "";
            $email = "";        }
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && !empty($_POST["email"]))
            {
                $errores["email"] = "Lo que pones acá debe ser un email con formato valido, no olvides poner un arroba y poner un dominio";
                $password = "";
                $email = "";
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
                $errores["password"] = "Tenes que poner una contraseña! lo dejaste en blanco<br><br>";
            }
            else
            {
                if(!empty($email))
                {
                    $password = $_POST["password"];
                }
                else
                {
                    $password = "";
                }
            }

        }
        if (count($errores) === 0)
        {
            $datos = file_get_contents("usuarios.json");
            $datos = explode(PHP_EOL, $datos);
            array_pop($datos);
            $usuariosfinales = [];
            foreach($datos as $usuario1) //entra en cada posición, por cada usuario que tenga lo convierte en json y lo guarda en usuariofinal, y lo guarda en el última posicion de usuariosfinales
            {
                $usuariofinal = json_decode($usuario1, true);
                $usuariosfinales[] = $usuariofinal;
            }
            $salida = 0;
            foreach($usuariosfinales as $usuario)
            {
                $salida++;
                //var_dump($usuario["email"]);
                if($usuario["email"] == $_POST["email"])
                {
                    if(password_verify($_POST["password"], $usuario["pass"]))
                    {

                        setcookie("emailusuario",$usuario["email"], time() + 60 * 60);
                        if(!isset($_POST["recordarme"]))
                        {
                            $email = "";
                            $password = "";
                         //   setcookie("emailusuario", "", -1);
                        }
                        $validador = 1;
                        session_start();
                        $_SESSION["nombre"] = $usuario["nombre"];
                        $_SESSION["email"] = $usuario["email"];
                        $salida = 0;
                        header("Location: bienvenida.php");
                        exit;
                    }
                }
            }
            if(count($usuariosfinales) == $salida)
            {
                $validador = 0;
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
                    <small class=""><?php if($validador == 0){echo "Datos incorrectos";}else{echo "";} ?></small>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email"
                    autofocus value="<?php echo $email; //if(empty($_POST["email"])){echo"";}else{echo $_POST["email"];}?>">
                    <small class=""><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" value="<?php
                    echo $password;//if(isset($errores["password"])){echo"";}else{echo $password;}?>">
                    <small class=""><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
                    <input type="checkbox" class="chek" value="remember-me" name="recordarme" <?php if(isset($_POST["recordarme"])){echo "checked";}else{echo "";}?>><h7>Recordarme</h7>
                    <a href="recuperarContraseña.php" class="recupero-pass">Olvide mi contraseña</a>
                    <button class="btn btn-lg btn-primary btn-block" id="botonIngresar" type="submit">Ingresar</button>
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
