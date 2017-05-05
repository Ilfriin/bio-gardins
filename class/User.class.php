<?php
class User{
  private $email_address;
  private $name;
  private $surname;
  private $admin;
  private $member;

  public function __construct($email_address, $name, $surname, $admin, $member){
    $this->set_email_address($email_address);
    $this->set_name($name);
    $this->set_surname($surname);
    $this->set_admin($admin);
    $this->set_member($member);
  }

  public function get_email_address(){return $this->email_address;}
  public function get_name(){return $this->name;}
  public function get_surname(){return $this->surname;}
  public function get_admin(){return $this->admin;}
  public function get_member(){return $this->member;}

  public function set_email_address($email_address){
    $this->email_address = $email_address;
  }

  public function set_name($name){
    $this->name = $name;
  }

  public function set_surname($surname){
    $this->surname = $surname;
  }

  public function set_admin($admin){
    $this->admin = $admin;
  }

  public function set_member($member){
    $this->member = $member;
  }

}
 ?>
