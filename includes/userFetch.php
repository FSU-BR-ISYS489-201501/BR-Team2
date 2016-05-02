<?php
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
	$_SESSION['user'] = $result;
	?>