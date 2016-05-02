<?php
/*
	Last Edited: Date 4/26/2016
	
	Attribution:	
		Created By: Erik Obodzinski
			Edited by: 
	
	Description:
		This page is where any user 'Author' is redirected to based off of database usertype variable
		here they are able to upload cases and view cases they have previously uploaded
*/
session_start();
$priv = ($_SESSION['secureLevel']);	
if(isset($_SESSION['login_user'])){
	} else {
		header("Location: index.php");
	}
if($priv >= 1){
	} else {
		header("Location: index.php");
	}
include( "includes/userFetch.php");//Includes user Header
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCI : Author Home</title>
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
            
<form action="includes/updateSite.php" id="testForm" method="post" enctype="multipart/form-data">
   <input id="caseIDtest" type="hidden" name="caseIDtest" value = "">
   <!--new case upload form starts here -->
                                <ul class="list-form">
                                    <label>Select Files to Upload:</label>
                                    <br/>
									<!-- creating the upload file buttons for each of the five files that need to be submitted -->
                                    <li class="textfield-container">
                                    	<label>Home Banner:</label>
                                        <img class="image" src="../images/conference.jpg">
                                        <input name="userfile3[]" type="file" size="50" />
                                        <label>About Picture 1:</label>
                                        <img class="image" src="../images/register.jpg">
                                        <input name="userfile3[]" type="file" size="50" />
                                        <label>About Picture 2:</label>
                                        <img class="image" src="../images/BrothertonAndRedmer.jpg">
                                        <input name="userfile3[]" type="file" size="50" />
                                        <label>Editorial Policy:</label>
                                        <a href='includes/JCI_Editorial_Policy.pdf' class="button sm long ghost">Download Editorial Policy</a>
                                        <input name="userfile3[]" type="file" size="50" />
                                        <label>JCI Guidelines:</label>
                                        <a href='includes/SCR_Manuscript_Guidelines_for_Authors.pdf' class="button sm long ghost">Download Guidelines</a> <!-- pdf link -->
                                        <input name="userfile3[]" type="file" size="50" />
                                        <label>Ethics Policy:</label>
                                       <a href='includes/Publication Ethics Policy and Malpractice Statement.pdf' class="button sm long ghost">Download Ethics Policy</a> <!-- pdf link -->
                                        <input name="userfile3[]" type="file" size="50" />
                                        <br />
										<!-- Final submit button for the form -->
                                        <input type="submit" class="button" style="border:0; width:auto; padding:5px;" value="Update Files" name="submitUpdate">
                                    </li>
                                </ul>
   </form>
   </div>
   </div>
   </div>
   </body>
   </html>