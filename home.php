<?php
session_start();
	if(isset($_SESSION['login_user'])){
	}else{
		header("Location: ../index.php"); // Redirecting To Home Page
	}
?>
<?php # Script 12.13 - loggedin.php #3
// The user is redirected here from login.php.

// session_start(); // Start the session.

// If no session value is present, redirect the user:
// Also validate the HTTP_USER_AGENT!
//if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {

	// Need the functions:
//	require ('includes/login_functions.inc.php');
//	redirect_user();	

//}

// Set the page title and include the HTML header:
//$page_title = 'Logged In!';
?>
<?php require_once('includes/userHeader.php'); ?>
<?php require_once('memberFrame.php'); ?>
<?php require_once('includes/footer.php'); ?>