<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton and Erick Obozinski
	Edited by: Tyler Newton
	
Description:
	This page displays the available reviewers and the cases theyre assigned to.
*/
session_start(); 
$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
$username = "T2BRGOLIVE";
$password = "B1G70N@";
$_SESSION['folder'] = $_GET['loc'];
				
try{ //try database connection
	$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
} catch (PDOException $error) { //error handling
	echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
}
				
$sql = "SELECT * FROM `assignedCases` WHERE `assignedReviewerID` = ".$_SESSION['user']; //I want to see all existing cases from database
$case = $dbConnect->query($sql);//execute query
$i=0;
					
foreach ($case as $row) { //Row formatting
	$varSet = 'ID-'.$i;
	$revChk = $dbConnect->prepare("SELECT `CaseID` FROM `assignedCases` WHERE `assignedReviewerID` = ".$_SESSION['user']);
	$revChk->execute();
	$assingedCases = $revChk->fetchAll(PDO::FETCH_ASSOC);
	$caseID = ($assingedCases[$i]['CaseID']);
						
	$casePull = $dbConnect->prepare("SELECT * FROM `case` WHERE `caseID` = :caseID");
	$casePull->bindValue(":caseID", $caseID);
	$casePull->execute();
	$casePullTitle = $casePull->fetchAll(PDO::FETCH_ASSOC);
	$caseTitle = ($casePullTitle[0]['title']);
	echo '<form action="includes/askReviewer.php" method="post" enctype="multipart/form-data">';									
	echo '<div class="row">';
	echo '<h2 class="search">Case To Review: '.$caseTitle. '</h2>';
	echo '<p>'.$row['note'].'</p>';
	echo '<div class="progresscenterbutton">';
	echo '<input type="hidden" name="'.$varSet.'" id="'.$varSet.'" value="' .$row['caseID'].'">';
	echo '<div><span id="anything" class="button sm long salmon addcomments" onclick="getIdRefreshReviewer(\''.$varSet.'\')">View Files</div>';
	echo '</div>';
	echo '</div>';
	echo '<input type="submit" value="Upload Review" name="accept">';
	echo '</form>';	
	$i++;
	$_SESSION['initial'] = 1;
}
?>