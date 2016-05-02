<?php
session_start();
include('includes/login-pull.php'); // Includes Login Script
include('includes/registerPull.php'); // Includes Login Script
/*
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
		
Description:
	This page grabs is the memeber registration/login with a default active tab being new user.
	The login form will post to login-pull.php 
	The register gorm will post to registerPull.php
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JCI: Login</title>
        <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
	
	<div class="container">
		<?php include("includes/header.php");//Includes header navigation?>
       		
		<!--search part ends-->
		<div class="content">
			<div class="row gutter"></div>
			<div class="row gutter">
				<div class="col s4 m4">
		                   <h5 class="login">New Users</h5>
						   <p>A quick summary for new users will be here. When you click the tab to Current Users, a quick summary for the current users 							should pop up.</p> 				
					</div>
					<div class=" col s8 m8 tabs"><!--Tabs to switch between either New User or Current User-->
						<ul class="tab-links">
						        <li class="active"><a href="#tab2"><img class="tabicon" src="../images/newusericon.svg">New Users</a></li> 
						        <li><a href="#tab1"><img class="tabicon" src="../images/currentusericon.svg">Current Users</a></li>
						</ul>
						<div class="tab-content">
						        <div id="tab1" class="tab">
									<form action="" method="post"> <!--User Login Form Starts -->
									<ul class="list-form">
										<li class="textfield-container">
											<label for="text" class="textlabelwhite">Email:</label><!--User Inputs Email-->
								    		<input id="text" name="email" placeholder="email" type="text">
										</li>
										<li class="textfield-container">
											<label for="password" class="textlabelwhite">Password:</label><!--User Inputs Password-->
											<input id="hash" name="hash" placeholder="**********" type="password">
										</li>
                                        <li>
										<input id="login-button" name="submit" class="button" style="border:0;" type="submit" value=" Login "><!--Action: Attempts to Login--><a href="recoverAccount.php" class="button" style="float:right; width:135px;">Recover Account</a>
	                                    </li>
										<span><?php echo $loginError;//Login unsuccessful?></span>  
                                        
									</ul>	
								</form>
						        </div>
						        <div id="tab2" class="tab active">
									<form action="" method="post"> <!-- New User Registration Form Starts-->
									<ul class="list-form">
                                    <span><?php echo $error;//Registration unsuccessful?></span>
                                    	<li class="textfield-container">
                                       		<label id="form-text" class="textlabelwhite">Title:</label>
											<input id="title" name="title" type="text" placeholder="Mr/Mrs/Miss/Dr">
										</li>
										<li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">*First Name:</label>
											<input id="firstName" name="firstName" type="text" placeholder="Jane">
										</li>
										<li class="textfield-container">
											<label id="form-text" class="textlabelwhite">*Last Name:</label>
											<input id="lastName" name="lastName" type="text" placeholder="Doe">
										</li>
										<li class="textfield-container">
											<label id="form-text" class="textlabelwhite">Suffix:</label>
											<input id="suffix" name="suffix" type="text" placeholder="Ph.D/M.S.">
										</li>
										<li class="textfield-container">
                   							<label id="form-text" class="textlabelwhite">Suffix Two:</label>
											<input id="suffixTwo" name="suffixTwo" type="text" placeholder="Sr/Jr/II/IV">
										</li>
										<li class="textfield-container">
											<label id="form-text" class="textlabelwhite">*Email:</label>
											<input id="email" name="email" type="text" placeholder="JaneDoe@gmail.com">
										</li>
										<li class="textfield-container">
                                            <label id="form-text" class="textlabelwhite">*Employer:</label>
											<input id="employer" name="employer" type="text" placeholder="Ferris State University">
										</li>
                                        <li class="textfield-container">
                                            <label id="form-text" class="textlabelwhite">Expertise:</label>
											<input id="expertise" name="expertise" type="text" placeholder="Accounting, Business Administration">
										</li>
										<li class="textfield-container">
											<label id="form-text" class="textlabelwhite">*Password:</label>
											<input id="password" name="password" type="password" placeholder="**********">
										</li>
										<li class="textfield-container">
											<label id="form-text" class="textlabelwhite">*Confirm Password:</label>
											<input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="**********">
										</li>
                                        <li class="textfield-container">
                                            <label id="form-text" class="textlabelwhite">*Primary Address:</label>
											<input id="primaryAddress" name="primaryAddress" placeholder="1234 Main Street" type="text">
                						</li>
                                        <li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">Secondary Address:</label>
											<input id="secondaryAddress" name="secondaryAddress" placeholder="1234 Main Street" type="text">
                                        </li>
                                        <li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">*City:</label>
											<input id="city" name="city" type="text" placeholder="Big Rapids">
                                        </li>
                                        <li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">*State/Province:</label>
											<input id="state" name="state" type="text" placeholder="Michigan">
                                        </li>
                                        <li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">*Zip Code:</label>
											<input id="zip" name="zip" placeholder="12345" type="text">
                                        </li>
                                        <li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">*Country:</label>
											<input id="country" name="country" placeholder="United States" type="text">
                                        </li>
                                        <li class="textfield-container">
                                        	<li class="textfield-container">
											<label for="text" class="textlabelwhite">Phone Type:</label>
												<div class="statedropdown">
													<label for="select" class="select">
														<select name="phoneType" id="select">
															<a href='#' class="button arrow greyarrowsingledown"></a>
															<option value="phoneType">Select A Phone Type:</option>
														    	<option value="1">Home</option>
																<option value="2">Cell</option>
																<option value="3">work</option>
														   	</select>
														</label>
													</div>	
										</li>
                                        <li class="textfield-container">
                                        	<label id="form-text" class="textlabelwhite">*Country Code:</label>
											<input id="countryCode" name="countryCode" placeholder="1" type="text">
                                        </li>
                                        <li class="textfield-container">
                                            <label id="form-text" class="textlabelwhite">*Primary Phone:</label>
											<input id="primaryPhone" name="primaryPhone" placeholder="(123)555-5555" type="text">
                                        </li>
                                        <li class="textfield-container">
                                            <label id="form-text" class="textlabelwhite">Secondary Phone:</label>
											<input id="secondaryPhone" name="secondaryPhone" placeholder="(123)555-5555" type="text">
                                        </li>
										<input id="registerButton" name="register" class="button" style="border:0;" type="submit" value=" Register "> <!--Action: Attempts to Register-->
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