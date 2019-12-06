
<?php

/*
Requerimientos obligatorios
La página de registro y la página de login deben cumplir con las siguientes solicitudes
Para todos los modelos de negocio
●   Debe existir una validación de los formularios (login y register) del lado del servidor.
●   En caso de que haya datos incorrectos o no válidos la página debería mostrar cuáles
son los errores.
●   En caso de que haya datos incorrectos o no válidos los datos que estaban correctos
deben seguirse viendo en pantalla (persistencia).
●   En la registración, el usuario final debería poder subir una foto de perfil.
●   En ambos formularios debería estar disponible la opción de "Recordar usuario”.
●   Debemos tener un archivo JSON en donde se guarde el/los usuario/s.

3

Requerimientos opcionales (ojo, mejoran MUCHO la experiencia
de usuario)
Para todos los modelos de negocio
● El sitio debería distinguir usuarios logueados de no logueados. Para ésto deberían
implementar una de las dos funcionalidades descritas a continuación:
a. Opción 1: Al loguearse, el usuario debe ser enviado a una página de BIENVENIDA.
Si quiere acceder a este sitio deslogueado se lo redirigirá al formulario de login.
b. Opción 2: Incluir una sección en común en todo el sitio, por ejemplo el
encabezado. Si el usuario está logueado debe indicar su nombre de usuario. En
caso de no estar logueado debe tener un link a la página de Login.
● Los formularios de login y registro no deberían ser accesibles si el usuario ya está
logueado.
● El sitio debería contar con una opción para desloguearse.
● El sitio debería contar con la opción de "Olvidé mi contraseña" funcional.
● El usuario final debería poder acceder a una página en la cual pueda editar su
información de perfil.

En el caso de que no hayan podido avanzar con alguna solicitud del SPRINT 1 no se olviden de
completarlos/mejorarlos para ESTE SPRINT.
*/
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
            $errores["email"] = "Ténes que ingresar un email! lo dejaste en blanco";
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
       // var_dump($datos);
        foreach($datos as $usuario1) //entra en cada pusición, por cada usuario que tenga lo convierte en json y lo guarda en usrfinal, y lo guarda en el última posicion de usuariosfinales
        {
            $usuariofinal = json_decode($usuario1, true);
            $usuariosfinales[] = $usuariofinal;
        }
        //var_dump($usuariosfinales);

        echo "<br>   ". count($usuariosfinales) . "      <br>";

        $salida = 0;
        foreach($usuariosfinales as $usuario)
        {
            $salida++;
            var_dump($usuario["email"]);
            if($usuario["email"] == $_POST["email"])
            {
                echo "SE ENCONTRO EL CORREO ........ se buscaba   " .$usuario["email"] ."   se encontro   " . $_POST["email"] . "    <br>";
                if(password_verify($_POST["password"], $usuario["pass"]))
                {
                    $validador = 1;
                    echo "<br><br>DATOS CORRECTOS, SE INICIA SESIÓN<br><br>";
                    session_start();
                    $_SESSION["nombre"] = $usuario["nombre"];
                    $_SESSION["email"] = $usuario["email"];
                    $salida = 0;
                   // header("Location: perfil.php")sss;
                    //exit;
                }
                if(isset($_POST["recordarme"]))
                {
                    echo "<br><br>USUARIO QUIERE RECORDAR LOS DATOS<br><br>";
                }
                else
                {
                    $email = "";
                    $password = "";
                    echo "<br><br>USUARIO NO QUIERE RECORDAR LOS DATOS<br><br>";
                }
            }
            if(count($usuariosfinales) == $salida)
            {
                echo "<br>DATOS INCORRECTOS<br>";
                $validador = 0;
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
        <form class="form-signin" action="login.php" method="POST" enctype="multipart/form-data">
            <img class="mb-4 logo" src="img/medal.png" alt="">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
            <small class=""><?php if($validador == 0){echo "DATOS INCORRECTOS";}else{echo "";} ?></small>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email"
            autofocus value="<?php echo $email; //if(empty($_POST["email"])){echo"";}else{echo $_POST["email"];}?>">
            <small class=""><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" value="<?php 
            echo $password;//if(isset($errores["password"])){echo"";}else{echo $password;}?>">
            <small class=""><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
            <input type="checkbox" class="chek" value="remember-me" name="recordarme" <?php if(isset($_POST["recordarme"])){echo "checked";}else{echo "";}?>> Recordarme
            <a href="recuperarContraseña.php" class="recupero-pass">Olvide mi contraseña</a>
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