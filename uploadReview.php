<?php
	/*
	Last Edited: Date 4/26/2016
	
	Attribution:	
		Created By: Josh Stocking, Erik Obodzinski and Chad Marshall
		Edited By: Erik Obodzinski	
			
	Description:
		Uploads reviews to specified cases and sets alert to email the author of the new submission.
		
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
	
	//gets the caseID from the dropdown of the assigned case that the reviewer had to submit a review for
	$caseID = $_POST['reviewCase'];
	
	//validation for case selected to submit review for
	$smt4 = $dbConnect->prepare('SELECT `fileLocation` FROM `case` WHERE `caseID` = :caseID');
	//get the file location from the db for the selected case
	$smt4->bindValue(":caseID", $caseID);
	$smt4->execute();
	$result = $smt4->fetchAll(PDO::FETCH_ASSOC);
	//set local variable to fileLocation from DB
	foreach ($result as $row) {
		$location = $row['fileLocation'];
	}
	
	//gets the author who wrote the original case
	$smt = $dbConnect->prepare('SELECT `userID` FROM `case` WHERE `caseID` = :caseID');
	//get userID for the author associated with the case
	$smt->bindValue(":caseID", $caseID);
	$smt->execute();
	$user = $smt->fetchAll(PDO::FETCH_ASSOC);
	//set local variable to username from DB
	foreach ($user as $row) {
		$userName = $row['userID'];
	}
	
	//gets case title by caseID
	$smt2 = $dbConnect->prepare('SELECT `title` FROM `case` WHERE `caseID` = :caseID');
	$smt2->bindValue(":caseID", $caseID);
	$smt2->execute();
	$case = $smt2->fetchAll(PDO::FETCH_ASSOC);
	//set local variable to title and session variable for email from DB
	foreach ($case as $row) {
		$title = $row['title'];
		$_SESSION['case_title']= $title;
	}
	
	//gets the email address associated with the author for the case
	$smt3 = $dbConnect->prepare('SELECT `email` FROM `user` WHERE `userID` = :userID');
	$smt3->bindValue(":userID", $userName);
	$smt3->execute();
	$email = $smt3->fetchAll(PDO::FETCH_ASSOC);
	//set local variable to user_email and session varaible for email from DB
	foreach ($email as $row) {
		$user_email = $row['email'];
		$_SESSION['address']= $user_email;
	}
	
	
	
	//If submit review button is clicked from reviewer Home					
	if(isset($_POST["submitReview"])) {
		//Set target directory from location variable above and get file name and extension
		$target_dir = $location;
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//Set name for first review
		$target_file_new = "Review_1.docx";
		$dir = $location."Reviews/".$target_file_new;
		
		//If review 1 exists set name as review 2
		if (file_exists($target_dir . "Reviews/Review_1.docx")){
			$target_file_new = "Review_2.docx";
			$dir = $location."Reviews/".$target_file_new;
		}

		//If review 2 exists set name as review 3
		if(file_exists($target_dir . "Reviews/Review_2.docx")){
			$target_file_new = "Review_3.docx";
			$dir = $location."Reviews/".$target_file_new;
		}
		//If review 3 exists alert user that 3 reviews have already been submitted and redirect to reviewer home
		if(file_exists($target_dir . "Reviews/Review_3.docx")){
			echo "<script language='javascript'>\n";
			echo "alert('Upload failed! Maximum review uploads have been reached!'); window.location.href='http://br-t2-jci.sfcrjci.org/reviewerHome.php';";
			echo "</script>\n";
		}

		//executes the file upload to specified directory
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $dir)) {
			//set success message to display in JS popup
			$message= "The file ". $target_file_new. " has been uploaded! ";
			include('email.php');
			//The jounrals displayed status is set to 1  where the posted ID equals the ID in the table
			$caseUpdate = $dbConnect->prepare("UPDATE `assignedCases` SET `assignedReviewerID`= null WHERE `caseID`=:caseID");
			$caseUpdate->bindValue(":caseID", $caseID);
			$caseUpdate->execute();
			$_SESSION['message'] = $message;
			//includes the page with the function to alert authors of new review being submitted
			include( "emailAuthor.php");
			echo "<script language='javascript'>\n";
			echo "alert('Upload Success!'); window.location.href='http://br-t2-jci.sfcrjci.org/reviewerHome.php';";
			echo "</script>\n";
			
		//set failed message to display in JS popup
		} else {
			$message= "Sorry, there was an error uploading your file.";
			$_SESSION['message'] = $message;
			echo "<script language='javascript'>\n";
			echo "alert('Upload failed!'); window.location.href='http://br-t2-jci.sfcrjci.org/reviewerHome.php';";
			echo "</script>\n";
		}

	}

	//attribution to w3schools.com 
?>