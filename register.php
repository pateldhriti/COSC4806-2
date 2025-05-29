<?php
require_once('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = new User();
  $result = $user->create_user($username, $password);

  echo $result;
}

?>

<form method = "post">
  Username: <input type="text" name="username"><br>  
  Password: <input type="password" name="password"><br>
  <button type="submit"> Register </button>
    
</form>