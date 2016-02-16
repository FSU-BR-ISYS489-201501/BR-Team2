<?php
DEFINE ('DB_USER', 'swenort');
DEFINE ('DB_PASSWORD', 'JCI2SS@$');
DEFINE ('DB_HOST', '107.180.54.172');
DEFINE ('DB_NAME', 'br_t2_jci');

//107.180.54.172
//T2BRGOLIVE
//B1G70N@
// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');


?>