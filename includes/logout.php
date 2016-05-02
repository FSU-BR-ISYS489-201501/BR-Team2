<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
	Session is ended and the user is redirected to the home page.
*/
	session_start();
	session_unset();
	
	if(session_destroy()) // Destroying All Sessions
		{
		header("Location: ../index.php");
		// Redirecting To Home Page
	}

?>
