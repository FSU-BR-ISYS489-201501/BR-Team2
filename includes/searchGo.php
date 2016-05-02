<?php
 /*
Last Edited: Date 5/2/2016
Attribution:	
	Created By: Erik Obodzinski
	Edited by: Erik Obodzinski
	
Description:
	This page is controls when the editors downloads a case and where or not the case has been approved or denied.
*/
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

					if ($_POST['searchInput'] == ''){
							//gets all results from final case
						$smt4 = $dbConnect->prepare("SELECT * FROM `finalCase`");
						$smt4->execute();
						$all = $smt4->fetchAll();
						
						//$smt2 = $dbConnect->prepare("SELECT userID FROM user WHERE lastName LIKE '%".$search."%'");
						//$smt2->execute();
						//$userIDlast = $smt2->fetchAll();
						foreach ($all as $row) {
							echo '<div class="row">';
							echo '<h2 class="search">'.$row["title"].'</h2>';
							echo '<p class="search">'.$row["abstract"].' </p>';
							echo '<a href="'.$row["fileLocation"].'" class="button sm long ghost wh" download>Download Critical Incident</a>';
							echo '</div>';	
						}
					}else{
	
							//finds results based on author
						$smt3 = $dbConnect->prepare("SELECT * FROM `finalCase` WHERE `author` LIKE '%".$search."%'");
						$smt3->execute();
						$author = $smt3->fetchAll();
						//finds results based on first and last name searched
						foreach ($author as $row) { //Displays title, startDate, endDate from announcement table from database
							$cases = $row['caseID'];
							$id = $row['userID'];
			
								echo '<div class="row">';
								echo '<h2 class="search">'.$row["title"].'</h2>';
								echo '<p class="search">'.$row["abstract"].' </p>';
								echo '<a href="'.$row["fileLocation"].'" class="button sm long ghost wh" download>Download Critical Incident</a>';
								echo '</div>';	
							}
							
							//finds results based on title
						$smt2 = $dbConnect->prepare("SELECT * FROM `finalCase` WHERE `title` LIKE '%".$search."%'");
						$smt2->execute();
						$title = $smt2->fetchAll();
						
						//$smt2 = $dbConnect->prepare("SELECT userID FROM user WHERE lastName LIKE '%".$search."%'");
						//$smt2->execute();
						//$userIDlast = $smt2->fetchAll();
						foreach ($title as $row) {
							echo '<div class="row">';
							echo '<h2 class="search">'.$row["title"].'</h2>';
							echo '<p class="search">'.$row["abstract"].' </p>';
							echo '<a href="'.$row["fileLocation"].'" class="button sm long ghost wh" download>Download Critical Incident</a>';
							echo '</div>';	
						}
						
							//finds results based on note
						$smt3 = $dbConnect->prepare("SELECT * FROM `finalCase` WHERE `abstract` LIKE '%".$search."%'");
						$smt3->execute();
						$note = $smt3->fetchAll();
						
						//$smt2 = $dbConnect->prepare("SELECT userID FROM user WHERE lastName LIKE '%".$search."%'");
						//$smt2->execute();
						//$userIDlast = $smt2->fetchAll();
						foreach ($note as $row) {
							echo '<div class="row">';
							echo '<h2 class="search">'.$row["title"].'</h2>';
							echo '<p class="search">'.$row["abstract"].' </p>';
							echo '<a href="'.$row["fileLocation"].'" class="button sm long ghost wh" download>Download Critical Incident</a>';
							echo '</div>';	
						}
						
					}

?>
