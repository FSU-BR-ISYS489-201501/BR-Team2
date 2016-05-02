				<?php
					session_start();
					include('includes/emailPull.php');
					$priv = ($_SESSION['secureLevel']);
					
					if(isset($_SESSION['login_user'])){
					} else {
						header("Location: index.php");
						// Redirecting To Home Page
					}
				
					/*
					Last Edited: Date 4/23/2016
					Attribution: Mail function http://www.w3schools.com/php/func_mail_mail.asp
								 Form created by Tyler Newton and updated by Josh Stocking
					Created By: Josh Stocking
		
					Description:
					This page is where the user may contact the website directly.  The page uses the emailPull page to 
					generate a php mail message that is sent to the jci@ferris.edu account.
					*/
				?>
				
				<!DOCTYPE html>
				<html lang="en">
				
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>JCI : Contact Us</title>
					<!--[if lt IE 9]>
						<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
						<![endif]-->
					<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
					<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
				</head>
				
				<body>
					<div class="container">
						<?php include( "includes/header.php");//Includes user Header?>
						<div class="content">
							
							<div class="row gutter">
								
									<div class=" col s8 m8 tabs"><!--Only one tab for Contact Form-->
										<ul class="tab-links">
												<li class="active"><a href="#tab2"><img class="tabicon" src="../images/newusericon.svg">Contact Us</a></li> 
										</ul>
										<div class="tab-content">
											 
												<div id="tab2" class="tab active">
													<form action="" method="post"> <!-- Contact Us Form Starts-->
													<ul class="list-form">
                                                    	<span><?php echo $alert;//Email Unsuccessful?></span>
														<li class="textfield-container">
                                                        	<label id="form-text" class="textlabelwhite">Name:</label>
                                                            <input id="fullName" name="fullName" type="text" placeholder="John Smith">
                                                        </li>
                                                        <li class="textfield-container">
                                                        	<label id="form-text" class="textlabelwhite">Email:</label>
                                                            <input id="email" name="email" type="text" placeholder="JohnSmith@University.edu">
                                                        </li>
                                                        <li class="textfield-container">
                                        					<label id="form-text" class="textlabelwhite">Message:</label>
                                        					<textarea id="textarea" rows="7" name="message"></textarea>
                                    					</li>
														<input id="sendEmail" name="sendEmail" class="button" style="border:0;" type="submit" value=" Send "> <!--Action: Attempts to Email-->
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