<?php

require_once('config.php');

function db_connect() {
  try{
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USER, DB_PASS);
    return $dbh;
  
  }
    catch (PDOException $e) {
      error_log("Database connection failed: " . $e->getMessage());
      
      die("Database is currently unavailable. Please try again later.");
    
    }
}

?>