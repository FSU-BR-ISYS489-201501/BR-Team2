<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton and Erik Obozinski
	Edited by: Tyler Newton
	
Description:
	This page controlls the publishing and update of announcements.
*/
if (isset($_POST['postAnnouncement'])) {
	if (empty($_POST['title']) || empty($_POST['content']) || empty($_POST['endDate']) || empty($_POST['startDate']) || ($_POST['announcementStatus'] == 0)) {
		$annError = "<p style='font-family:talo; color:black; font-size:16px;'>Please fill out all required information. </p>";
	}else{ 
		$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
		$username = "T2BRGOLIVE";
		$password = "B1G70N@";

		try{ //try database connection
			$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
		} catch (PDOException $error) { //error handling
			echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
		}
					
		//If register button is clicked from editorHome
		$title = $_POST['title'];//validation for title input
		$startDate = $_POST['startDate'];//validation for startDate input
		$endDate = $_POST['endDate'];//validation for endDate input
		$content = $_POST['content'];//validation for content input
		$idTest = $_POST['idTest'];
		$status = $_POST['announcementStatus'];
		$tic = 1;
		$del = NULL;
								
		if($idTest == NULL){
			if($status == 1){
				$sql = $dbConnect->prepare("INSERT INTO `announcements`(`announcementID`,`content`,`title`,`startDate`,`endDate`,`displayed`)VALUES(null, :content, :title, :startDate, :endDate, :tic)");
				//I want to append the title, startDate, endDate, and content into the Announcements table of the database
				$sql->bindValue(":content", $content);//associate database content attribute to php variable
				$sql->bindValue(":title", $title);//associate database title attribute to php variable
				$sql->bindValue(":startDate", $startDate);//associate database startDate attribute to php variable
				$sql->bindValue(":endDate", $endDate);//associate database endDate attribute to php variable
				$sql->bindValue(":tic", $tic);
				$sql->execute();//Execute Query
			
				echo "<script language='javascript'>\n";
				echo "alert('Announcement posted successfully!'); window.location.href='http://br-t2-jci.sfcrjci.org/editorHome.php';";//Announcement post successful
				echo "</script>\n";
			}else if($status == 2){
				$sql = $dbConnect->prepare("INSERT INTO `announcements`(`announcementID`,`content`,`title`,`startDate`,`endDate`,`displayed`)VALUES(null, :content, :title, :startDate, :endDate, :del)");
				//I want to append the title, startDate, endDate, and content into the Announcements table of the database
				$sql->bindValue(":content", $content);//associate database content attribute to php variable
				$sql->bindValue(":title", $title);//associate database title attribute to php variable
				$sql->bindValue(":startDate", $startDate);//associate database startDate attribute to php variable
				$sql->bindValue(":endDate", $endDate);//associate database endDate attribute to php variable
				$sql->bindValue(":del", $del);
				$sql->execute();//Execute Query
			
				echo "<script language='javascript'>\n";
				echo "alert('Announcement posted successfully!'); window.location.href='http://br-t2-jci.sfcrjci.org/editorHome.php';";//Announcement post successful
				echo "</script>\n";
			}else{
				$annError = "<p style='font-family:talo; color:black; font-size:16px;'>Selection Error</p>";
		}
	}else{
		if($status == 1){
			$sql = $dbConnect->prepare("UPDATE `announcements` SET `content`=:content, `title`=:title, `startDate`=:startDate, `endDate`=:endDate, `displayed`=:tic WHERE `announcementID`=:idTest");
			//I want to append the title, startDate, endDate, and content into the Announcements table of the database
			$sql->bindValue(":idTest", $idTest);
			$sql->bindValue(":content", $content);//associate database content attribute to php variable
			$sql->bindValue(":title", $title);//associate database title attribute to php variable
			$sql->bindValue(":startDate", $startDate);//associate database startDate attribute to php variable
			$sql->bindValue(":endDate", $endDate);//associate database endDate attribute to php variable
			$sql->bindValue(":tic", $tic);
			$sql->execute();//Execute Query
			
			echo "<script language='javascript'>\n";
			echo "alert('Announcement updated successfully!'); window.location.href='http://br-t2-jci.sfcrjci.org/editorHome.php';";//Announcement post successful
			echo "</script>\n";
		}else if($status == 2){
			$sql = $dbConnect->prepare("UPDATE `announcements` SET `content`=:content, `title`=:title, `startDate`=:startDate, `endDate`=:endDate, `displayed`=:del WHERE `announcementID`=:idTest");
			//I want to append the title, startDate, endDate, and content into the Announcements table of the database
			$sql->bindValue(":idTest", $idTest);
			$sql->bindValue(":content", $content);//associate database content attribute to php variable
			$sql->bindValue(":title", $title);//associate database title attribute to php variable
			$sql->bindValue(":startDate", $startDate);//associate database startDate attribute to php variable
			$sql->bindValue(":endDate", $endDate);//associate database endDate attribute to php variable
			$sql->bindValue(":del", $del);
			$sql->execute();//Execute Query
			
			echo "<script language='javascript'>\n";
			echo "alert('Announcement updated successfully!'); window.location.href='http://br-t2-jci.sfcrjci.org/editorHome.php';";//Announcement post successful
			echo "</script>\n";
		}else{
			$annError = "<p style='font-family:talo; color:black; font-size:16px;'>Selection Error</p>";
		}
	}
}
}
?>			