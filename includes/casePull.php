<?php
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton and Erik Obozinski
		
Description:
	Selects all cases from the case table where the userID equals the users stored session ID
	I then echos the users cases along with the cases information
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
				
$sql = "SELECT * FROM `case` WHERE `userID` = ".$_SESSION['user']; //I want to see all existing cases from database				
$case = $dbConnect->query($sql);//execute query
$i=0;
					
foreach ($case as $row) { //Row formatting
	if($row['submitCount']==3){
	$varSet = 'ID-'.$i;
	echo '<div class="row">';
	echo '<h2 class="search">Critical Incident Submission: '.$row['title']. '</h2>';
	echo '<p>'.$row['note'].'</p>';
	echo '<div class="progresscenterbutton">';
	echo '<p>Submission:'.$row['submitCount'].'/3</p>';
	echo '<input type="hidden" name="'.$varSet.'" id="'.$varSet.'" value="' .$row['caseID'].'">';
	//popup form
	echo '<h2 class="search">Maximum submissions made</h2>';
	//end form
	echo '<div><span id="anything" class="button sm long teal addcomments" onclick="getIdRefresh(\''.$varSet.'\')">View Files</div>';
	echo '</div>';
	echo '</div>';
	$i++;
	}
	else{
	$varSet = 'ID-'.$i;
	echo '<div class="row">';
	echo '<h2 class="search">Critical Incident Submission: '.$row['title']. '</h2>';
	echo '<p>'.$row['note'].'</p>';
	echo '<div class="progresscenterbutton">';
	echo '<p>Submission:'.$row['submitCount'].'/3</p>';
	echo '<input type="hidden" name="'.$varSet.'" id="'.$varSet.'" value="' .$row['caseID'].'">';
	//popup form
	echo '<span class ="id_check" id ="'.$row['caseID'].'"><a id ="'.$row['caseID'].'"class="button sm long teal addcomments" href="#" data-modal-id="popup"> Resubmit Files </a></span>';
	//end form
	echo '<div><span id="anything" class="button sm long teal addcomments" onclick="getIdRefresh(\''.$varSet.'\')">View Files</div>';
	echo '</div>';
	echo '</div>';
	$i++;
	$_SESSION['initial'] = 1;
	}
}
?>