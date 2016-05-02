<?php
/*
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
This page is the function for retrieving the verification code from the database and the function
to verify the account. Else the account is either not found or the verification code is incorrect and
no account verification occurs
*/
session_start();
include('mysqli_connect.php'); //includes database connect
$verifyError=''; // Variable To Store Error Message

if (isset($_POST['verifySubmit'])) {//If activate button is clicked
	if (empty($_POST['code'])) {//validates that verify code is input
		$verifyError = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please Enter A Code</p>";
	}else{
		$VCode = $_POST['code'];//checks code
		$VCode = stripslashes($VCode);//sql injection prevention
		$newActivate = 1;//associates php variable to 1
					
		$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
		$username = "T2BRGOLIVE";
		$password = "B1G70N@";
				
		try{//try database connection
			$dbConnect = new PDO($dbConnect, $username, $password);//if successful, connect
		}catch (PDOException $error) {//error handling
			echo 'Error Connecting: ' . $error->getMessage();//display connect unsuccessful error
		}
				
		//User table select
		$verify = $dbConnect->prepare("SELECT `verifyCode` FROM `user` WHERE `verifyCode`=:VCode");
		$verify->bindValue(":VCode", $VCode);//associate database verifyCode attribute to php variable
		$verify->execute();//Execute query			
		$currCode = $verify->fetch(PDO::FETCH_ASSOC);//stores result of MySQL statement
		$currCode = $currCode['verifyCode'];//result of MySQL statement		
		$verifyRow = $verify->rowCount();
		
		if ($verifyRow == 1) {
			//User table update
			$activate = $dbConnect->prepare("UPDATE `user` SET `author`=:newActivate WHERE `verifyCode`=:currCode");
			$activate->bindValue(":currCode", $currCode);//associate database attribute to php variable
			$activate->bindValue(":newActivate", $newActivate);//associate database attribute to php variable
			$activate->execute();//Execute query
			//User table update
			$updateCode = $dbConnect->prepare("UPDATE `user` SET `verifyCode`=null WHERE `verifyCode`=:currCode");
			$updateCode->bindValue(":currCode", $currCode);//associate database attribute to php variable
			$updateCode->execute();//Execute query		
			$verifyError = "<br /><p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Success! Your Account Has Been Activated.</p>";//activation successful
		} else {
			$verifyError = "<br /><p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>No Account To Activate Found</p>";//activation unsuccessful
		}
				
	}
}
?>