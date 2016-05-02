 <?php
 /*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton & Erik Obodzinski
	Edited by: Tyler Newton & Erik Obodzinski
	
Description:
	This page is controls when the editors downloads a case and where or not the case has been approved or denied.
*/

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
			
//Selects all cases currently assigned to the logged in user and stores all results in $assignedCasesID
$smt6 = $dbConnect->prepare('SELECT * FROM `assignedCases`');
$smt6->execute();
$reID = $smt6->fetchAll();

						
//Selects all from the case table 
$sql = "SELECT * FROM `case`"; 
$case = $dbConnect->query($sql);
		
		
//Defines the i variable and sets it to 0
$i=0;
						
//A foreach statement that outputs the assigned cases information

	foreach ($case as $row) { 
	foreach ($reID as $record) { 
	$assigned = $row['assignedCaseID'];
							$approved = $row['approvedStatus'];
							if(empty($approved)){}
							else{
							if(empty($assigned)){}
							else{
							
							$checkEmpty = $record[$i]['assignedReviewerID'];
							//test to see if empty record is checked for reviewerID
							//echo '<tr><td><p>Please view and approve the cases first! '.$checkEmpty.'</p></td></tr>';
							if(empty($checkEmpty)){
			
			
			$smt4 = $dbConnect->prepare('SELECT `title` FROM `case` WHERE `caseID` = :assignedCasesID');
			$smt4->bindValue(":assignedCasesID", $assignedCasesID[$i]['caseID']);
			$smt4->execute();
			$assignedCaseTitle = $smt4->fetchAll(PDO::FETCH_ASSOC);		
			$smt5 = $dbConnect->prepare('SELECT `note` FROM `case` WHERE `caseID` = :assignedCasesID');
			$smt5->bindValue(":assignedCasesID", $assignedCasesID[$i]['caseID']);
			$smt5->execute();
			$assignedCaseNote = $smt5->fetchAll(PDO::FETCH_ASSOC);
			echo '<form action="includes/reviewerAssign.php" method="post" enctype="multipart/form-data">';
			echo '<tr>';
			echo '<input type="hidden" name="id" value="'. $row['caseID'].'">';
			echo '<td>'. $row['caseID']. ' '. $checkEmpty. '</td>';
			echo '<td>'. $row['title'] .'</td>';
			echo '<td>'.$row['note']. '</td>';
			//need to add reviewer 2, reviwer 3 select with email to accept or deny (verification)
			echo '<td><select name="reviewers">';
			
							
			foreach ($reviewer as $row){
				// wont post userID to db
				echo '<option value="'.$row['userID']. '">'.$row['firstName']. " " .$row['lastName']. '</option>'; 
			}
									
			echo '</select>';
			$i++;
			/* echo '<select name="reviewers2">';
			$i++;
							
			foreach ($reviewer as $row){
				// wont post userID to db
				echo '<option value="'.$row['userID']. '">'.$row['firstName']. " " .$row['lastName']. '</option>'; 
			}
									
			echo '</select>';
			
			echo '<select name="reviewers3">';
			$i++;
							
			foreach ($reviewer as $row){
				// wont post userID to db
				echo '<option value="'.$row['userID']. '">'.$row['firstName']. " " .$row['lastName']. '</option>'; 
			}
									
			echo '</select>';*/
			echo '</td>';
			echo '<td style="text-align:center; display:table-cell;"><input type="submit" align="right" class="button" style="border:0; width:auto; padding:5px; margin-bottom:15px;" value="Assign Reviewers" name="submit"></td>';
			echo '</form></tr>';
		}	
$i++;		
}
}
}}
												if($i==0){
echo '<tr><td><p>Please view and approve the cases first! '.$checkEmpty.'</p></td></tr>';
}
?>  