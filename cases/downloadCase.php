<?php
	session_start();
	
	$array = array();
	$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
	$username = "T2BRGOLIVE";
	$password = "B1G70N@";

	try{
		$dbConnect = new PDO($dbConnect, $username, $password);
	} catch (PDOException $error) {
		echo 'Error Connecting: ' . $error->getMessage();
	}

	
	//locates ftp destination to get files based on id
	$sth = $dbConnect->prepare("SELECT `fileLocation` FROM `case` WHERE `caseID`=:id");
	$sth->bindValue(":id", $_SESSION['folder']);
	$sth->execute();
	
	//fetches user id based on email and returns id
	$location = $sth->fetchColumn();
	$subLink ="Case-" . $_SESSION['folder'];
	$link = "../$location";
	$shortLink= substr($link, 0, -1);
	
	if ($handle = opendir($link)) {
						while (false !== ($file = readdir($handle))) {
							if ($file != "." && $file != "..") {
									$extension = pathinfo($file, PATHINFO_EXTENSION);									
									if ($extension == ('docx')) {
									$link = "../$shortLink/$file";
									array_push($array, $file);
									$thelist .= '<a href="'.$link.'">'.$file.'</a><br>';
									}
							}
							
						}
						closedir($handle);
						echo $thelist;
						
	}

?>