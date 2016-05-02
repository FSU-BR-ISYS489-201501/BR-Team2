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
$error='';

if (isset($_POST['journalUpdate'])) {
	if (empty($_POST['journalID']) || ($_POST['journalStatus'] == 0)) {
		$journalError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Please fill out all required information.</p>";
	} else {
		$journalID=$_POST['journalID'];
		$journalStatus=$_POST['journalStatus'];
		$tic = 1;
		$del = NULL;
		// To protect MySQL injection for Security purpose
		$journalID = stripslashes($journalID);
		$journalStatus = stripslashes($journalStatus);
		//DBConnect	
		$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
		$username = "T2BRGOLIVE";
		$password = "B1G70N@";
		//Attempts to connect to DB
		try{
			$dbConnect = new PDO($dbConnect, $username, $password);
		}
		catch (PDOException $error) {
			echo 'Error Connecting: ' . $error->getMessage();
		}

		//Selects all from the jounral table where the journal ID equals the posted ID
		$journalChk = $dbConnect->prepare("SELECT * FROM `journal` WHERE `journalID`=:journalID");
		$journalChk->bindValue(":journalID", $journalID);
		$journalChk->execute();
		//Results of the select statament are counted and stored in $rowsTest
		$rowsTest = $journalChk->rowCount();
		
		//If the returned row count is equal to 1 then the following happens
		if ($rowsTest == 1) {
			if($journalStatus == 1){
				//The jounrals displayed status is set to 1  where the posted ID equals the ID in the table
				$journalDisplay = $dbConnect->prepare("UPDATE `journal` SET `displayed`=:tic WHERE `journalID`=:journalID");
				$journalDisplay->bindValue(":journalID", $journalID);
				$journalDisplay->bindValue(":tic", $tic);
				$journalDisplay->execute();
			} else if($journalStatus == 2){
				//The jounrals displayed status is set to NULL where the posted ID equals the ID in the table
				$journalHide = $dbConnect->prepare("UPDATE `journal` SET `displayed`=:del WHERE `journalID`=:journalID");
				$journalHide->bindValue(":journalID", $journalID);
				$journalHide->bindValue(":del", $del);
				$journalHide->execute();
			} 
		} else {
			//Throws error if the posted ID doesnt exist in the table
			$journalError = "<br /><p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Journal Doesnt Exists</p>";
		}
	}
}
?>