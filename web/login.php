<?php
$email = "";
$password = "";
$errores = [];

if($_POST)
{
    if(isset($_POST["email"]))
    {
        if(empty($_POST["email"]))
        {
            $errores["email"] = "Ténes que ingresar un email! lo dejaste en blanco";
        }
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
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
        if(strlen($_POST["password"]) < 6)
        {
            $errores["password"] = "Contraseña incorrecta! intente de nuevo";
            $repassword["password"] = "";

        }
        else
        {
            $password = $_POST["password"];
        }
    }


    if (count($errores) === 0)
    {


        $dato = file_get_contents("usuarios.json");
        $datos = json_decode($dato, true);
        $usuariosseparados = explode(PHP_EOL, $datos);

        foreach($usuariosseparados as $valor)
        {
            if($valor["email"] == $_POST["email"])
            {
                if(password_verify($_POST["password"], $valor["pass"]))
                {
                    session_start();
                    $_SESSION["nombre"] = $valor["nombre"];
                    $_SESSION["email"] = $valor["email"];
                    header("Location: perfil.php");
                    exit;

                }
            }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-login.css">
    <title>LOGIN</title>
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
    <!--//////////////////// INICIO FORM ////////////////////////////-->
    <section class="text-center">
        <form class="form-signin" action="" method="POST">
            <img class="mb-4 logo" src="img/medal.png" alt="">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required
            autofocus value="<?php if(empty($_POST["email"])){echo"";}else{echo $_POST["email"];}?>">
            <small class=""><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required value="<?php 
            if(isset($errores["password"])){echo"";}else{echo $password;}?>">
            <small class=""><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
            <input type="checkbox" class="chek" value="remember-me"> Recordarme
            <a href="#" class="recupero-pass">Olvide mi contraseña</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            <p class="mt-5 mb-3 text-muted">No estas registrado? <a href="register.html">Registrarme</a></p>
        </form>
    </section>
    <!--/////////////////////////// FIN FORM ///////////////////////////////-->
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