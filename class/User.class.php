<?php
class User{
  private $email_address;
  private $name;
  private $surname;
  private $admin;
  private $member;

  public function get_email_address(){return $this->emailAddress;}
  public function get_name(){return $this->name;}
  public function get_surname(){return $this->surname;}
  public function get_admin(){return $this->admin:}
  public function get_member(){return $this->member:}

  public function set_email_address($email_address){
    $this->email = $email;
  }

  public function set_name($name){
    $this->name = $name;
  }

  public function set_surname($surname){
    $this->surname = $surname;
  }

  public function set_member($member){
    $this->member = $member;
  }

}
 ?>
