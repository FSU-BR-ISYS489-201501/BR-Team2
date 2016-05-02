<?php
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton and Chad Marshall
		
Description:
	This page lists all published journals, allows the editor to submit a new journal, and allows the editor to toggle the 
	visibility status of all current journals. This page is mainly forms with a single function, See uploadJounral.php and journalUpdatePull.php 
	for the other functions of this page.
*/
session_start();
include('uploadJournal.php');
include('includes/journalUpdatePull.php');
$priv = ($_SESSION['secureLevel']);	
if(isset($_SESSION['login_user'])){
	} else {
		header("Location: index.php");
	}
if($priv >= 5){
	} else {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCI : Publish Journal</title>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body bgcolor="white">
    <div class="container">
        <?php include( "includes/userHeader.php");?>
        <div class="content">
            <?php include( "includes/subHeader.php");?>
            <div class="row gutter">
                <!-- Uploaded files box Class -->
                <div class="col m4 s6">
                    <!-- Title Bar -->
                    <div class="titleboxmargin grey" style="width:100%;">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">Current Journals:</h3>
                    </div>
                    <!-- Box that displays uploaded files -->
                    <div class="yellow-light" style="height:370px; width:100%; position:relative; overflow:auto;">
                       <table style="position:absolute; top:0; overflow-y:scroll;">
										<tbody style="height:auto; display:table; width:100%; overflow-y:scroll;">
										<tr>
											<th>ID</th>
											<th>Title</th>
											<th>Date Published</th>
                                            <th>Displayed</th>
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
										
										$journalMgmtReturn = "SELECT * FROM `journal`";
				
										$journalMgmt = $dbConnect->query($journalMgmtReturn);
					
										foreach ($journalMgmt as $row) {
											if ($row["displayed"] == 1) {
												$displayed = "<span style=color:green;>Yes</span>";
											}else{
												$displayed = "<span style=color:red;>No</span>";
											}
											
											print "<tr> <td>" . $row["journalID"] . "</td> <td>" . $row["title"] . "</td> <td>" . $row["datePublished"] . "</td> <td>" . $displayed . "</td></tr><br/>";
										}
										?>  
										</tbody>  
									</table>
                    </div>
                </div>
                <!-- end of uploaded files box class -->
                <!-- Upload form class -->
                <div class="col m8 s6">
                    <!-- Title bar above upload form -->
                    <div class="titlebox grey">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg"></img>
                        <h3 class="title">Upload New JCI Submission</h3>
                    </div>
                    <!-- Upload form -->
                    <div class="yellow-light" style="padding-top:10px; padding-bottom:10px;">
                        <form action="uploadJournal.php" method="post" enctype="multipart/form-data">
                            <ul class="list-form">
                                <li class="textfield-container">
                                    <label>Journal Title:</label>
                                    <input id="text" type="text" name="journalTitle" placeholder="Journal Title">
                                </li>
                                <li class="textfield-container">
                                        <label>Journal Abstract:</label>
                                        <textarea id="textarea" name="abstract" rows="7" placeholder="Type or Paste Your Abstract Here"></textarea>
                                </li>
                                <li class="textfield-container">
                                    <label>Select Files to Upload:</label>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <br />
                                    <input type="submit" class="button" style="border:0; width:auto; padding:5px;" value="Upload" name="submit">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                
               <div class="col m8 s6" style="float:right;"><!--Update User Type Form Starts-->
            		<div class="titlebox grey">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">Display / Hide</h3>
        			</div>
                    <div class="yellow-light" style="padding-top:20px; height:300px;">
                    <form action="" method="post">
									<ul class="list-form">
										<li class="textfield-container">
											<label for="text" class="textlabelblack">ID:</label>
								    		<input id="text" name="journalID" placeholder="10" type="text">
										</li>
										<li class="textfield-container">
                                        	<li class="textfield-container">
											<label for="text" class="textlabelblack">Status:</label>
												<div class="statedropdown">
													<label for="select" class="select">
														<select name="journalStatus" id="select">
															<a href='#' class="button arrow greyarrowsingledown"></a>
																<option value="0">Select Journal Status:</option>
														    	<option value="1">Display</option>
																<option value="2">Hide</option>
														   	</select>
														</label>
													</div>	
										</li>
										<span style="padding-left:10px;"><input id="journalUpdate" style="border:0;" name="journalUpdate" class="button" type="submit" value=" Update "></span>
										<span><?php echo $journalError;//user update unsuccessful ?></span>
									</ul>	
								</form>
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