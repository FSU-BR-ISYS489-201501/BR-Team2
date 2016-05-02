<?php
session_start();
include('includes/profileManagementPull.php');
$priv = ($_SESSION['secureLevel']);
if(isset($_SESSION['login_user'])){
} else {
header("Location: index.php");
						// Redirecting To Home Page
}
				
					/*
					Last Edited: Date 5/2/2016
					Attribution:	
						Created By: Erik Obodzinski 
						Edited by: Erik Obodzinski & Josh Stocking
						
					Description:
						This page is controls when the editors downloads a case and where or not the case has been approved or denied.
					
					This page is where any user 'Author' is redirected to based off of database usertype variable
					here they are able to upload cases and view cases they have previously uploaded
					*/
				?>
				
				<!DOCTYPE html>
				<html lang="en">
				
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>Profile Management</title>
					<!--[if lt IE 9]>
						<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
						<![endif]-->
					<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
					<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
				</head>
				
				<body>
					<div class="container">
						<?php include( "includes/userHeader.php");//Includes user Header?>
						<div class="content">
							<?php include( "includes/subHeader.php");//Includes JCI logo?>
							<div class="row gutter">
								
									<div class=" col s8 m8 tabs"><!--Tabs to switch between either New User or Current User-->
										<ul class="tab-links">
												<li class="active"><a href="#tab2"><img class="tabicon" src="../images/newusericon.svg">Profile Management</a></li> 
										</ul>
										<div class="tab-content">
											 
												<div id="tab2" class="tab active">
													<form action="" method="post"> <!-- New User Registration Form Starts-->
													<ul class="list-form">
													<span><?php echo $alert;//Update successful?></span>
                                                    <span><?php echo $error;//Update unsuccessful?></span>
													<?php
													
				
													$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
													$username = "T2BRGOLIVE";
													$password = "B1G70N@";
													$_SESSION['folder'] = $_GET['loc'];
													try{ //try database connection
														$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
													} catch (PDOException $error) { //error handling
														echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
													}
													//User table select
													$sql = "SELECT * FROM `user` WHERE `userID` = ".$_SESSION['user']; //I want to see all existing announcements from database
													
														$userMgmt = $dbConnect->query($sql);
														$i=0;
														
														foreach ($userMgmt as $row) { //row formatting
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">Title:</label>';
														echo '	<input id="title" name="title" type="text" value="' .$row['title'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*First Name:</label>';
														echo '	<input id="firstName" name="firstName" type="text" value="' .$row['firstName'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*Last Name:</label>';
														echo '	<input id="lastName" name="lastName" type="text" value="' .$row['lastName'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">Suffix:</label>';
														echo '	<input id="suffix" name="suffix" type="text" value="' .$row['suffix'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">Suffix Two:</label>';
														echo '	<input id="suffixTwo" name="suffixTwo" type="text" value="' .$row['suffixTwo'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*Email:</label>';
														echo '	<input id="email" name="email" type="text" value="' .$row['email'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '    <label id="form-text" class="textlabelwhite">*Employer:</label>';
														echo '	<input id="employer" name="employer" type="text" value="' .$row['employer'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '    <label id="form-text" class="textlabelwhite">Expertise:</label>';
														echo '	<input id="expertise" name="expertise" type="text" value="' .$row['expertise'].'">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '    <label id="form-text" class="textlabelwhite">*Primary Address:</label>';
														echo '	<input id="primaryAddress" name="primaryAddress" value="123 Main" type="text">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">Secondary Address:</label>';
														echo '	<input id="secondaryAddress" name="secondaryAddress" value="123 Main" type="text">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*City:</label>';
														echo '	<input id="city" name="city" type="text" value="Big Rapids">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*State/Province:</label>';
														echo '	<input id="state" name="state" type="text" value="Michigan">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*Zip Code:</label>';
														echo '	<input id="zip" name="zip" value="49307" type="text">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<label id="form-text" class="textlabelwhite">*Country:</label>';
														echo '	<input id="country" name="country" value="United States" type="text">';
														echo '</li>';
														echo '<li class="textfield-container">';
														echo '	<li class="textfield-container">';
														echo '	<label for="text" class="textlabelwhite">Phone Type:</label>';
														echo '		<div class="statedropdown">';
														echo '			<label for="select" class="select">';
														echo '				<select name="phoneType" id="select">';
														echo '					<a href="#" class="button arrow greyarrowsingledown"></a>';
														echo '					<option value="phoneType"></option>';
														echo '				    	<option value="1">Home</option>';
														echo '						<option value="2">Cell</option>';
														echo '						<option value="3">work</option>';
														echo '				   	</select>';
														echo '				</label>';
														echo '			</div>	';
														echo '</li>';
														
														}
														?>
														<input id="updateButton" name="update" class="button" style="border:0;" type="submit" value=" Update "> <!--Action: Attempts to Register-->
													</ul>	
												</form>
												</div>
										   </div>  <!-- tab-content -->
									</div>	 <!-- tabs -->
									</div>
							</div>
							 <?php include("includes/footer.php");//Includes Footer Navigation?>
						</div>
					</div>
					<script src="../js/jquery-1.12.0.min.js"></script>
					<script src="../js/tabs.js"></script>
					<script src="../js/searchdropdown.js"></script>
				</body>
				</html>