<?php
/*
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
This page sets a users status based on the Editors input of Email and user type.
The code searches for the email in the user table and updates the users typed based on the posted variable.
*/
session_start();
$error='';
// Variable To Store Error Message
	
if (isset($_POST['userUpdate'])) {
	if (empty($_POST['userEmail']) || ($_POST['userType'] == 0)) {
		$error = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Please fill out all required information. </p>";
	} else {
		$userEmail=$_POST['userEmail'];
		$userType=$_POST['userType'];
		$tic = 1;
		$del = NULL;
		
		// To protect MySQL injection for Security purpose
		$userEmail = stripslashes($userEmail);
		$userType = stripslashes($userType);
		
		//DBConnect	
		$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
		$username = "T2BRGOLIVE";
		$password = "B1G70N@";
		try{
			$dbConnect = new PDO($dbConnect, $username, $password);
		}
		catch (PDOException $error) {
			echo 'Error Connecting: ' . $error->getMessage();
		}

		//Checks if email exists in Database already
		$userChk = $dbConnect->prepare("SELECT * FROM `user` WHERE `email`=:userEmail");
		$userChk->bindValue(":userEmail", $userEmail);
		$userChk->execute();
		$rowsTest = $userChk->rowCount();
			
		if ($rowsTest == 1) {
			if($userType == 1){
				$userUpdate = $dbConnect->prepare("UPDATE `user` SET `author`=:tic WHERE `email`=:userEmail");
				$userUpdate->bindValue(":userEmail", $userEmail);
				$userUpdate->bindValue(":tic", $tic);
				$userUpdate->execute();
				$userUpdate2 = $dbConnect->prepare("UPDATE `user` SET `reviewer`=:del WHERE `email`=:userEmail");
				$userUpdate2->bindValue(":userEmail", $userEmail);
				$userUpdate2->bindValue(":del", $del);
				$userUpdate2->execute();
				$userUpdate3 = $dbConnect->prepare("UPDATE `user` SET `intern`=:del WHERE `email`=:userEmail");
				$userUpdate3->bindValue(":userEmail", $userEmail);
				$userUpdate3->bindValue(":del", $del);
				$userUpdate3->execute();
				$userUpdate4 = $dbConnect->prepare("UPDATE `user` SET `littleEditor`=:del WHERE `email`=:userEmail");
				$userUpdate4->bindValue(":userEmail", $userEmail);
				$userUpdate4->bindValue(":del", $del);
				$userUpdate4->execute();
			} else if($userType == 2){
				$userUpdate = $dbConnect->prepare("UPDATE `user` SET `author`=:tic WHERE `email`=:userEmail");
				$userUpdate->bindValue(":userEmail", $userEmail);
				$userUpdate->bindValue(":tic", $tic);
				$userUpdate->execute();
				$userUpdate2 = $dbConnect->prepare("UPDATE `user` SET `reviewer`=:tic WHERE `email`=:userEmail");
				$userUpdate2->bindValue(":userEmail", $userEmail);
				$userUpdate2->bindValue(":tic", $tic);
				$userUpdate2->execute();
				$userUpdate3 = $dbConnect->prepare("UPDATE `user` SET `intern`=:del WHERE `email`=:userEmail");
				$userUpdate3->bindValue(":userEmail", $userEmail);
				$userUpdate3->bindValue(":del", $del);
				$userUpdate3->execute();
				$userUpdate4 = $dbConnect->prepare("UPDATE `user` SET `littleEditor`=:del WHERE `email`=:userEmail");
				$userUpdate4->bindValue(":userEmail", $userEmail);
				$userUpdate4->bindValue(":del", $del);
				$userUpdate4->execute();
			} else if($userType == 3){
				$userUpdate = $dbConnect->prepare("UPDATE `user` SET `author`=:tic WHERE `email`=:userEmail");
				$userUpdate->bindValue(":userEmail", $userEmail);
				$userUpdate->bindValue(":tic", $tic);
				$userUpdate->execute();
				$userUpdate2 = $dbConnect->prepare("UPDATE `user` SET `reviewer`=:tic WHERE `email`=:userEmail");
				$userUpdate2->bindValue(":userEmail", $userEmail);
				$userUpdate2->bindValue(":tic", $tic);
				$userUpdate2->execute();
				$userUpdate3 = $dbConnect->prepare("UPDATE `user` SET `intern`=:tic WHERE `email`=:userEmail");
				$userUpdate3->bindValue(":userEmail", $userEmail);
				$userUpdate3->bindValue(":tic", $tic);
				$userUpdate3->execute();
				$userUpdate4 = $dbConnect->prepare("UPDATE `user` SET `littleEditor`=:del WHERE `email`=:userEmail");
				$userUpdate4->bindValue(":userEmail", $userEmail);
				$userUpdate4->bindValue(":del", $del);
				$userUpdate4->execute();
			} else if($userType == 4){
				$userUpdate = $dbConnect->prepare("UPDATE `user` SET `author`=:tic WHERE `email`=:userEmail");
				$userUpdate->bindValue(":userEmail", $userEmail);
				$userUpdate->bindValue(":tic", $tic);
				$userUpdate->execute();
				$userUpdate2 = $dbConnect->prepare("UPDATE `user` SET `reviewer`=:tic WHERE `email`=:userEmail");
				$userUpdate2->bindValue(":userEmail", $userEmail);
				$userUpdate2->bindValue(":tic", $tic);
				$userUpdate2->execute();
				$userUpdate3 = $dbConnect->prepare("UPDATE `user` SET `intern`=:tic WHERE `email`=:userEmail");
				$userUpdate3->bindValue(":userEmail", $userEmail);
				$userUpdate3->bindValue(":tic", $tic);
				$userUpdate3->execute();
				$userUpdate4 = $dbConnect->prepare("UPDATE `user` SET `littleEditor`=:tic WHERE `email`=:userEmail");
				$userUpdate4->bindValue(":userEmail", $userEmail);
				$userUpdate4->bindValue(":tic", $tic);
				$userUpdate4->execute();
			} else if($userType == 5){
				$userUpdate = $dbConnect->prepare("UPDATE `user` SET `author`=:del WHERE `email`=:userEmail");
				$userUpdate->bindValue(":userEmail", $userEmail);
				$userUpdate->bindValue(":del", $del);
				$userUpdate->execute();
				$userUpdate2 = $dbConnect->prepare("UPDATE `user` SET `reviewer`=:del WHERE `email`=:userEmail");
				$userUpdate2->bindValue(":userEmail", $userEmail);
				$userUpdate2->bindValue(":del", $del);
				$userUpdate2->execute();
				$userUpdate3 = $dbConnect->prepare("UPDATE `user` SET `intern`=:del WHERE `email`=:userEmail");
				$userUpdate3->bindValue(":userEmail", $userEmail);
				$userUpdate3->bindValue(":del", $del);
				$userUpdate3->execute();
				$userUpdate4 = $dbConnect->prepare("UPDATE `user` SET `littleEditor`=:del WHERE `email`=:userEmail");
				$userUpdate4->bindValue(":userEmail", $userEmail);
				$userUpdate4->bindValue(":del", $del);
				$userUpdate4->execute();
			}
		} else {
			$error = "<br /><p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Email Doesnt Exists</p>";
		}
	}
}
?>