<?php
$logged = isset($_SESSION['login']);
 ?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">QUESTION RACE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
 </button>


 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="juego.php"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">HOME</a>
        </li>
        <?php if($logged){
          echo '<li class="dropdown__toggler"><img src="images/users/'. $_SESSION['user']['user_pic'] .'" class="thumbnail-user"/><a>' . $_SESSION['user']['user_name'] . '</a>
                  <div class="dropdown__box">
                    <a href="user.php" class="dropdown__link">Ver perfil</a>
                    <a href="logout.php" class="dropdown__link">Cerrar sesión</a>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">JUGAR</a>
                    </li>
                  </div>
                </li>';
        }else {
          echo '<li><a href="./login.php">Entrar</a></li>
                <li><a href="./register.php">Registrarse</a></li>';
        } ?>
        <li class="nav-item">
            <a class="nav-link" href="ranking-de-usuarios.php">RANKING</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="preguntas-frecuentes.php">AYUDA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contacto.php">CONTACTO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin.php">ADMIN</a>
        </li>

    </ul>
 </div>
 

 </nav>
