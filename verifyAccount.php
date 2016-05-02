<?php
session_start();
include('includes/verifyPull.php');/*includes verifyPull function
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
		
Description:
	This page is where the user is instructed to verify their account with a verification code that was sent to their email. 
	It confirms their verifyCode entered is the same as the one present in the user table of the database.
	The function verifyPull is where the verifyCode database attribute is handled and appended in the database.
	*/
				?>
				<!DOCTYPE html>
				<html lang="en">
				<head>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>JCI: Verify Account</title>
						<!--[if lt IE 9]>
						<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
						<![endif]-->
						<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
						<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
				</head>
				<body>
					<div class="container">
						<?php include("includes/header.php")//Includes Header Navigation;?>	
						<!--search part ends-->
						<div class="content">
							<div class="row gutter"></div>
							<div class="row gutter"><!--Row gutter starts-->
								<div class="homepageimage"><!--Some instructions for activating an account-->
								<div class="col s4 m4">
										   <h5 class="login">Activate Your Account</h5>
										   <p>We have sent an email to your specified email address with a unique code. Please enter that code here to complete your account registration. <br /> <br /> <strong>PLEASE NOTE:</strong> It may take serveral minutes for the email to appear in your inbox.</p> 				
									</div>
									<div class=" col s8 m8 tabs">
										<ul class="tab-links">
												<li class="active"><a href="#tab1"><img class="tabicon" src="../images/currentusericon.svg">Activate Account</a></li>
										</ul>
									<div class="tab-content">
												<div id="tab1" class="tab active">
													<form action="" method="post">
													<ul class="list-form">
														<li class="textfield-container">
															<label for="text" class="textlabelwhite">Unique Code:</label>
															<input id="text" name="code" placeholder="123456789" type="text">
														</li>
														<input id="login-button" name="verifySubmit" class="button" type="submit" value=" Activate "><!--Action: Attempts to active account in database -->
														<span><?php echo $verifyError;//verification unsuccessful ?></span>
													</ul>	
												</form>
										   </div>
									</div>
									</div>                     
								</div> <!--Getting Started ends--> 	
							</div>
							<?php include("includes/footer.php")//Includes Footer Navigation;?>
						</div>
					</div>
					<script src="../js/jquery-1.12.0.min.js"></script>
					<script src="../js/tabs.js"></script>
					<script src="../js/searchdropdown.js"></script>
				</body>
				</html>