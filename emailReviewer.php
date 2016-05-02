<?php
	/*
	Last Edited: Date 4/26/2016
	
	Attribution:	
		Created By: Erik Obodzinski	& php.net
		
	Description:
		This page is meant to send an email to the original author to let them know that a new review has been submitted.
	*/
	
	//set the recipient address
	$to = $_SESSION['reviewerID'];
	//set message subject
	$subject = "New case for review - SFCRJCI";
	//set message text
	$txt = $_SESSION['message'] . "You have been requested to review the case: " . $_SESSION['case_title']. ". This is as of todays date, " . date("Y/m/d"). ". If you are unable to review this class please email back jci@ferris.edu saying the case number and that it is not a possibility. If you can, log into sfcrjci.org and go to the reviewer tab to find the files! Thank you!";
	mail($to,$subject,$txt);
	//alert that the message and upload has been successfully sent
	echo "<script language='javascript'>\n";
	echo "alert('Request emailed to reviewer'); window.location.href='http://br-t2-jci.sfcrjci.org/reviewerHome.php';";
	echo "</script>\n";
	
?>
