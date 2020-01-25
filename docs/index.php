<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-index.css">
    <title>QUESTION RACE</title>
</head>

<body>

    <!--//////////////////// INICIO HEADER/NAV ////////////////////////////-->
    <header>
        <?php include("partes/navbar.php");?>
        <img class="img-header" src="./img/fondo-web.jpg" alt="">
    </header>
    <!--//////////////////// FIN HEADER/NAV ////////////////////////////-->

    <main>
      <?php
          if ($logged) {
            echo '<h2>Bienvenido!</h2>

                  <p>Iniciaste sesión como <span class="user-name">' . $_SESSION['user']['user_name'] . '</span></p>';

          } else {
            echo '<h2>Registrate</h2>
                  <p>Y juga el juego mas divertido!!!</p>
                  <a href="register.php" class="btn">Crear cuenta</a>';
          }

         ?>
        <!--//////////////////// INICIO DESCRIPCION ////////////////////////////-->
        <div class="container my-5">

            <div class="row d-flex align-items-center my-5 py-5">
                <div class="col-md-7">
                    <h2 class="display-4">Título del beneficio 1. <br><span class="text-muted">Sub titulo.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                        euismod
                        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus
                        ac cursus
                    commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class=" img-fluid mx-auto" src="img/cards1.png" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="" id="beneficio2">

            <div class="row d-flex align-items-center my-5 py-5">
                <div class="pos-tex-izq col-md-7 push-md-5">
                    <h2 class="display-4">Título del beneficio 2. <br><span class="text-muted">Sub titulo.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                        euismod
                        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus
                        ac cursus
                    commodo.</p>
                </div>
                <div class=" pos-img-izq col-md-5 pull-md-7">
                    <img class=" img-fluid mx-auto" src="img/cards2.png" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="" id="beneficio3">

            <div class="row d-flex align-items-center my-5 py-5">
                <div class="col-md-7">
                    <h2 class="display-4">Título del beneficio 3. <br><span class="text-muted">Sub titulo.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                        euismod
                        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus
                        ac cursus
                    commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class=" img-fluid mx-auto" src="img/cards3.png" alt="Generic placeholder image">
                </div>
            </div>
        </div>
        <!--/////////////////////////// FIN DESCRIPCION ///////////////////////////////-->

        <section class="call-to-action">
            <h2 class="tex-cta">Empeza a jugar ahora!!</h2>
            <button type="button" class="btn btn-cta btn-primary btn-lg btn-warning"><a href="register.html">COMENZAR</a></button>
        </section>

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
                <p>Cualquier consulta que tengas no dudes en contáctanos haciendo click <a href="contacto.html">aquí</a></p>
            </div>
            <div class="col-md-3">
                <h4 class="lead">Términos y condiciones</h4>
                <p>Lee nuestros <a href="#">términos</a> y <a href="#">condiciones</a> aquí para saber más sobre nosotros</p>
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
