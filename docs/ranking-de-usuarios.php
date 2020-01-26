<?php
include_once 'includes/functions.inc.php';

session_start();

loginByCookie();

 ?>
 <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-ranking.css">
    <title>Ranking</title>
</head>

<body>
    <header>
        <?php include("partes/navbar.php");?>
    </header>
    <main class="row">
        <section class="left col-md-4">
            <h1 class="name">1° Puesto </h1>
            <a href="perfil.html"><img class="img-user1" src="img/user1.jpg" alt="Imagen de perfil">
                <div class="row">
                    <div class="col tex-perfil">
                        <p>Nombre: <strong>ElCapu</strong></p>
                        <p>País: <strong>Argentina</strong></p>
                    </div>
                    <div class="col tex-perfil">
                        <p>Puntos: <strong>250.065</strong></p>
                        <p>Partidas jugadas: <strong>1.860</strong></p>
                    </div>
                </div>
            </a>

            <p><strong>Distinciones:</strong></p>
            <div class="awards">
                <img class="img-awards" src="img/copa-1.png" alt="">
                <img class="img-awards" src="img/medal.png" alt="">
                <img class="img-awards" src="img/winner.png" alt="">
                <img class="img-awards" src="img/winner.png" alt="">
            </div>
        </section>

        <section class="rigth col-md-8">

            <!-- ///////////////// LISTA DE TANKING ///////////////-->
            <div class="list-group">
                <a href="perfil.php" class="list-group-item list-group-item-action">
                    <strong class="puesto">2°</strong> <img class="img-user" src="img/user2.svg" alt=""> Eugenia
                    <div class="distinciones">
                        <img class="img-user2" src="img/copa.png" alt="">
                        <img class="img-user2" src="img/copa.png" alt="">
                        <img class="img-user2" src="img/copa.png" alt="">
                        <img class="img-user2" src="img/medal.png" alt="">
                        <img class="img-user2" src="img/medal.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>200.265 Puntos</strong>
                    </div>
                </a>
                <a href="perfil.php" class="list-group-item list-group-item-action list-group-item-primary"><strong
                    class="puesto">3°</strong> <img class="img-user" src="img/user1.svg" alt="">Rauel
                    <div class="distinciones">
                        <img class="img-user2" src="img/copa.png" alt="">
                        <img class="img-user2" src="img/medal.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>198.155 Puntos</strong>
                    </div>
                </a>
                <a href="perfil.php" class="list-group-item list-group-item-action list-group-item-secondary"><strong
                    class="puesto">4°</strong> <img class="img-user" src="img/user1.svg" alt="">Pepe
                    <div class="distinciones">
                        <img class="img-user2" src="img/copa.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>168.135 Puntos</strong>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-success"><strong
                    class="puesto">5°</strong> <img class="img-user" src="img/user2.svg" alt="">Estrella
                    <div class="distinciones">
                        <img class="img-user2" src="img/copa.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>120.265 Puntos</strong>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-danger"><strong
                    class="puesto">6°</strong> <img class="img-user" src="img/user1.svg" alt="">Nando
                    <div class="distinciones">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>102.158 Puntos</strong>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-warning"><strong
                    class="puesto">7°</strong> <img class="img-user" src="img/user1.svg" alt="">Juancho
                    <div class="distinciones">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>98.856 Puntos</strong>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-info"><strong
                    class="puesto">8°</strong> <img class="img-user" src="img/user2.svg" alt="">Leila
                    <div class="distinciones">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <img class="img-user2" src="img/winner.png" alt="">
                        <strong>65.953 Puntos</strong>
                    </div>
                </a>
            </div>

            <!-- ///////////////// PAGINACION ///////////////-->
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Próximo</a>
                    </li>
                </ul>
            </nav>

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
