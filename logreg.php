<?php
$cookie_name = "loggedin";
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn)
{
  die("Database connection failed".mysqli_connect_error());
}
if (isset($_POST['login']))
{
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $phash = sha1(sha1($pass."salt")."salt");
  $sql = "SELECT * FROM records WHERE username = '$user' AND password = '$phash';";

  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count == 1)
  {
    $cookie_value = $user;
    setcookie($cookie_name, $cookie_value, time() + (180), "/");
    header("Location: personal.php");
  }
  else
  {
    echo "Username or Password is incorrect";
  }
}
else if (isset($_POST['register']))
{
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $phash = sha1(sha1($pass."salt")."salt");
  $sql = "INSERT INTO users (id, username, password) VALUES ('', '$user', '$phash');";
  $result = mysqli_query($conn, $sql);
}
 ?>
