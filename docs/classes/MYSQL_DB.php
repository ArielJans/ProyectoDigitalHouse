<?php
include_once 'classes/DB.php';

class MYSQL_DB implements DB {
  private $dsn = "mysql:host=127.0.0.1;dbname=mydb;port=3306;charset=utf8";
  private $user = "root";
  private $pass = "";
  private $con;

  public function __construct()
  {
    $this->con = new PDO($this->dsn, $this->user, $this->pass);
  }

  public function getCon()
  {
    return $this->con;
  }

  public function getUsers()
  {

  }

  public function findUser($requestedUser)
  {
    $stmt = $this->con->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindValue(":email", $requestedUser, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return $user;
    }else{
      return FALSE;
    }
  }

  public function addUser($data)
  {
    $stmt = $this->con->prepare("INSERT INTO user(email,password, user_pic, user_name)
                                  VALUES (:email, :password, :user_pic, :user_name)");
    $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
    $stmt->bindValue(":password", $data['password'], PDO::PARAM_STR);
    $stmt->bindValue(":user_pic", $data['user_pic'], PDO::PARAM_STR);
    $stmt->bindValue(":user_name", $data['user_name'], PDO::PARAM_STR);

    if (!$stmt->execute()) {
      Echo "Hubo un error al cargar el usuario, intente de nuevo más tarde";
    }
  }


  public function updateUser_email($email, $id)
  {
    $stmt = $this->con->prepare("UPDATE user SET email = :email WHERE id = :id");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_userName($userName, $id)
  {
    $stmt = $this->con->prepare("UPDATE user SET user_name = :user_name WHERE id = :id");
    $stmt->bindValue(":user_name", $userName, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }


  public function updateUser_userPic($userPic, $id)
  {
    $stmt = $this->con->prepare("UPDATE user SET user_pic = :user_pic WHERE id = :id");
    $stmt->bindValue(":user_pic", $userPic, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_password($password, $id)
  {
    $stmt = $this->con->prepare("UPDATE user SET password = :password WHERE id = :id");
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

}
