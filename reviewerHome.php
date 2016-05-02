<?php
/*
Last Edited: Date 4/26/2016
Attribution:	
	Created By: Erik Obozinski and Chad Marshall
	Edited By: Tyler Newton
		
Description:
	This page gives reviewers the opportunity to view cases that they have been assigned to.
	It also allows them to submit new reviews to cases that they have been assigned to.
*/

//create secure session
session_start();
$priv = ($_SESSION['secureLevel']);
if(isset($_SESSION['login_user'])){
if($priv >= 2){
	} else {
		header("Location: index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCI: Reviewer Home</title>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
    <!--Includes user header-->
        <?php include( "includes/userHeader.php");?>
        <div class="content">
        <!--Includes the sub header for different actors in the process-->
            <?php include( "includes/subHeader.php");?>
            <div class="row gutter">
                <div class="col m4 s4">
                    <!--col m4 s4 starts here-->
                    <div class="titleboxmargin grey">
                        <div class="bar salmon"></div>
                        <img class="boxicon" src="../images/notificationicon.svg">
                        <!--Starts the section for the iFrame of uploaded reviews-->
                        <h3 class="title">Uploaded Reviews:</h3>
                    </div>
                    <!--Gets the file location from URL set by JS function on the view files button on the assigned cases tab-->
                    <div class="boxcontent col">
                    <?php $_SESSION['folder'] = $_GET['loc']; ?>
                        <iframe id ="submittedFiles" src="cases/downloadReview.php"></iframe>
                    </div>
                    <p><i>Review files uploaded for each case will be displayed here. Click on the title to download the file. Both Word Documents and PDFs are accepted.</i>
                    </p>
                    <div class="titleboxmargin grey">
                        <div class="bar salmon"></div>
                        <img class="boxicon" src="../images/notificationicon.svg">
                        <!--Starts the section for the iFrame of uploaded cases-->
                        <h3 class="title">Case Files:</h3>
                    </div>
                    <!--Gets the file location from URL set by JS function on the view files button on the assigned cases tab-->
                    <div class="boxcontent col">
                    <?php $_SESSION['folder'] = $_GET['loc']; ?>
                        <iframe id ="submittedFiles" src="cases/downloadCase.php"></iframe>
                    </div>
                    <p><i>All associated files with the case will be displayed in the above box.</i>
                    </p>
                </div>
                <!--col m4 s4 ends here-->

                <div class=" col m8 s8 tabs">
                    <!--col m8 s8 starts here-->
                    <!--Cases and submit review tabs-->
                    <ul class="tab-links">
                        <li class="active"><a href="#tab2">Incidents for Review</a>
                        </li>
                        <li><a href="#tab1">Submit A Review</a>
                        </li>
                    </ul>

                    <div class="tab-content" style="padding:0; background:#DB9E8C;">
                        <div id="tab2" class="tab active" style="padding:0;">
                        <!--Uses the file reviewerPull to fille the cases tab with assigned cases to that reviewer-->
                            <form>
                                 <div class="salmonresults" style="overflow:hidden;">
                                    <!--teal results starts here-->
                                    <?php include("includes/reviewerPull.php");//Includes Reviewer SQL Query?>	
                                </div>
                            </form>
                        </div>

						<!-- creating the form for uploading reviews -->
                        <div id="tab1" class="tab">
                            <form action="uploadReview.php" method="post" enctype="multipart/form-data">
                                <ul class="list-form">
                                    <li class="textfield-container">
                                        <label for="text" class="textlabelwhite">Critical Incident Title:</label>
                                        <!--Uses the file below to create the drop down of assigned cases-->
                                        <?php include("includes/caseSelect.php");//Includes Reviewer SQL Query?>	
                                        
                                    </li>
                                    <br />
                                    <label>Select Review to Upload:</label>
                                    <li class="textfield-container">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <br />
                                        <input type="submit" value="Upload Review" name="submitReview">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--col m8 s8 ends-->
            <!--Include Footer-->
			<div><?php include( "includes/footer.php");?></div><!--footer navigation-->
        </div>
    </div>
    <!--Javascript files-->
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/folder.js"></script>
</body>

</html>