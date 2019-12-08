<?php

session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" href="css/styles-perfil.css">
    <title>Perfil Usuario</title>
</head>

<body>
    <header>
        <?php include("funciones/navbar.php");?>
</header>
    <main class="row">
        <section class="left col-md-4">
            <h1 class="name"><?php echo $_SESSION["nombre"]; ?></h1>
            <img src="img/perfilGenerico.jpg" alt="Imagen de perfil">
            <p>País: <strong>Argentina</strong></p>
            <button type="button" class="btn btn-perfil btn-primary">Editar perfil</button>
        </section>

        <section class="rigth col-md-8">
        <ul class="datosPerfil name">
            <li>Nombre: Juanito</li>
            <li>Apellido: Arcoiris</li>
            <li>Usuario: JArco2019</li>
            <li>Edad: 24</li>
            <li>Nacionalidad: Uruguay</li>
            <li>Correo: <?php echo $_SESSION["email"]; ?></li>
        </ul>
        </section>
    </main>

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