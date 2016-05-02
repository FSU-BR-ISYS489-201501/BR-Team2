 <?php
 /*
Last Edited: Date 4/26/2016
Attribution:	
	Created By: Tyler Newton & Erik Obodzinski
	Edited by: Erik Obodzinski
	
Description:
	This page is controlls when the editors downloads a case and where or not the case has been approved or denied.
*/

//include DB connection
$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
$username = "T2BRGOLIVE";
$password = "B1G70N@";
$email = $_SESSION['login_user'];

try{ //try database connection
	$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
} catch (PDOException $error) { //error handling
	echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
}
					
//Selects all users that are set as a reviewer and stores all results in $reviewer
$smt = $dbConnect->prepare('SELECT * FROM `user` WHERE `reviewer` = 1');
$smt->execute();
$reviewer = $smt->fetchAll();
						
//Selects the user ID of the current logged in user based of the stored session variable. The result is then stored in $userID
$smt2 = $dbConnect->prepare('SELECT `userID` FROM `user` WHERE `email` = :email');
$smt2->bindValue(":email", $email);
$smt2->execute();
$userID = $smt2->fetchAll(PDO::FETCH_ASSOC);
						
//Selects all cases currently assigned to the logged in user and stores all results in $assignedCasesID
$smt3 = $dbConnect->prepare('SELECT `caseID` FROM `assignedCases` WHERE `assignedEditorID` = :userID');
$smt3->bindValue(":userID", $userID[0]['userID']);
$smt3->execute();
$assignedCasesID = $smt3->fetchAll(PDO::FETCH_ASSOC);
						
//Counts the total number of IDs stored in $assignedCasesID and stores that total in $result
$result = count($assignedCasesID);
						
//Selects the title of all cases and stores them in $assignedCaseTitle;
$smt4 = $dbConnect->prepare('SELECT `title` FROM `case` WHERE `caseID` = :assignedCasesID');
$smt4->bindValue(":assignedCasesID", $assignedCasesID[0]['caseID']);
$smt4->execute();
$assignedCaseTitle = $smt4->fetchAll(PDO::FETCH_ASSOC);						
						
//Selects all from the case table 
$sql = "SELECT * FROM `case`"; 
$case = $dbConnect->query($sql);
						
//Defines the i variable and sets it to 0
$i=0;

//begins drop down for selecting case to upload review for
echo '<select name="reviewCase">';		
			
//A foreach statement that outputs the assigned cases information into drop down box for the reviewerHome submission tab
foreach ($case as $row) { 
	$assigned = $row['assignedCaseID'];
	$approved = $row['approvedStatus'];
		if(empty($assigned)){}else if(empty($approved)){ }else{
			$smt4 = $dbConnect->prepare('SELECT `title` FROM `case` WHERE `caseID` = :assignedCasesID');
			$smt4->bindValue(":assignedCasesID", $assignedCasesID[$i]['caseID']);
			$smt4->execute();
			$assignedCaseTitle = $smt4->fetchAll(PDO::FETCH_ASSOC);
			$smt5 = $dbConnect->prepare('SELECT `note` FROM `case` WHERE `caseID` = :assignedCasesID');
			$smt5->bindValue(":assignedCasesID", $assignedCasesID[$i]['caseID']);
			$smt5->execute();
			$assignedCaseNote = $smt5->fetchAll(PDO::FETCH_ASSOC);			
			
			//sets each value in the drop down
			echo '<option value="'.$assignedCasesID[$i]['caseID']. '">'.$assignedCaseTitle[0]['title']. '</option>'; 
			$i++;

		}								
}
//ends the drop down creation
echo '</select>';
?>  
