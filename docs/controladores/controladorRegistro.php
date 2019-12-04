<?php

$errores = [];
$nombre = "";
$email = "";

//function printError($eseDato){
//  if()
//}

    if($_POST){
        //Validadar input nombre
        if (isset($_POST['nombre'])) {
            if(empty($_POST['nombre'])) {
                $errores['nombre'] = "Completar este campo";
        }elseif (strlen($_POST['nombre']) < 2) {
            $errores['nombre'] = "El nombre tiene que tener mas de dos caracteres";
        }else {
            $nombre = $_POST['nombre'];
        }
    }
}
    //////// Validadar email /////////////
    if (isset($_POST['email'])) {
        if(empty($_POST['email'])) {
                $errores['email'] = "Completar este campo con un email valido";
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "El email tiene que tener @ y .com";
        }
    }

    //////// Validadar input pass /////////////

    if (isset($_POST['pass'])){
        if (empty($_POST['pass'])) {
            $errores['pass'] = "La contraseña debe tener mas de seis caracteres";
        }
    }

    if (isset($_POST['repass'])) {
        if (empty($_POST['repass'])) {
            $errores['repass'] = "Este campo tiene que estar lleno";
        }

        if ($_POST['pass'] != $_POST['repass']) {
            $errores['repass'] = "La contraseña debe ser igual a la anterior";
        }
    }

    if(count($errores) === 0){
        $elUsuario = [
            'nombre' => trim($nombre),
            'email' => $email,
            'pass' => $password_hash($_POST['pass'], PASSWORD_DEFAULT)
        ];
    }

?>