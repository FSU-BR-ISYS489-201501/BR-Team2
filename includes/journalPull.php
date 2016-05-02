<?php
/*
Last Edited: Date 4/29/2016
Attribution:	
	Created By: Tyler Newton & Erik Obodzinski
	Edited by: Tyler Newton & Erik Obodzinski
	
Description:
	This page controlls the journals displayed to the public based on the journals display status.
*/
session_start(); 

$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
$username = "T2BRGOLIVE";
$password = "B1G70N@";

$check = 1;

try{ //try database connection
	$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
} catch (PDOException $error) { //error handling
	echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
}

//Selects all journal information where the displayed status is set to 1
$journal = $dbConnect->prepare("SELECT * FROM `journal` WHERE `displayed`=:check ORDER BY `datePublished` DESC"); //Selects all journals currently set to display and orders by most recent date published.
$journal->bindValue(":check", $check);
$journal->execute();

//echos all journals file locations, title and date based on its dipsplayed status
foreach ($journal as $row) { //Displays title, startDate, endDate from announcement table from database	
	$date = $row["datePublished"];
	$year = substr($date, 0, 4); 
		
	echo '<center><div class="row">';
	echo '<h4><a href="'.$row["fileLocation"].'" >'.$row["title"].'</a></h4>';
	echo '</div></center>';
	echo '<br>';
}

?>