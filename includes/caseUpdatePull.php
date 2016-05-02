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

if (isset($_POST['caseUpdate'])) {
	if (empty($_POST['fcaseID']) || ($_POST['caseStatus'] == 0)) {
		$journalError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Please fill out all required information.</p>";
	} else {
		$fcaseID=$_POST['fcaseID'];
		$caseStatus=$_POST['caseStatus'];
		$tic = 1;
		$del = NULL;
		// To protect MySQL injection for Security purpose
		$fcaseID = stripslashes($fcaseID);
		$caseStatus = stripslashes($caseStatus);
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
		$journalChk = $dbConnect->prepare("SELECT * FROM `finalCase` WHERE `fcaseID`=:fcaseID");
		$journalChk->bindValue(":fcaseID", $fcaseID);
		$journalChk->execute();
		//Results of the select statament are counted and stored in $rowsTest
		$rowsTest = $journalChk->rowCount();
		
		//If the returned row count is equal to 1 then the following happens
		if ($rowsTest == 1) {
			if($caseStatus == 1){
				//The jounrals displayed status is set to 1  where the posted ID equals the ID in the table
				$journalDisplay = $dbConnect->prepare("UPDATE `finalCase` SET `displayed`=:tic WHERE `fcaseID`=:fcaseID");
				$journalDisplay->bindValue(":fcaseID", $fcaseID);
				$journalDisplay->bindValue(":tic", $tic);
				$journalDisplay->execute();
			} else if($caseStatus == 2){
				//The jounrals displayed status is set to NULL where the posted ID equals the ID in the table
				$journalHide = $dbConnect->prepare("UPDATE `finalCase` SET `displayed`=:del WHERE `fcaseID`=:fcaseID");
				$journalHide->bindValue(":fcaseID", $fcaseID);
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