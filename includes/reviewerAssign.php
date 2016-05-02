<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton and Erik Obozinski
	Edited by: Tyler Newton
	
Description:
	This page controlls the journals displayed to the public based on the journals display status.
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
	$id = $_POST['id'];
	$title = $_POST['title'];//validation for title input
	$note = $_POST['note'];//validation for title input
	$revID = $_POST['reviewers'];//validation for startDate input
	$assignRev = $dbConnect->prepare("UPDATE `assignedCases` SET `assignedReviewerID`=:revID WHERE `caseID`=:id");
	$assignRev->bindValue(":id", $id);
	$assignRev->bindValue(":revID", $revID);
	$assignRev->execute();
	$_SESSION['reviewerID'] = $revID;
	include('../emailReviewer');												
	echo "<script language='javascript'>\n";
	echo "window.alert('Reviewer ".$id." Assigned!');";
	echo "window.location.href='http://br-t2-jci.sfcrjci.org/assignReviewer.php';";//Announcement post successful
	echo "</script>\n";
}
?>