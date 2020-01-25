<?php
$logged = isset($_SESSION['login']);
 ?>
 <nav id="nav" class="">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <?php if($logged){
          echo '<li class="dropdown__toggler"><img src="images/users/'. $_SESSION['user']['user_pic'] .'" class="thumbnail-user"/><a>' . $_SESSION['user']['user_name'] . '</a>
                  <div class="dropdown__box">
                    <a href="user.php" class="dropdown__link">Ver perfil</a>
                    <a href="logout.php" class="dropdown__link">Cerrar sesión</a>
                  </div>
                </li>';
        }else {
          echo '<li><a href="./login.php">Entrar</a></li>
                <li><a href="./register.php">Registrarse</a></li>';
        } ?>
        <li><a href="./productos.php">Productos</a></li>
        <li><a href="./carrito.php">Carrito</a></li>
        <li><a href="./faq.php"><p>FAQ</p></a></li>
      </ul>
      <form action="index2.php" class="search-form" id="search-form">
        <input type="text" id="search" class="search-field" name="search" placeholder="Search">
        <button type="submit" name="button"></button>
      </form>
    </nav>
