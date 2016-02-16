<?php
$connection = mysql_connect("localhost", "isys489c_swenort", "6Wn[?*=pGtDz");
$servername = "localhost";
$username = "isys489c_swenort";
$password = "6Wn[?*=pGtDz";
$dbname = "isys489c_BT2-JCI";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

