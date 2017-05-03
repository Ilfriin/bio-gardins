<?php
require_once "config.php";
require_once "class/Activity.class.php";
require_once "class/ActivityManager.class.php";
require_once "class/Database.class.php";


$db = new Database();
$link = $db->login();
$activity = new Activity();
$activityManager = new ActivityManager($link);

$activity->set_id(uniqid());
$activity->set_date("2017-02-25");
$activity->set_title("test");
$activity->set_description("lorem ipsum dolor sit amet");
$activity->set_img_folder("img");

$activityManager->createActivity($activity);

 ?>
