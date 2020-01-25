<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-juego.css">
    <title>QUESTION RACE</title>
</head>

<body>
    <header>
        <?php include("partes/navbar.php");?>
    </header>

    <main class="row">
        <section class="left col-md-4">
            <h2 class="call-to-action">Pregunta #1</h2>
            <p class="cuestion">¿Desde qué andén sale el tren en el que hay que subir para llegar a la Escuela Hogwarts de Magia y Hechicería en la pelicula de Harry Potter?</p>

            <!-- /////////////////  OPCIONES DE CHECKBOX ///////////////-->
            <form action="#" method="POST">
                <label class="radio"> Anden 9 ¾
                    <input type="radio" name="radio" value="opcion 2">
                    <span class="check"></span>
                </label>
                <label class="radio"> Anden 8 ¾
                    <input type="radio" name="radio" value="opcion 2">
                    <span class="check"></span>
                </label>
                <label class="radio"> Anden 6 ½
                    <input type="radio" name="radio" value="opcion 3">
                    <span class="check"></span>
                </label>
                <!-- ///////////////// FIN OPCIONES DE CHECKBOX ///////////////-->
                <button type="submit" class="btn btn-primary"> Responder</button>
            </form>
        </section>

        <!-- ///////////////// IMAGENES RIGTH ///////////////-->
        <section class="rigth col-md-8">
            <img src="img/fondo.jpg" class="img-back" alt="Imagen de fondo QUESTION RACE">
            <img src="img/medal.png" class="img-ficha" alt="ficha de juego">
        </section>
        <!-- ///////////////// FIN IMAGENES RIGTH ///////////////-->


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
