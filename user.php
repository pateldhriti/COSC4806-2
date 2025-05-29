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

  $check_stmt = $db->prepare("SELECT * FROM users WHERE username = :username;");
  $check_stmt->bindParam(':username', $username);
  $check_stmt->execute();

  if ($check_stmt->rowCount() > 0) {
    return "Username already exists.";
  }


  if (strlen($password) < 8) || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
    return "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
  }

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    return "User created successfully.";
  }
}