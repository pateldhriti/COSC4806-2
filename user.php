<?php

require_once('database.php');

Class User {

public function get_all_users(){
  $db = db_connect();
  $stmt = $db->prepare("SELECT * FROM users;");
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
  
}
  public function create_user($username, $password) {
    $db = db_connect();
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
  }
}