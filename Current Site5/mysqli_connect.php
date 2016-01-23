<?php
DEFINE ('DB_USER', 'isys489c_swenort');
DEFINE ('DB_PASSWORD', '6Wn[?*=pGtDz');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'isys489c_BT2-JCI');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


// Check connection
//if (!$dbc) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
?>