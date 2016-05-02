<?php
	/*
	Last Edited: Date 5/1/2016
	
	Attribution:	
		Created By: Erik Obodzinski	& php.net
		
	Description:
		This page is meant to send an email to the original author to let them know that a new review has been submitted.
	*/
	
	//set the recipient address
	$to = "jci@ferris.edu";
	//set message subject
	$subject = "Files ready for approval - SFCRJCI";
	//set message text
	$txt = "New files have been uploaded and need to be approved for the case: " . $_SESSION['case_title']. " - " . date("Y/m/d");
	mail($to,$subject,$txt);
	//alert that the message and upload has been successfully sent

	
?>
