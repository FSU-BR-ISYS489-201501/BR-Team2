<?php
	/*
	Last Edited: Date 4/26/2016
	
	Attribution:	
		Created By: Erik Obodzinski	& php.net
		
	Description:
		This page is meant to send an email to the original author to let them know that a new review has been submitted.
	*/
	
	//set the recipient address
	$to = $_SESSION['address'];
	//set message subject
	$subject = "Files ready for approval - SFCRJCI";
	//set message text
	$txt = $_SESSION['message'] . "New files have been uploaded and need to be approved for the case: " . $_SESSION['case_title']. " - " . date("Y/m/d");
	mail($to,$subject,$txt);
	//alert that the message and upload has been successfully sent
	echo "<script language='javascript'>\n";
	echo "alert('".$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/reviewerHome.php';";
	echo "</script>\n";
	
?>
