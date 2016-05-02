<?php
	/*
	Last Edited: Date 4/26/2016
	Attribution:	
		Created By: Josh Stocking, Erik Obozinski, Chad Marshall, and php.net
		Edited By: Erik Obodzinski		
	Description:
		This page is meant to pull all of the assignedCase reviews for the iFrame on the reviewerHome
	*/
	
	
	session_start();
	
	//include DB connection
	include( "../../mysqli_connect.php");

	
	//locates ftp destination to get files based on id
	$sth = $dbConnect->prepare("SELECT `fileLocation` FROM `case` WHERE `caseID`=:id");
	$sth->bindValue(":id", $_SESSION['folder']);
	$sth->execute();
	
	//sets location for review files from DB
	$location = $sth->fetchColumn();
	$subLink ="Case-" . $_SESSION['folder'] . "/Reviews";
	$link = "../$location/Reviews";
	$shortLink= $link;
	
	//opens connection to ftp folder
	if ($handle = opendir($link)) {
						while (false !== ($file = readdir($handle))) {
							if ($file != "." && $file != "..") {
									$extension = pathinfo($file, PATHINFO_EXTENSION);									
									if ($extension == ('docx')) {
									$link = "../$shortLink/$file";
									array_push($array, $file);
									//sets link for each file found and stores it into an array
									$thelist .= '<a href="'.$link.'">'.$file.'</a><br>';
									}
							}
							
						}
						//closes the directory connection
						closedir($handle);
						echo $thelist;
						
	}

?>