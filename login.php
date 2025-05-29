<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $db = db_connect();
  $stmt = $db->prepare("SELECT * FROM users WHERE username = :username;");
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password'])) {
    echo "Login successful.";
  } else {
    echo "Invalid username or password.";
  }
}
?>

<form method="post">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Login</button>
</form>