<?php
include('../mysqli_connect.php');

$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("test", $connection);

$query = mysql_query("select * from test where password='$password' AND firstName='$username'", $connection);