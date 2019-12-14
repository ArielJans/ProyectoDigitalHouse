<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">QUESTION RACE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


<?php 
if(isset($_COOKIE["emailusuario"])){ session_start();
?>

<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="juego.php"><?php echo "Bienvenido, " . $_SESSION["nombre"] . "!"; ?></a>
        </li>
                <li class="nav-item">
            <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ranking-de-usuarios.php">RANKING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contacto.php">CONTACTO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="preguntas-frecuentes.php">AYUDA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin.php">ADMIN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="despedida.php">CERRAR SESION</a>
        </li>

    </ul>
</div>
<?php 
}else{ setcookie("emailusuario", "", -1); ?>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="login.php">JUGAR</a>
        </li>
                <li class="nav-item">
            <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ranking-de-usuarios.php">RANKING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contacto.php">CONTACTO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="preguntas-frecuentes.php">AYUDA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin.php">ADMIN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">INGRESAR</a>
        </li>

    </ul>
</div>
<?php }?>

</nav>
