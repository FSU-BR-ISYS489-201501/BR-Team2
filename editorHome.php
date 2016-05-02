<?php
/*
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
	Attributed JS Function(4/7/2016): http://stackoverflow.com/questions/36488613/update-form-value-with-php-and-js#36488951
	Attributed JS String Insert Function(4/8/2016): http://stackoverflow.com/questions/36490243/populate-multiple-form-fields-from-foreach-statement
		
Description:
	This page is where any user 'Editor' is redirected to based off of database usertype variable
	here they are able to Manage Announcements
*/
session_start();
$priv = ($_SESSION['secureLevel']);	
if(isset($_SESSION['login_user'])){
	} else {
		header("Location: index.php");
	}
if($priv >= 3){
	} else {
		header("Location: index.php");
	}
include('includes/postAnnouncement.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JCI: Editor Home</title>
        <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<?php include("includes/userHeader.php");//Includes user Header?>
		<div class="content">
		<?php include("includes/subHeader.php");//Includes JCI logo?>	
			<div class="row gutter"> <!--row gutter for content starts here-->
				<div class="col m4 s4"> <!--m4 starts here-->
                    <div class="titleboxmargin grey" style="width:103%; margin-left:-10px;">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/notificationicon.svg">
                        <h3 class="title">Edit Announcements</h3>
                    </div>
					<div class="boxcontent" style="height:450px; background:#F7E2C2;  overflow-y:scroll;">
                    	<div class="col">
                            				<?
				//Date 4/4/16
				//This page is to display Announcements from database, if the MySQL statement finds announcements, they will be displayed on the website
				
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

                ?>
                <script type="text/javascript">
                    function changeText(title, content, startDate, endDate, id, displayed){
						document.getElementById('endDate').value = document.getElementById(endDate).getAttribute('data-content');
						document.getElementById('startDate').value = document.getElementById(startDate).getAttribute('data-content');
                        document.getElementById('content').value = document.getElementById(content).getAttribute('data-content');
					    document.getElementById('title').value = document.getElementById(title).getAttribute('data-content');	 
						document.getElementById('idTest').value = document.getElementById(id).getAttribute('data-content');	  
						document.getElementById('announcementStatus').value = document.getElementById(displayed).getAttribute('data-content');	
               }
               </script>
               <?php
               foreach ($announcement as $row){ //Displays title, startDate, endDate from announcement table from database 
               $title = ($row["announcementID"] * 2);
			   $cont = $row["announcementID"] * 3;
			   $startDate = ($row["announcementID"] * 4);
			   $endDate = ($row["announcementID"] * 5);
			   $displayed = ($row["announcementID"] * 6);
			   $id =  ($row["announcementID"]);
			   

               echo "<h2 style=width:auto;padding-top:8px;margin-top:-30px;font-size:18px;><a style=text-decoration:none;color:#c4572f; >".$row["title"]."</a></h2><br>";
               echo "<p style=padding-top:10px;padding-left:10px>".$row["content"]."</p><br>";
               echo "<p style=font-size:10px;margin-bottom:-10px;>Posted: ".$row["startDate"]."</p><br>";
               echo '<input id="'.$title.'" data-content="'.$row["title"].'" type=button style=margin-bottom:5px;border:0; class=button onclick="changeText(id, '.$cont.', '.$startDate.', '.$endDate.', '.$id.'
			   , '.$displayed.');" value="Edit">';
               echo '<p style="display:none;" id="'.$cont.'"  data-content="'.$row["content"].'"></p>';
			   echo '<p style="display:none;" id="'.$startDate.'"  data-content="'.$row["startDate"].'"></p>';
			   echo '<p style="display:none;" id="'.$endDate.'"  data-content="'.$row["endDate"].'"></p>';
			   echo '<p style="display:none;"id="'.$id.'"  data-content="'.$row["announcementID"].'"></p>';
			   echo '<p style="display:none;"id="'.$displayed.'"  data-content="'.$row["displayed"].'"></p>';
               echo "<h5 style=line-height:2px;margin-bottom:30px;width:100%;border-top:solid thin #000;></h5><br>";
              }
				
				?>
				
                        </div>
					</div>
				</div> <!--m4 ends here-->
				<div class="col m8 s8"> <!--m8 starts here-->
                    <div class="titleboxmargin grey" style="width:100%;">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/announcementsicon.svg">
                        <h3 class="title">Announcements</h3>
                    </div>
                	<div class="col yellow-light"> <!--Announcement Form Starts-->
                    	<form id="annoucementForm" method="post">
							<ul class="yellow-form">
                            	<li style="display:none;">
                                	 <input id="idTest" name= "idTest" type="text">
                                </li>
								<li class="textfield-container">
									<label for="text" class="textlabelblack">Title:</label>
								    <input id="title" name= "title" type="text" placeholder="Title of My Announcement">
								</li>
								<li class="textfield-container">
									<label for="textarea" class="textlabelblack">Start Date:</label>
									<input type="date" id="startDate" name="startDate">
								</li>
								<li class="textfield-container">
									<label for="textarea" class="textlabelblack">End Date:</label>
									<input type="date" id="endDate" name="endDate">
								</li>
								<li class="textfield-container">
									<label for="textarea" class="textlabelblack">Announcement:</label>
									<textarea id="content" name="content" rows="7"></textarea>
								</li>
                                <li class="textfield-container">
                                        	<li class="textfield-container">
											<label for="text" class="textlabelblack">Status:</label>
												<div class="statedropdown">
													<label for="select" class="select">
														<select name="announcementStatus" id="select">
															<a href='#' class="button arrow greyarrowsingledown"></a>
																<option value="0">Select Announcement Status:</option>
														    	<option value="1">Display</option>
																<option value="2">Hide</option>
														   	</select>
														</label>
													</div>	
										</li>
								<li class="textfield-container">
                                <script type="text/javascript">
                    				function announcementFormReset(){
										document.getElementById("annoucementForm").reset();	 
               						}
               					</script>
									<div class="leftsidebutton">
                                    	<span><?php echo $annError;//Registration unsuccessful?></span>
										<input type="submit" class="button" style="width:75px; padding:5px; border:0;" name="postAnnouncement" value="Submit"/>
                                        <input type="button" class="button" style="width:75px; margin-left:25px; padding:5px; border:0;" onclick="announcementFormReset()" value="Clear"/>
									</div>
								</li>		
							</ul>
						</form>	
                	</div> <!--announcement form ends here-->	
				</div> <!--m8 ends here-->
            </div> <!--row gutter for content ends here-->
           <div><?php include( "includes/footer.php");?></div>
        </div>
	</div>
    <script src="../js/jquery-1.12.0.min.js"></script>
	<script src="../js/tabs.js"></script>
</body>
</html>