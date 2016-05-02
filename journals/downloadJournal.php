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

	$sth = $dbConnect->prepare("SELECT `userID` FROM `user` WHERE `email`=:email");
	$sth->bindValue(":email", $_SESSION['login_user']);
	$sth->execute();

	//fetches user id based on email and returns id
	$result = $sth->fetchColumn();
	//locates ftp destination to get files based on id
	$link = "../journals";
	
	if ($handle = opendir($link)) {
						while (false !== ($file = readdir($handle))) {
							if ($file != "." && $file != "..") {
									$extension = pathinfo($file, PATHINFO_EXTENSION);									
									if ($extension == ('pdf')) {
									$link = "../journals/$file";
									array_push($array, $file);
									$thelist .= '<a href="'.$link.'">'.$file.'</a><br>';
									}
							}
							
						}
						closedir($handle);
						echo $thelist;
						
	}

?>
