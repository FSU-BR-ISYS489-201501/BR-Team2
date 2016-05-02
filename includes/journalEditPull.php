<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
	This page controlls a published journals visibilty status.
*/
session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['journalEdit'])) {
if (empty($_POST['journalID']) || ($_POST['approveDeny'] == 0)) {
	//Throws error if a required feild is left empty
	$journalError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Please fill out all required information.</p>";
}else{ 
	//Declasres variables needed
	$journalID=$_POST['journalID'];
	$approveDeny=$_POST['approveDeny'];
	$tic = 1;
	$del = 0;
	// To protect MySQL injection for Security purpose
	$subID = stripslashes($journalID);
	$approveDeny = stripslashes($approveDeny);
	
	//DBConnect	
	$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
	$username = "T2BRGOLIVE";
	$password = "B1G70N@";
	
	//Attempts to connect to DB
	try{
		$dbConnect = new PDO($dbConnect, $username, $password);
	}catch (PDOException $error) {
		echo 'Error Connecting: ' . $error->getMessage();
	}
	
	//If approveDeny varaible is equal to 1 then update the displayed statsus in DB to 1 
	if($approveDeny == 1){
		$dispJournal = $dbConnect->prepare("UPDATE `journal` SET `displayed`=:tic WHERE `journalID`=:journalID");
		$dispJournal->bindValue(":journalID", $journalID);
		$dispJournal->bindValue(":tic", $tic);
		$dispJournal->execute();
	//If approveDeny varaible is equal to 2 then update the displayed statsus in DB to NULL
	}else if($approveDeny == 2){
		$hideJournal = $dbConnect->prepare("UPDATE `journal` SET `displayed`=:del WHERE `journalID`=:journalID");
		$hideJournal->bindValue(":journalID", $journalID);
		$hideJournal->bindValue(":del", $del1);
		$hideJournal->execute();
	}else{
		//Throws error if Journal ID doesnt exist
		$journalError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Journal ID Error</p>";	
	}
	
}
}

?>