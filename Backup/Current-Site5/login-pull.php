<?php
include('../mysqli_connect.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "<br /> <p style='font-family:talo; color:red; margin-top:10px; font-size:16px;'>* Username or Password is invalid</p>";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$connection = mysql_connect("localhost", "isys489c_swenort", "6Wn[?*=pGtDz");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("isys489c_BT2-JCI", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from user where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
		$_SESSION['login_user']=$username; // Initializing Session
		header('Location: index.php');  
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>