<?php
/*
Last Edited: Date 4/29/2016
Attribution:	
	Created By: Erik Obozinski and Tyler Newton
		Edited by: Erik Obodzinski
		
Description:
	This page grabs the file to be uploaded and renames it
	It then creates a directory for the user if one is not already created
*/
	
	//where the file will be uploaded
	$target_dir = "publishedCase/";
	//file original name
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	//contains the name of the file after being renamed
	$target_file_new = $target_dir . basename($_FILES['fileToUpload']['name']);
	$target_file_new = str_replace(' ', '', $target_file_new);
	$uploadOk = 1;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check submit was clicked
	
	
	if(isset($_POST["submit"])) {
		// Check if file already exists
		
		if (file_exists($target_file_new)) {
                                // Check file size
                                $message= "File Already Exists: ".$target_file_new;
                                $_SESSION['message'] = $message;
                                echo "<script language='javascript'>\n";
                                echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/singleCase.php';";
                                echo "</script>\n";
                                exit;
                                
                                if ($_FILES['userfile']['size'][$i] > 500000) {
                                    // Allow documents only
                                    $message= "File is too big: " . $target_file_new;
                                    $_SESSION['message'] = $message;
                                    echo "<script language='javascript'>\n";
                                    echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/singleCase.php';";
                                    echo "</script>\n";
                                    exit;
                                    
                                    if($FileType != "pdf") {
                                        $message= "File must be a pdf or pdf file type: " . $target_file_new;
                                        $_SESSION['message'] = $message;
                                        echo "<script language='javascript'>\n";
                                        echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/singleCase.php';";
                                        echo "</script>\n";
                                        exit;
                                        // if everything is ok, try to upload file
                                    }
                
                                }
                
                            }else {
			//executes the file upload
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_new)) {
				//outputs a message to the user that the file was uploaded
				$message= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";//upload success
				$_SESSION['message'] = $message;
				if(isset($_POST["submit"])) {
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
                        //If register button is clicked from editorHome
                        $title = $_POST['caseTitle'];
						$_SESSION['case_title'] = $title;
                        //validation for title input
                        $notes = $_POST['abstract'];
						//validation for authors input
						$authors = $_POST['authors'];
                        //validation for startDate input
						$time = date("Y-m-d H:i:s", time());
                        $sql = $dbConnect->prepare("INSERT INTO `finalCase`(`fcaseID`, `datePublished`, `title`, `author`, `abstract`, `fileLocation`, `displayed`)VALUES(null, :date, :title, :author, :notes, :fileLocation, 1)");
                        //I want to append the title, startDate, endDate, and content into the Announcements table of the database
                        $sql->bindValue(":title", $title);
                        //associate database content attribute to php variable
						$sql->bindValue(":author", $authors);
                        $sql->bindValue(":notes", $notes);
						$sql->bindValue(":date", $time);
                        //associate database title attribute to php variable
                        $sql->bindValue(":fileLocation", $target_file_new);
                        //associate database startDate attribute to php variable
                        $sql->execute();
                        //Execute Query
                        //print_r($sql->errorInfo());
						include('email.php');
				}
				  echo "<script language='javascript'>\n";
				  echo "alert('Upload of" .$_SESSION['message']." successful!'); window.location.href='http://br-t2-jci.sfcrjci.org/singleCase.php'";
				  echo "</script>\n";

			} else {
				//outputs the error that the file was not uploaded
				$message= "The file upload has failed.";//upload success
				$_SESSION['message'] = $message;
				  echo "<script language='javascript'>\n";
				  echo "alert('Upload of" .$_SESSION['message']." successful!'); window.location.href='http://br-t2-jci.sfcrjci.org/singleCase.php'";
				  echo "</script>\n";
			}

		}
		


	}

	//attribution to w3schools.com 
	?>

