<?
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton and Erik Obozinski
		
Description:
	This page is to display Announcements from database, if the MySQL statement finds announcements, they will be displayed on the website
	Grabs announcements based on their displayed status in the DB
	This file is used on the home page NOT on the Editors back end
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
				$sql = "SELECT * FROM `announcements` WHERE `displayed` = 1 ORDER BY `startDate` DESC"; //I want to see all existing announcements from database
				
					$announcement = $dbConnect->query($sql);//execute query
					
					
					foreach ($announcement as $row) { //Displays title, startDate, endDate from announcement table from database 
						
					echo "<h2 style=width:auto;padding-top:0;margin-top:-20px;font-size:18px;><a style=text-decoration:none;color:#c4572f; href=''>".$row["title"]."</a></h2><br>";
					echo "<p style=padding-top:10px;padding-left:10px;>".$row["content"]."</p><br>";
					echo "<p style=font-size:10px;margin-bottom:-10px;px;>Posted: ".$row["startDate"]."</p><br>";
					echo "<h5 style=line-height:2px;margin-bottom:30px;width:100%;border-top:solid thin #000;></h5><br>";
				}
				
				?>