<?php
class Activity{
  private $activity_id;
  private $title;
  private $activity_date;
  private $description;
  private $img_folder;

  public function get_id(){return $this->activity_id;}
  public function get_title(){return $this->title;}
  public function get_date(){return $this->activity_date;}
  public function get_description(){return $this->description;}
  public function get_img_folder(){return $this->img_folder;}

  public function set_activity_id($activity_id){
    $this->activity_id = $activity_id;
  }

  public function set_title($title){
    $this->title = $title;
  }

  public function set_activity_date($activity_date){
    $this->activity_date = $activity_date;
  }

  public function set_description($description){
    $this->description = $description;
  }

  public function set_img_folder($folder){
    $this->img_folder = $folder;
  }
}
?>
