<?php
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton
		
Description:
	This page handles the Edit Submision Page
	The ID entered by the user is stored and used to select desired case. If the case is not found an error will be displayed.
	If the ID entered returns results, a tic is made in the DB indicating its download status, the files are located, and the paths the files are stored in an array.
	The paths stored in the array are then then printed out for the users to click anb download.
*/
session_start();
$subEdError=''; // Variable To Store Error Message
if (isset($_POST['submissionDownload'])) {//if download button is clicked from editSubmissions.php
	if (empty($_POST['subID'])) {//validation for empty submission ID
		$subEdError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Please select a case. </p>"; //error the feild is empty
	}else{ 
		$subID=$_POST['subID'];
		$tic = 1;
		// To protect MySQL injection for Security purpose
		$subID = stripslashes($subID);
					
		//DBConnect	
		$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
		$username = "T2BRGOLIVE";
		$password = "B1G70N@";
				
		try{ //try database connection
			$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
		} catch (PDOException $error) { //error handling
			echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
		}
					
		//Case from case table where the ID entered equals an ID in the DB
		$chkUser = $dbConnect->prepare("SELECT `caseID` FROM `case` WHERE `caseID`=:subID");
		$chkUser->bindValue(":subID", $subID);//Bind posted variable 
		$chkUser->execute();//execute query
		$chkConf = $chkUser->fetchAll(PDO::FETCH_ASSOC);//Store MySQL result in array
		$chk = $chkConf[0]['caseID'];//Stores postions 0 in the array in new variable 
		
		//If the returned results in $chk is not empty 		
		if($chk != 0 || $chk != NULL){
			//Selects file location from case table where the ID is equal to the posted variable.
			$fileChk = $dbConnect->prepare("SELECT `fileLocation` FROM `case` WHERE `caseID`=:subID");
			$fileChk->bindValue(":subID", $subID);//Bind posted variable
			$fileChk->execute();//execute query
			$fileLocation = $fileChk->fetchAll(PDO::FETCH_ASSOC);//Stores all file locations returned into array
			$file = $fileLocation[0]['fileLocation'];
					
			//Sets download status to 1 in DB for selected case 
			$downloadUpdate = $dbConnect->prepare("UPDATE `case` SET `downloadStatus`=:tic WHERE `caseID`=:subID");
			$downloadUpdate->bindValue(":subID", $subID);//Bind posted variable
			$downloadUpdate->bindValue(":tic", $tic);//Bind predefined variable 
			$downloadUpdate->execute();//execute query
					
			//craves files with any file extension
			$fileTemp = glob($file . '*.*');
			//Counts total files stored and stores the total counted in new variable
			$fileCount = count($fileTemp);
			//The total file count is then stored in a session variable 
			$_SESSION['count'] = $fileCount;
			//For loop that prints out all the file paths and links them based on file count.
			for($a=0; $a<$fileCount; $a++){
				$downloadCase[$a] = "<a href=".$fileTemp[$a].">".$fileTemp[$a]."</a>";
			}
					
		}else{
			//Error is no case IDs are returned
			$subEdError = "<br /> <p style='font-family:talo; color:black; margin-top:10px; margin-left:15px; font-size:16px;'>Error Case Doesnt Exist</p>";//download unsuccessful	
		}
	}
}
?>