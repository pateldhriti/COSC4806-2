<?php

require_once('database.php');

Class User {

public function get_all_users(){
  $db = db_connect();
  $stmt = $db->prepare("SELECT * FROM users;");
  $stmt->execute();
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  return $rows;
  
}
  
}