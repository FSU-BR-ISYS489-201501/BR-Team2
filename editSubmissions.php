<?php
/*
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
		
Description:
	This page lists all submitted cases and their current status. 
	The Editor will enter the ID of the case in the bottom form and download the case files
	Once the case files have been download the Editor can approve or deny the case.
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
include('includes/editSubmissionsPull.php'); // Includes Update Script
include('includes/caseDownloadPull.php'); //includes 'Editor' case download 
?>
				<!DOCTYPE html>
				<html lang="en">
				<head>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>JCI: Submission Editor</title>
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
							<div class="row gutter">
								<div class="col s6 m4">
									<div class="titleboxmargin grey" style="width:100%;">
										<div class="bar yellow"></div>
										<img class="boxicon" src="../images/submissionicon.svg">
										<h3 class="title">How - To</h3>
									</div>
									<div class="col yellow-light"><!--Instructions for Editing Submissions-->
										<div class="filledboxcontent">
											<p>From this tab you can approve or deny author submissions.</p>
											<p><strong>Step 1:</strong> Locate desired Critical Incident and note the Incident ID.</p>
											<p><strong>Step 2:</strong> Enter the noted ID in the form below.</p>
											<p><strong>Step 3:</strong> Select your Ruling.</p>
											<p><strong>Step 4:</strong> Click update.</p>
										</div>
									</div>
								</div>
								<div class="col m8 s6">
									<div class="titlebox grey">
										<div class="bar yellow"></div>
										<img class="boxicon" src="../images/submissionicon.svg">
										<h3 class="title">Submissions List</h3>
									</div>
									<div class="yellow-light" style="height:300px; position:relative; overflow:auto;">
										<table style="position:absolute; top:0;">
										<tbody style="height:auto; display:table; width:100%;">
										<tr>
											<th>ID</th>
											<th>Title</th>
											<th>Author</th>
											<th>Date Submitted</th>
											<th>File Location</th>
											<th>Download Status</th>
											<th>Approve Status</th>
										</tr>
									<?php
										$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
										$username = "T2BRGOLIVE";
										$password = "B1G70N@";
				
										try{
											$dbConnect = new PDO($dbConnect, $username, $password);
										} catch (PDOException $error) {
											echo 'Error Connecting: ' . $error->getMessage();
										}
										
										$caseMgmtReturn = "SELECT * FROM `case`";
				
										$caseMgmt = $dbConnect->query($caseMgmtReturn);
					
										foreach ($caseMgmt as $row) {
											if ($row["downloadStatus"] == 1) {
												$download = "<span style=color:green;>Yes</span>";
											}else{
												$download = "<span style=color:red;>No</span>";
											}
											
											if ($row["approvedStatus"] ==1) {
												$approve = "<span style=color:green;>Yes</span>";
											}else{
												$approve = "<span style=color:red;>No</span>";
											}
											$user = $row["userID"];
											//User table select
											$firstPull = $dbConnect->prepare("SELECT `firstName` FROM `user` WHERE `userID`=:user");
											$firstPull->bindValue(":user", $user);//associate php variable with database userID
											$firstPull->execute();//execute query
											$values = $firstPull->fetchAll(PDO::FETCH_ASSOC);//store MySQL result
											print "<tr> <td>" . $row["caseID"] . "</td> <td>" . $row["title"] . "</td> <td>" . $values[0]['firstName'] . "</td> <td> " . $row["dateSubmitted"] . "</td> <td>" .  $row["fileLocation"] . "</td> <td>" .  $download . "</td> <td>" .  $approve ."</td></tr><br/>";
										}
										?>  
										</tbody>  
									</table>
									</div>
									</div>
									
									<div class="col m8 s6" style="float:right;"><!--Approve/Deny Case Submission-->
									<div class="titlebox grey">
										<div class="bar yellow"></div>
										<img class="boxicon" src="../images/submissionicon.svg">
										<h3 class="title">Approve / Deny</h3>
									</div>
									<div class="yellow-light" style="padding-top:20px;">
									<form action="" method="post">
													<ul class="list-form">
														<li class="textfield-container">
															<label for="text" class="textlabelblack">Submission ID:</label>
															<input id="text" name="subID" placeholder="1" type="text">
														</li>
														<li class="textfield-container">
															<li class="textfield-container">
															<label for="text" class="textlabelblack">Approve / Deny:</label>
																<div class="statedropdown">
																	<label for="select" class="select">
																		<select name="approveDeny" id="select"><!--Drop down to select case submission status decision-->
																			<a href='#' class="button arrow greyarrowsingledown"></a>
																				<option value="0">Select Decision:</option>
																				<option value="1">Approve</option>
																				<option value="2">Deny</option>
																			</select>
																		</label>
																	</div>	
														</li>
														<span style=" padding-left:10px; float:left;"><input id="submissionEdit" style="border:0;" name="submissionEdit" class="button" type="submit" value=" Update "></span><!--Action: Attempts to update case submission status-->
														<span style="padding-left:10px;"><input id="submissionDownload" style="border:0;" name="submissionDownload" class="button" type="submit" value=" View Cases "></span><!--Action: Attempts to download submitted cases-->
														<br /><br /><br />
														<span><?php echo $subEdError; ?></span>
														<table height="100px" style="margin-top:0px; overflow-y:scroll;">
														<tbody style="overflow:hidden; height:auto; display:table; table-layout:fixed; width:100%;">
															<tr>
																<th>Available Cases</th>
															</tr>
														<span><?php
														echo $count;
															$count = $_SESSION['count'];
																for($b=0; $b<$count; $b++){
																	echo "<tr><td>".$downloadCase[$b]."</td></tr><br />";
																}
															$_SESSION['count'] = 0;
															?>
														</span>
															</tbody>  
														</table>
													</ul>	
												</form>
									</div>
									</div>
								</div>
							</div>
							<div><?php include( "includes/footer.php");?></div><!--footer navigation-->
						</div>
					</div>
					<script src="../js/jquery-1.12.0.min.js"></script>
					<script src="../js/tabs.js"></script>
				</body>
				</html>