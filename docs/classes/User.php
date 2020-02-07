<?php

class User {

  private $id;
  private $MYSQL_DB;
  private $JSON_DB;

  public function __construct($id = 0)
  {
    $this->id = $id;
    $this->MYSQL_DB = new MYSQL_DB();
    $this->JSON_DB = new JSON_DB();
  }

  public function register()
  {
    $picToken = bin2hex(random_bytes(5));
    $data = array(
      'user_name' => strstr($_POST['email'],'@',true),
      'email' => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      'user_pic' => $picToken . $_POST['email'] . "." . pathinfo($_FILES['userPic']['name'], PATHINFO_EXTENSION),
    );
    if ($_FILES['userPic']['error'] === 4) {
      $data['user_pic'] = "default-avatar.jpg";
    }

    move_uploaded_file($_FILES['userPic']['tmp_name'],"img/users/". $picToken . $_POST['email'] . "." . pathinfo($_FILES['userPic']['name'], PATHINFO_EXTENSION));

    $this->MYSQL_DB->addUser($data);
    $this->JSON_DB->addUser($data);
  }

  public function login($email, $pass, $remember)
  {
    if (!$user = $this->MYSQL_DB->findUser($email)) {
      return "Email y/o contraseña incorrectos";
    }
    if(password_verify($pass, $user['password'])){
      $_SESSION["login"] = true;
      $_SESSION["user"] = $user;
      if($remember){
        setcookie('login', 'true', time() + 60*60*24*30);
        setcookie('user', $user['email'], time() + 60*60*24*30);
      }
      header('Location: index.php');
    } else {
      return 'Email y/o contraseña incorrectos';
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function getMYSQL_DB()
  {
    return $this->MYSQL_DB;
  }
}
