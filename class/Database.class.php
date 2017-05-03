<?php
class Database{
  private $host     = 'localhost';
  private $dbname   = "bio-gardin";
  private $username = "root";
  private $password = "";

  public function get_host(){
    return $this->host;
  }
  public function get_dbname(){
    return $this->dbname;
  }
  public function get_username(){
    return $this->username;
  }
  public function get_password(){
    return $this->password;
  }

  public function login(){
    try{
      $db = new PDO('mysql:host='.$this->get_host().';dbname='.$this->get_dbname(),$this->get_username(),$this->get_password());
      $db->exec("SET CHARACTER SET utf8");
      return $db;
    }catch (PDOException $e){
      echo 'Echec lors de la connexion : '.$e->getMessage();
    }
    return null;
  }


}

 ?>
