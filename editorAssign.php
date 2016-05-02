<?php
				/*
				Date 4/4/2016
				This page is the function to submit an Announcement to the website and append it to the Announcements table in the database.
				First the title, startDate, endDate, and content attributes from the database are verified with the MySQL statement results
				*/
					
					$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
					$username = "T2BRGOLIVE";
					$password = "B1G70N@";

					try{ //try database connection
						$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
					} catch (PDOException $error) { //error handling
						echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
					}
					
					if (isset($_POST['submit'])) {//If register button is clicked from editorHome
								
								
								$title = $_POST['id'];//validation for title input
								$note = $_POST['note'];//validation for title input
								$editor = $_POST['editors'];//validation for startDate input
								echo "<script language='javascript'>\n";
                       			echo "alert('" .$title . $note . $editor. "');";
                        		echo "</script>\n";
								
								$sql = $dbConnect->prepare("INSERT INTO `assignedCases`(`assignedCaseID`, `assignedReviewerID`, `assignedEditorID`,`caseID`, `reviewedStatus`, `note`)VALUES(null, null, :editor, :caseID, null, :note)");
								//I want to append the title, startDate, endDate, and content into the Announcements table of the database
								$sql->bindValue(":editor", $editor);//associate database content attribute to php variable
								$sql->bindValue(":caseID", $title)	;//associate database title attribute to php variable
								$sql->bindValue(":note", $note);//associate database startDate attribute to php variable
								
								$sql->execute();//Execute Query
								
								//print_r($sql->errorInfo());//Announcement post unsuccesful
								
								$smt = $dbConnect->prepare("SELECT * FROM `assignedCases` WHERE `caseID` = ".$title);
								$smt->execute();
								$assignedID = $smt->fetchAll();
								
								foreach ($assignedID as $row){
								$assignedCaseID = $row['assignedCaseID'];
								$sql = $dbConnect->prepare("UPDATE `case` SET `assignedCaseID` = :asi WHERE `caseID` = :caseID");
								//I want to append the title, startDate, endDate, and content into the Announcements table of the database
								$sql->bindValue(":asi", $assignedCaseID);//associate database content attribute to php variable
								$sql->bindValue(":caseID", $title)	;//associate database title attribute to php variable
								
								$sql->execute();//Execute Query
								
								print_r($sql->errorInfo());//Announcement post unsuccesful
								
								}
								echo "<script language='javascript'>\n";
								echo "window.location.href='http://br-t2-jci.sfcrjci.org/incidentManager.php';";//Announcement post successful
								echo "</script>\n";
					}
								
					
						
							
				?>
