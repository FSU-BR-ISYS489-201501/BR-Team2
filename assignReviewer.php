<?php
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton and Erik Obozinski
	Edited by: Tyler Newton
	
Description:
	This page is where the Editor can view the cases assigned to them and then assign reviewers to those cases.
	You can view all registered reviewers from this page as well.
*/
session_start();
$priv = ($_SESSION['secureLevel']);	
if(isset($_SESSION['login_user'])){
	} else {
		header("Location: index.php");
	}
if($priv >= 4){
	} else {
		header("Location: index.php");
	}
include('includes/editSubmissionsPull.php'); // Includes Update Script
include('includes/caseDownloadPull.php');
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
		<?php include("includes/userHeader.php");?>
		<div class="content">
		<?php include("includes/subHeader.php");?>	
            <div class="row gutter">
				<div class="col s6 m4">
                    <div class="titleboxmargin grey" style="width:100%;">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg"> 
						<!-- creating the how to box with instructions on how to assign reviewers -->
                        <h3 class="title">How - To</h3>
                    </div>
                    <div class="col yellow-light">
                    	<div class="filledboxcontent">
							<!-- listing all of the steps to assign editors -->
                        	<p>From this tab you can assign editors to each case</p>
                            <p><strong>Step 1:</strong> All unassigned cases will display on the right.</p>
                            <p><strong>Step 2:</strong> All editors and their information is displayed below.</p>
                            <p><strong>Step 3:</strong> Select the editor from the drop-down list.</p>
                            <p><strong>Step 4:</strong> Click Assign Editor.</p>
                        </div>
                    </div>
				</div>
				<div class="col m8 s6">
            		<div class="titlebox grey">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">Submissions List</h3>
        			</div>
                    <!-- Creating the table of submissions, listing all of the avalible cases -->
                    <div class="yellow-light" style="height:300px; position:relative; overflow:auto;">
						<table style="position:absolute; top:0; overflow:hidden;">
						<tbody style="height:auto; display:table; width:100%; overflow:hidden;">
                    	<tr>
                        	<th>Case ID</th>
                        	<th>Title</th>
                            <th>Abstract</th>
                            <th>Reviewers</th>
                            <th>Assign</th>
                        </tr>
                    <?php include("includes/getCaseReviewer.php");?>  
					<!-- including the file to pull the cases reviewers are assigned from the database -->	
                        </tbody> 
                    </table>
                    
                    </div>
                    <br>
                    
                    </div>
                    <br></br>
                    
                    <div class="col m8 s6" style="float:right;">
            		<div class="titlebox grey">
                        <div class="bar yellow"></div>
                        <img class="boxicon" src="../images/submissionicon.svg">
                        <h3 class="title">Reviewer Information</h3>
        			</div>
                    <div class="yellow-light" style="height:300px; position:relative; overflow:auto;">
                    <?php include("includes/getReviewers.php");?>
					<!-- include the file to pull the reviewers from the database -->
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