<?php
					/*
					Last Edited: Date 4/23/2016
					Attribution: Mail function http://www.w3schools.com/php/func_mail_mail.asp
					Created By: Josh Stocking
		
					Description:
					This page is the pull that is called from the contactUs page. It sends an email to jci@ferris.edu.
					*/

// if the email button is clicked					
if (isset($_POST['sendEmail'])) {
	//check if all fields are filled
	if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['message'])){
			$alert = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please fill out all required information. </p>";
			print $error; // print an error to the screen if they are not set
		} else {
			// fields are set then send the email
			$to      = 'jci@ferris.edu';
			$subject = 'JCI Help Request';
			$message = $_POST['message'];
			$headers = 'From: ' . $_POST['email'] . "\r\n" . "Requestor: " . $_POST['fullName'] . "\r\n";
			mail($to, $subject, $message, $headers);
			$alert = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Message Sent. </p>";  // Email Verification	
		}
}

?>