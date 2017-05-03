<?php
class ActivityManager{
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

  public function createActivity(Activity $activity){
    $query = "INSERT INTO  activity(activity_id, activity_date, title, description, img_folder)";
    $query .= " VALUES(:activity_id, :activity_date, :title, :description, :img_folder)";

    $req = $this->get_db()->prepare($query);
    $req->bindValue('activity_id', $activity->get_id(), PDO::PARAM_STR);
    $req->bindValue('activity_date', $activity->get_date(), PDO::PARAM_STR);
    $req->bindValue('title', $activity->get_title(), PDO::PARAM_STR);
    $req->bindValue('description', $activity->get_description(), PDO::PARAM_STR);
    $req->bindValue('img_folder', $activity->get_img_folder(), PDO::PARAM_STR);
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
