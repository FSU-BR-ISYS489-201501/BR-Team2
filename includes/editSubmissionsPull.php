<?php
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
	This page is controlls when the editors downloads a case and where or not the case has been approved or denied.
*/
session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['submissionEdit'])) {
if (empty($_POST['subID']) || ($_POST['approveDeny'] == 0)) {
	//Polulates error variable 
	$subEdError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Please fill out all required information. </p>";
}else{ 
	//Posts and declares variables
	$subID=$_POST['subID'];
	$approveDeny=$_POST['approveDeny'];
	$tic = 1;
	$del = NULL;
	// To protect MySQL injection for Security purpose
	$subID = stripslashes($subID);
	$approveDeny = stripslashes($approveDeny);
	
	//DBConnect	
	$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
	$username = "T2BRGOLIVE";
	$password = "B1G70N@";

	//Attempts to connect to database
	try{
		$dbConnect = new PDO($dbConnect, $username, $password);
	}catch (PDOException $error) {
		echo 'Error Connecting: ' . $error->getMessage();
	}
	
	//Selects the download status of the posted case ID
	$downloadChk = $dbConnect->prepare("SELECT `downloadStatus` FROM `case` WHERE `caseID`=:subID");
	$downloadChk->bindValue(":subID", $subID);
	$downloadChk->execute();
	$downloadStatus = $downloadChk->fetchAll(PDO::FETCH_ASSOC);
	//Stores results of select statement in new variable
	$tempStat = $downloadStatus[0]['downloadStatus'];
	
	//Selects all from case table where posted ID equals case ID
	$IDChk = $dbConnect->prepare("SELECT * FROM `case` WHERE `caseID`=:subID");
	$IDChk->bindValue(":subID", $subID);
	$IDChk->execute();
	
	//counts rows and stored the total row count in variable 
	$rowsTest = $IDChk->rowCount();
	if ($rowsTest == 1) {
		if($tempStat == 1){
			if($approveDeny == 1){
				//Updates case based on its ID and sets the apporved status to 1 
				$subUpdate = $dbConnect->prepare("UPDATE `case` SET `approvedStatus`=:tic WHERE `caseID`=:subID");
				$subUpdate->bindValue(":subID", $subID);
				$subUpdate->bindValue(":tic", $tic);
				$subUpdate->execute();
			}else if($approveDeny == 2){
				//Updates case based on its ID and sets the apporved status to NULL
				$subUpdate = $dbConnect->prepare("UPDATE `case` SET `approvedStatus`=:del WHERE `caseID`=:subID");
				$subUpdate->bindValue(":subID", $subID);
				$subUpdate->bindValue(":del", $del);
				$subUpdate->execute();
			}
		}else{
			//Throws error if case download status has not been set to 1
			$subEdError = "<br /><p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>The case has not been downloaded yet. Please download and read the case before approving / denying it.</p>";
		}
	}else{
		//Throws error if posted ID doesnt exist in case table
		$subEdError = "<br /><p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Case doesnt exist!</p>";
	}
}
}

?>