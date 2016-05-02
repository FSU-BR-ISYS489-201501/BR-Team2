<?
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton
		
Description:
	This page is where the Editor can manage announcements
	The page is populated by the DB and is using JS to pull the announcement data and make it editable.
*/
session_start(); 
	
$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
$username = "T2BRGOLIVE";
$password = "B1G70N@";
				
	try{ //try database connection
		$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
	} catch (PDOException $error) { //error handling
		echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
	}
	
	//Announcement table select
	$sql = "SELECT * FROM `announcements` ORDER BY `startDate` DESC"; //I want to see all existing announcements from database
		$announcement = $dbConnect->query($sql);//execute query
		$a = 0;
?>
<script type="text/javascript">
function changeText(elem, content){
     document.getElementById('title').value = elem.id;

     /* 
      * Here we get the value of the hidden content by the passed
      * in id and assign it to the value of the #content form element
      */
     document.getElementById('content').value = 1;
}
</script>

<?php
foreach ($announcement as $row){ //Displays title, startDate, endDate from announcement table from database 
    $x[$a] = $row["title"];
    $y[$a] = $row["content"];

    echo "<h2 style=width:auto;padding:8px;margin-top:-30px;font-size:18px;><a style=text-decoration:none;color:#c4572f; >".$row["title"]."</a></h2><br>";
    echo "<p style=padding-top:10px;>".$row["content"]."</p><br>";
    echo "<p style=font-size:10px;>Posted: ".$row["startDate"]."</p><br>";
    echo '<input id="'.$x[$a].'" type=button class=test onclick="changeText(this, '.$y[$a].'); startDate('.$y[$a].'); " value="Edit">';
    echo '<p style="display:hidden;" id="'.$y[$a].'" ></p>';
    echo "<h5 style=line-height:2px;margin-top:-15px;><p>_____________________________________</p></h5><br>";
}
				
				?>