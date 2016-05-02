<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
	This page is where the User's user type is determined via a security check, their privTotal will 
	determine appropriate privledges and redirect to 'Author' page
*/
session_start();
include('mysqli_connect.php');//includes database connect
$loginError=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {//if submit button is clicked
if (empty($_POST['email']) || empty($_POST['hash'])) {//validation for empty email or hash
	$loginError = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Email or Password is invalid</p>";//Login Unsuccessful
}else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){//confirms that an actual valid email is input
	$loginError = "<br /><p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please enter a valid email address</p>";//Email input invalid	
}else{
	
// Define $username and $password
$email=$_POST['email'];
$hash=md5($_POST['hash']);
//$connection = mysql_connect("localhost", "T2BRGOLIVE", "B1G70N@");
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$hash = stripslashes($hash);
	
$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
$username = "T2BRGOLIVE";
$password = "B1G70N@";

try{ //try database connection
	$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
} catch (PDOException $error) { //error handling
	echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
}
//User table select
$query = $dbConnect->prepare("SELECT * FROM `user` WHERE `hash`=:hash AND `email`=:email");//I want to see all existing users from database where hash and email match php variables
$query->bindValue(":hash", $hash);//associate database hash attribute to php variable
$query->bindValue(":email", $email);//associate database email attribute to php variable
$query->execute();//execute query

$rows = $query->rowCount();
if ($rows == 1) {
		session_start(); // Starting Session
		$_SESSION['login_user']=$email; // Initializing Session
	
		$privEmail = ($_SESSION['login_user']);////associate email security check with user session

		//Author security check and User table select
		$chkAuth = $dbConnect->prepare("SELECT `author` FROM `user` WHERE `email`=:privEmail"); //I want to see all existing 'Author' users from database where email matches email security check
		$chkAuth->bindValue(":privEmail", $privEmail);//associate email security check
		$chkAuth->execute();//execute query
	
		$authPriv = $chkAuth->fetch(PDO::FETCH_ASSOC);//stores MySQL query results
		$authPriv = $authPriv['author'];//user is 'Author'
		//Reviewer security check and User table select
		$chkRevi = $dbConnect->prepare("SELECT `reviewer` FROM `user` WHERE `email`=:privEmail"); //I want to see all existing 'Reviewer' users from database where email matches email security check
		$chkRevi->bindValue(":privEmail", $privEmail);//associate email security check
		$chkRevi->execute();//execute query
	
		$reviPriv = $chkRevi->fetch(PDO::FETCH_ASSOC);//stores MySQL query results
		$reviPriv = $reviPriv['reviewer'];//user is 'Reviewer'
		//BigE security check and User table select
		$chkBigE = $dbConnect->prepare("SELECT `bigEditor` FROM `user` WHERE `email`=:privEmail"); //I want to see all existing 'BigEditor' users from database where email matches email security check
		$chkBigE->bindValue(":privEmail", $privEmail);//associate email security check
		$chkBigE->execute();//execute query
	
		$bigEPriv = $chkBigE->fetch(PDO::FETCH_ASSOC);//stores MySQL query results
		$bigEPriv = $bigEPriv['bigEditor'];//user is 'Big Editor', Tim Brotherton
		//BigE security check and User table select
		$chkLilE = $dbConnect->prepare("SELECT `littleEditor` FROM `user` WHERE `email`=:privEmail"); //I want to see all existing 'LittleEditor' users from database where email matches email security check
		$chkLilE->bindValue(":privEmail", $privEmail);//associate email security check
		$chkLilE->execute();//execute query
	
		$lilEPriv = $chkLilE->fetch(PDO::FETCH_ASSOC);//stores MySQL query results
		$lilEPriv = $lilEPriv['littleEditor'];//user is 'Little Editor'
		//BigE security check and User table select
		$chkIntern = $dbConnect->prepare("SELECT `intern` FROM `user` WHERE `email`=:privEmail"); //I want to see all existing 'Intern' users from database where email matches email security check
		$chkIntern->bindValue(":privEmail", $privEmail);//associate email security check
		$chkIntern->execute();//execute query
	
		$internPriv = $chkIntern->fetch(PDO::FETCH_ASSOC);//stores MySQL query results
		$internPriv = $internPriv['intern'];//user is 'Intern'
		//Security Total 
		$privTotal = ($authPriv + $reviPriv + $bigEPriv + $lilEPriv + $internPriv);
		$_SESSION['secureLevel'] = $privTotal;//determines security level for user
		header('Location: ../authorHome.php'); // Redirecting To Home Page
} else {
$loginError = "<br /><p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Email or Password is invalid</p>";//Login unsuccessful
}

}
}

?>