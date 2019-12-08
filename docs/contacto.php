<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/contacto.css">
</head>

    <header>
        <?php include("funciones/navbar.php");?>
</header>

<body>
    <!-- <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.html">QUESTION RACE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="login.html">JUGAR<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ranking-de-usuarios.html">RANKING</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="contacto.html">CONTACTO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="preguntas-frecuentes.html">AYUDA</a>
              </li>
            </ul>
          </div>
        </nav>
      </header> -->
      
<main>
  <div class="container" id="a">
    <section class="row">
      <div class="col-12" id="espacio">
        <form>
          <h1>Contacto</h1>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="subnombres">Ingrese su nombre:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="subnombres">Ingrese su correo electronico:</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@dominio.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1" class="subnombres">Ingrese su mensaje:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="mensaje"></textarea>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
          </div>
        </form>
      </div>
    </section>

  </main>

  <footer class="container-fluid bg-inverse">
    <div class="row text-white py-4 text-white">
        <div class="col-md-3">
            <img src="img/medal.png" class="float-left mr-3 imgfoter" alt="#">
            <h4 class="namber">QUESTION RACE</h4>
            <div class="blockquote-footer">Todos los derechos reservados <cite title="Source Title">2019</cite>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="lead">Lorem ipsum</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, fugit?</p>
        </div>
        <div class="col-md-3">
            <h4 class="lead">Lorem ipsum</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, quidem!</p>
        </div>
        <div class="col-md-3">
            <h4 class="lead">Síguenos</h4>
            <a href="#"><span class="badge badge-primary">Facebook</span></a>
        </div>
    </div>
</footer>


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