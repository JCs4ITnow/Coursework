<?php
$cookie_name = "loggedin";
if (isset($_COOKIE[$cookie_name]))
{
  $cookie_value = $_COOKIE[$cookie_name];
  echo "welcome to your personal area £cookie_value";
  echo '<a href="logout.php">Logout</a>';
}
else
{
  echo "you are not logged in";
}
?>
