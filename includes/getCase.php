 <?php
 /*
Last Edited: Date 4/26/2016
Attribution:	
	Created By: Tyler Newton & Erik Obodzinski
	Edited by: Tyler Newton & Erik Obodzinski
	
Description:
	Pulls all users that have littleEditor and bigEditor status in the DB
	THe Pulled users are then printed into a table to be viewed
*/
					$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
					$username = "T2BRGOLIVE";
					$password = "B1G70N@";

					try{ //try database connection
						$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
					} catch (PDOException $error) { //error handling
						echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
					}
					$i=0;		
					$sql = "SELECT * FROM `case`"; //I want to see all existing announcements from database

						$case = $dbConnect->query($sql);
						
						$smt = $dbConnect->prepare('SELECT * FROM `user` WHERE `littleEditor` = 1');
						$smt->execute();
						$littleE = $smt->fetchAll();
						
						$smt2 = $dbConnect->prepare('SELECT * FROM `user` WHERE `bigEditor` = 1');
						$smt2->execute();
						$bigE = $smt2->fetchAll();
						
						foreach ($case as $row) { //Displays title, startDate, endDate from announcement table from database
							$assigned = $row['assignedCaseID'];
							$approved = $row['approvedStatus'];
							if(empty($approved)){
							
							}
							else{
							if(empty($assigned)){
							echo '<form action="includes/editorAssign.php" method="post" enctype="multipart/form-data">';
							echo '<tr>';
							echo '<input type="hidden" name="id" value="'.$row['caseID'].'">';
							echo '<td>'.$row['caseID']. '</td>';
							echo '<td>'.$row['title']. '</td>';
							echo '<input type="hidden" name="note" value="'.$row['note'].'">';
							echo '<td>'.$row['note']. '</td>';
							echo '<td><select name="editors">';
							$i++;
							foreach ($littleE as $row){
								// wont post userID to db
								echo '<option value="'.$row['userID']. '">'.$row['firstName']. " " .$row['lastName']. '</option>'; 
								
							}
							foreach ($bigE as $row){
								
								echo '<option value="'.$row['userID'].'">'.$row['firstName']. " " .$row['lastName']. '</option>'; 
								
							}
							echo '</select>';
							echo '</td>';
							echo '<td style="text-align:center; display:table-cell;"><input type="submit" align="right" class="button" style="border:0; width:auto; padding:5px; margin-bottom:15px;" value="Assign Editors" name="submit"></td>';
							echo '</form></tr>';
								}
						}

						}
												if($i==0){
echo '<tr><td><p>Please view and approve the cases first!</p></td></tr>';
}
						?>  