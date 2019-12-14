<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Admin</title>
</head>

<body>
    <header>
        <?php include("funciones/navbar.php");?>
    </header>
    <main class="row">
        <section class="left col-md-4">
            <h1 class="name">Administrador 1</h1>
            <img src="img/perfil.jpg" alt="Imagen de perfil">
            <p>País: <strong>Argentina</strong></p>
            <p>Nivel de contribución: <strong>Alto</strong></p>
            <button type="button" class="btn btn-primary">Editar perfil</button>
        </section>
        <section class="rigth col-md-8">
            <!-- ///////////////// Button trigger modal ///////////////-->
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
            data-target="#ModalAgregarPregunta">
            Agregar Pregunta
        </button>
        <!-- ///////////////// LISTA DE PREGUNTAS ///////////////-->
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" data-toggle="modal"
            data-target="#ModalEditarPregunta">¿Este es un ejemplo de una pregunta ya redactada?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-primary" data-toggle="modal"
            data-target="#ModalEditarPregunta">¿Este es un ejemplo de una pregunta ya redactada?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">¿Este es un ejemplo
                de
            otra pregunta ya redactada?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-success">¿Este es un ejemplo
                de
            otra pregunta ya redactada?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">¿A simple danger list
            groupitem list group item?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-warning">¿A simple warning
                list
            group item?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-info">¿A simple info list
                group
            item?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-light">¿Agroupitem list group
                item
            simple light list group item?</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-dark">¿A simple dark list
                group
            item?</a>
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

<!-- ///////////////// MODAL ///////////////-->
<div class="modal fade" id="ModalAgregarPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crea una nueva pregunta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="message-text" class="col-form-label">Redactar pregunta:</label>
            <textarea class="form-control" id="message-text"></textarea>
            <label for="message-text" class="col-form-label">Respuesta opción 1:</label>
            <textarea class="form-control" id="message-text"></textarea>
            <label for="message-text" class="col-form-label">Respuesta opción 2:</label>
            <textarea class="form-control" id="message-text"></textarea>
            <label for="message-text" class="col-form-label">Respuesta opción 3:</label>
            <textarea class="form-control" id="message-text"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>
</div>

<!-- ///////////////// MODAL EDICION PREGUNTAS///////////////-->
<div class="modal fade" id="ModalEditarPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar/Eliminar pregunta:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="message-text" class="col-form-label">Editar pregunta:</label>
            <textarea class="form-control"
            id="message-text">¿Este es un ejemplo de una pregunta ya redactada?</textarea>
            <label for="message-text" class="col-form-label">Respuesta opción 1:</label>
            <textarea class="form-control"
            id="message-text">Este es un ejemplo de la primera respuesta ya redactada</textarea>
            <label for="message-text" class="col-form-label">Respuesta opción 2:</label>
            <textarea class="form-control"
            id="message-text">Este es un ejemplo de la segunda respuesta ya redactada</textarea>
            <label for="message-text" class="col-form-label">Respuesta opción 3:</label>
            <textarea class="form-control"
            id="message-text">Este es un ejemplo de la tercera respuesta ya redactada</textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger">Eliminar pregunta</button>
            <button type="button" class="btn btn-primary">Guardar edición</button>
        </div>
    </div>
</div>
</div>
<!-- ///////////////// FIN MODAL EDICION PREGUNTAS///////////////-->

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