<?php

//title , author, date published, keyword
//output: id author title date keywords desciption

	
//Define serachInput variable
$search=$_POST['searchInput'];

$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
					$username = "T2BRGOLIVE";
					$password = "B1G70N@";

					try{ //try database connection
						$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
					} catch (PDOException $error) { //error handling
						echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
					}

					
						
						if (isset($_POST['author'])){
						$smt = $dbConnect->prepare("SELECT `userID` FROM `user` WHERE `firstName` LIKE '%".$search."%' OR `lastName` LIKE '%".$search."%'");
						$smt->execute();
						$userID = $smt->fetchAll();
						
						//finds results based on first and last name searched
						foreach ($userID as $row) { //Displays title, startDate, endDate from announcement table from database
							$cases = $row['caseID'];
							$id = $row['userID'];
							$sql = "SELECT * FROM `finalCase` WHERE `userID` = ".$id; //I want to see all existing cases from database
							$case = $dbConnect->query($sql);//execute query
							foreach ($case as $row) {
								echo '<div class="row">';
								echo '<h2 class="search">'.$row["title"].'</h2>';
								echo '<p class="search">'.$row["note"].' </p>';
								echo '<a href="'.$row["fileLocation"].'CoverPageSubmit-1.docx" class="button sm long ghost wh" download>Cover Page</a>';
								echo '<a href="'.$row["fileLocation"].'SummarySubmit-1.docx" class="button sm long ghost wh" download>Summary</a>';
								echo '<a href="'.$row["fileLocation"].'MemoSubmit-1.docx" class="button sm long ghost wh" download>Memo</a>';
								echo '<a href="'.$row["fileLocation"].'TeachingNotesSubmit-1.docx" class="button sm long ghost wh" download>Teaching Notes</a>';
								echo '<a href="'.$row["fileLocation"].'CriticalIncidentSubmit-1.docx" class="button sm long ghost wh" download>Critical Incident</a>';
								echo '</div>';	
							}
							}
						}
						if (isset($_POST['caseTitle'])){
							//finds results based on title
						$smt2 = $dbConnect->prepare("SELECT * FROM `case` WHERE `title` LIKE '%".$search."%'");
						$smt2->execute();
						$title = $smt2->fetchAll();
						
						//$smt2 = $dbConnect->prepare("SELECT userID FROM user WHERE lastName LIKE '%".$search."%'");
						//$smt2->execute();
						//$userIDlast = $smt2->fetchAll();
						foreach ($title as $row) {
							echo '<div class="row">';
							echo '<h2 class="search">'.$row["title"].'</h2>';
							echo '<p class="search">'.$row["note"].' </p>';
							echo '<a href="'.$row["fileLocation"].'CoverPageSubmit-1.docx" class="button sm long ghost wh" download>Cover Page</a>';
							echo '<a href="'.$row["fileLocation"].'SummarySubmit-1.docx" class="button sm long ghost wh" download>Summary</a>';
							echo '<a href="'.$row["fileLocation"].'MemoSubmit-1.docx" class="button sm long ghost wh" download>Memo</a>';
							echo '<a href="'.$row["fileLocation"].'TeachingNotesSubmit-1.docx" class="button sm long ghost wh" download>Teaching Notes</a>';
							echo '<a href="'.$row["fileLocation"].'CriticalIncidentSubmit-1.docx" class="button sm long ghost wh" download>Critical Incident</a>';
							echo '</div>';	
						}
						}
						if (isset($_POST['note'])){
							//finds results based on note
						$smt3 = $dbConnect->prepare("SELECT * FROM `case` WHERE `note` LIKE '%".$search."%'");
						$smt3->execute();
						$note = $smt3->fetchAll();
						
						//$smt2 = $dbConnect->prepare("SELECT userID FROM user WHERE lastName LIKE '%".$search."%'");
						//$smt2->execute();
						//$userIDlast = $smt2->fetchAll();
						foreach ($note as $row) {
							echo '<div class="row">';
							echo '<h2 class="search">'.$row["title"].'</h2>';
							echo '<p class="search">'.$row["note"].' </p>';
							echo '<a href="'.$row["fileLocation"].'CoverPageSubmit-1.docx" class="button sm long ghost wh" download>Cover Page</a>';
							echo '<a href="'.$row["fileLocation"].'SummarySubmit-1.docx" class="button sm long ghost wh" download>Summary</a>';
							echo '<a href="'.$row["fileLocation"].'MemoSubmit-1.docx" class="button sm long ghost wh" download>Memo</a>';
							echo '<a href="'.$row["fileLocation"].'TeachingNotesSubmit-1.docx" class="button sm long ghost wh" download>Teaching Notes</a>';
							echo '<a href="'.$row["fileLocation"].'CriticalIncidentSubmit-1.docx" class="button sm long ghost wh" download>Critical Incident</a>';
							echo '</div>';	
						}
						}
						if(empty($userID) && empty($title)&& empty($note)){
						echo "<script language='javascript'>\n";
                            echo "alert('No results found! Please try a different search.'); window.location.href='http://br-t2-jci.sfcrjci.org/criticalIncidents.php';";
                            echo "</script>\n";
                            exit;	
						}
						if (isset($_POST['note'])== false && isset($_POST['author'])== false && isset($_POST['caseTitle'])== false && isset($_POST['all'])== false){
							echo "<script language='javascript'>\n";
                            echo "alert('No results found! Please try a different search.'); window.location.href='http://br-t2-jci.sfcrjci.org/criticalIncidents.php';";
                            echo "</script>\n";
                            exit;
								}
					

?>
