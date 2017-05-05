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


  public function create_user(User $user){
    $query = "INSERT INTO user(email_address, name, surname, admin, member)";
    $query .= "VALUES(:email_address,:name,:surname, :admin, :member)";

    $req = $this->get_db()->prepare($query);
    $req->bindValue('email_address', $user->get_email_address(), PDO::PARAM_STR);
    $req->bindValue('name', $user->get_name(), PDO::PARAM_STR);
    $req->bindValue('surname', $user->get_surname(), PDO::PARAM_STR);
    $req->bindValue('admin', $user->get_admin(), PDO::PARAM_INT);
    $req->bindValue('member', $user->get_member(), PDO::PARAM_INT);
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

  public function read_user($email_address){
    $query = "SELECT *".
             " FROM user".
             " WHERE email_address = :email_address";

    $req = $this->get_db()->prepare($query);
    $req->bindValue('email_address', $email_address, PDO::PARAM_STR);
    $result = $req->execute();
    if(!$result){
      throw new Exception($req->errorInfo(),900);
    }else{
      $data = $req->fetch(PDO::FETCH_ASSOC);
      if(!$data){
        return null;
      }
      $user = new User($data['email_address'], $data['name'], $data['surname'], $data['admin'], $data['member']);
      return $user;
    }
  }

  public function read_all(){
    $query = "SELECT *";
    $query .= " FROM user";

    $req = $this->get_db()->prepare($query);
    $result = $req->execute();
    if(!$result){
      throw new Exception($req->errorInfo(), 900);
    }else{
      $datas = $req->fetchAll(PDO::FETCH_ASSOC);
      if(!$datas){
        return array();
      }
      $users = array();
      foreach ($datas as $data) {
        $user = new User($data['email_address'], $data['name'], $data['surname'], $data['admin'], $data['member']);
        array_push($users, $user);
      }
      return $users;
    }
  }

}

 ?>
