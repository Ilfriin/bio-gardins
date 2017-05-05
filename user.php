<?php

include_once('class/User.class.php');
include_once('class/UserManager.class.php');
include_once('class/Database.class.php');

$db = new Database();
$link = $db->login();
$user_manager = new Usermanager($link);
// $user = new User('test.mail2@yopmail.com', 'testname2', 'testsurname2', false, true);
// $user_manager->create_user($user);

// $user = $user_manager->read_user('test.mail@yopmail.com');
// print_r($user);

$users = $user_manager->read_all();

print_r($users);
