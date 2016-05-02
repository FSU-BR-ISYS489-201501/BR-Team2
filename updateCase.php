<?php
	/*
	Last Edited: Date 4/26/2016
	
	Attribution:	
		Created By: Erik Obodzinski, Josh Stocking, and Chad Marshall
		Edited By: Erik Obodzinski	
			
	Description:
		Uploads reviews to specified cases and sets alert to email the author of the new submission.
		
	*/
	
	//include DB connection
	
	include( "../mysqli_connect.php");
	$caseID = $_POST['caseIDtest'];
	
//validation for case selected to submit review for
	$smt4 = $dbConnect->prepare('SELECT * FROM `case` WHERE `caseID` = :caseID');
	//get the file location from the db for the selected case
	$smt4->bindValue(":caseID", $caseID);
	$smt4->execute();
	$result = $smt4->fetchAll(PDO::FETCH_ASSOC);
	//set local variable to fileLocation from DB
	foreach ($result as $row) {
		$location = $row['fileLocation'];
		$count = $row['submitCount'];
	}
	

                    // Check submit was clicked
                    
                    if(isset($_POST["submitUpdate"])) {
                        $target_dir = $location;
						$target_file = $target_dir . basename($_FILES["userfile2"]["name"]);
						$uploadOk = 1;
						$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
						//Set name for first review
						$dir = $location;
                
                        // Check if file already exists and create names for the submission of each for the directory
                        for($i = 0; $i < count($_FILES['userfile2']); $i++) {
							if($i == 0){
                            $target_file_new = $dir . "CriticalIncidentSubmit-1.docx";
								if (file_exists($target_file_new)) {
									$target_file_new = $dir . "CriticalIncidentSubmit-2.docx";
									if (file_exists($target_file_new)) {
									$target_file_new = $dir . "CriticalIncidentSubmit-3.docx";
									}
								}
							}
							else if($i== 1){
                            $target_file_new = $dir . "MemoSubmit-1.docx";
								if (file_exists($target_file_new)) {
									$target_file_new = $dir . "MemoSubmit-2.docx";
									if (file_exists($target_file_new)) {
									$target_file_new = $dir . "MemoSubmit-3.docx";
									}
								}
							}
							else if($i== 2){
                            $target_file_new = $dir . "TeachingNotesSubmit-1.docx";
								if (file_exists($target_file_new)) {
									$target_file_new = $dir . "TeachingNotesSubmit-2.docx";
									if (file_exists($target_file_new)) {
									$target_file_new = $dir . "TeachingNotesSubmit-3.docx";
									}
								}
							}
							else if($i== 3){
                            $target_file_new = $dir . "SummarySubmit-1.docx";
								if (file_exists($target_file_new)) {
									$target_file_new = $dir . "SummarySubmit-2.docx";
									if (file_exists($target_file_new)) {
									$target_file_new = $dir . "SummarySubmit-3.docx";
									}
								}
							}
							else if($i== 4){
                            $target_file_new = $dir . "CoverPageSubmit-1.docx";
								if (file_exists($target_file_new)) {
									$target_file_new = $dir . "CoverPageSubmit-2.docx";
									if (file_exists($target_file_new)) {
									$target_file_new = $dir . "CoverPageSubmit-3.docx";
									}
								}
							}
							
                            $FileType = pathinfo($target_file_new,PATHINFO_EXTENSION);
                            
							
                            if (file_exists($target_file_new)) {
                             	//checks if file already exists
                                $message= "File Already Exists: ".$target_file_new;
                                $_SESSION['message'] = $message;
                                echo "<script language='javascript'>\n";
                                echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                                echo "</script>\n";
                                exit;
                                
                                if ($_FILES['userfile2']['size'][$i] > 500000) {
                                    // Allow documents only
                                    $message= "File is too big: " . $target_file_new;
                                    $_SESSION['message'] = $message;
                                    echo "<script language='javascript'>\n";
                                    echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                                    echo "</script>\n";
                                    exit;
                                    
                                    if($FileType != "doc" && $FileType != "docx" ) {
                                        $message= "File must be a doc or docx file type: " . $target_file_new;
                                        $_SESSION['message'] = $message;
                                        echo "<script language='javascript'>\n";
                                        echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                                        echo "</script>\n";
                                        exit;
                                        // if everything is ok, try to upload file
                                    }
                
                                }
                
                            } else {
                                
                                if (move_uploaded_file($_FILES['userfile2']['tmp_name'][$i], $target_file_new)) {
                                    //outputs a message to the user that the file was uploaded
                                    $title = isset($_POST['caseTitle']) ? $_POST['caseTitle'] :
                                    false;
                                    //validation for title input
                                    $notes = isset($_POST['notes']) ? $_POST['notes'] :
                                    false;
                                    //validation for startDate input
                                    $dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
                                    $username = "T2BRGOLIVE";
                                    $password = "B1G70N@";
                                    try{
                                        //try database connection
                                        $dbConnect = new PDO($dbConnect, $username, $password);
                                        //if successful, connect
                                    }
                
                                    catch (PDOException $error) {
                                        //error handling
                                        echo 'Error Connecting: ' . $error->getMessage();
                                        //display connect unsuccessful error
                                    }
                
                                }
               
                            }
                
                        }
               
                    }
								
								if($count == 1){
									//The jounrals displayed status is set to 1  where the posted ID equals the ID in the table
									$caseUpdate = $dbConnect->prepare("UPDATE `case` SET `submitCount`= 2 , `approvedStatus`= 0 WHERE `caseID`=:caseID");
									$caseUpdate->bindValue(":caseID", $caseID);
									$caseUpdate->execute();
								}
								
								if($count == 2){
									//The jounrals displayed status is set to 1  where the posted ID equals the ID in the table
									$caseUpdate = $dbConnect->prepare("UPDATE `case` SET `submitCount`= 3 , `approvedStatus`= 0 WHERE `caseID`=:caseID");
									$caseUpdate->bindValue(":caseID", $caseID);
									$caseUpdate->execute();
								}
								
							
							
						
					 echo "<script language='javascript'>\n";
                     echo "alert('Files Added!'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                     echo "</script>\n";
                     exit;
                
            ?>        