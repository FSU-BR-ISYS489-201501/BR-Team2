<?php
/*
Last Edited: Date 4/20/2016
Attribution:	
	Created By: Tyler Newton
	Array Issue Resolved Here: http://stackoverflow.com/questions/36391259/pdo-fetch-assoc-returns-the-word-array
		
Description:
	This page is where the user 'Editor' manages users. Here the 'Editor' is able to view all current users within the database
	and is able to update a user's user type by inputting their email and then selecting a specific usertype.
*/
session_start();
$priv = ($_SESSION['secureLevel']);	
if(isset($_SESSION['login_user'])){
	} else {
		header("Location: index.php");
	}
if($priv >= 5){
	} else {
		header("Location: index.php");
	}
include('includes/userMgmtPull.php'); // Includes Update Script
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JCI: User Management</title>
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
            <div class="row gutter"><!--User Manager Instructions-->
				<div class="col s6 m4">
                    <div class="titleboxmargin grey" style="width:100%;">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">How - To</h3>
                    </div>
                    <div class="col yellow-light">
                    	<div class="filledboxcontent">
                        	<p>From this tab you can manage all registered users account type/status.</p>
                            <p><strong>Step 1:</strong> Locate desired user and note their email address.</p>
                            <p><strong>Step 2:</strong> Enter the noted email address in the form below.</p>
                            <p><strong>Step 3:</strong> Select the desired user type.</p>
                            <p><strong>Step 3:</strong> Click update.</p>
                        </div>
                    </div>
				</div>
				<div class="col m8 s6">
            		<div class="titlebox grey">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">Current Users</h3>
        			</div>
                    <div class="yellow-light" style="height:300px; position:relative; overflow:auto;">
						<table style="position:absolute; top:0; overflow:hidden;">
						<tbody style="height:auto; display:table; width:100%; overflow:hidden;">
                    	<tr>
                        	<th>Last Name</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Author</th>
                            <th>Reviewer</th>
                            <th>Intern</th>
                            <th>Little Editor</th>
                        </tr>
                    <?
						$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
						$username = "T2BRGOLIVE";
						$password = "B1G70N@";

						try{//try database connection
							$dbConnect = new PDO($dbConnect, $username, $password);//if successful, connect
						}catch (PDOException $error) {//error handling
							echo 'Error Connecting: ' . $error->getMessage();//display connect unsuccessful error
						}
						//User table select
						$userMgmtReturn = "SELECT * FROM user";

    					$userMgmt = $dbConnect->query($userMgmtReturn);//execute query
	
    					foreach ($userMgmt as $row) {
							//checks all select user's user types
							if ($row["author"] == 1) {
								$author = "<span style=color:green;>Yes</span>";
							}else{
								$author = "<span style=color:red;>No</span>";
							}
							
							if ($row["reviewer"] ==1) {
								$reviewer = "<span style=color:green;>Yes</span>";
							}else{
								$reviewer = "<span style=color:red;>No</span>";
							}
							
							if ($row["littleEditor"] == 1) {
								$littleEditor = "<span style=color:green;>Yes</span>";
							}else{
								$littleEditor = "<span style=color:red;>No</span>";
							}
							
							if ($row["intern"] == 1) {
								$intern = "<span style=color:green;>Yes</span>";
							}else{
								$intern = "<span style=color:red;>No</span>";
							}
							
    						print "<tr> <td>" .$row["lastName"] . "</td> <td>" . $row["firstName"] . "</td> <td> " . $row["email"] . "</td> <td>" .  $author . "</td> <td>" .  $reviewer . "</td> <td>" .  $intern . "</td> <td>" .  $littleEditor ."<br/>";
						}//prints query results from database
						?>  
                        </tbody>  
                    </table>
                    </div>
                    </div>
                    
                    <div class="col m8 s6" style="float:right;"><!--Update User Type Form Starts-->
            		<div class="titlebox grey">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">Update User Type</h3>
        			</div>
                    <div class="yellow-light" style="padding-top:20px; height:300px;">
                    <form action="" method="post">
									<ul class="list-form">
										<li class="textfield-container">
											<label for="text" class="textlabelblack">Email:</label>
								    		<input id="text" name="userEmail" placeholder="user@email.com" type="text">
										</li>
										<li class="textfield-container">
                                        	<li class="textfield-container">
											<label for="text" class="textlabelblack">User Type:</label>
												<div class="statedropdown">
													<label for="select" class="select">
														<select name="userType" id="select">
															<a href='#' class="button arrow greyarrowsingledown"></a>
																<option value="0">Select User Type:</option>
														    	<option value="1">Author</option>
																<option value="2">Reviewer</option>
																<option value="3">Intern</option>
                                                                <option value="4">Little Editor</option>
                                                                <option value="5">* Inactive</option>
														   	</select>
														</label>
													</div>	
										</li>
										<span style="padding-left:10px;"><input id="userUpdate" style="border:0;" name="userUpdate" class="button" type="submit" value=" Update "></span>
										<span><?php echo $error;//user update unsuccessful ?></span>
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