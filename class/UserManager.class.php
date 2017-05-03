<?php
class UserManager{
  private $db;

  public function __construct($db){
    $this->set_db($db);
  }

  public function get_db(){
    return $this->db;
  }

  public function set_db($db){
    $this->db = $db;
  }


  public function read_user($email){
    $query = "SELECT *".
             " FROM user".
             " WHERE email = :email";

    $req = $this->get_db()->prepare($query);
    $req->bindValue('email', $email, PDO::PARAM_STR);
    $result = $req->execute();
    if(!$result){
      throw new Exception($req->errorInfo(),900);
    }else{
      $data = $req->fetch(PDO::FETCH_ASSOC);
      if(!$data){
        return null;
      }
      $user = new User();
      $user->set_email($data['email']);
      $user->set_surname($data['surname']);
      $user->set_name($data['name']);
      return $user;
    }
  }

  public function create_user(User $user){
    $query = "INSERT INTO user(email,name,surname) VALUES(:email,:name,:surname)";

    $req = $this->get_db()->prepare($query);
    $req->bindValue('email', $user->get_email(), PDO::PARAM_STR);
    $req->bindValue('name', $user->get_name(), PDO::PARAM_STR);
    $req->bindValue('surname', $user->get_surname(), PDO::PARAM_STR);
    $result = $req->execute();
    if(!$result){
      throw new Exception($req->errorInfo()[2],900);
    }else{
      if ($req->rowCount() > 0){
        return true;
      }
      return false;
    }
  }

}

 ?>
