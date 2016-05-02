<?php
/*
	Last Edited: Date 4/23/2016
	
	Attribution:	
		Created By: Tyler Newton, Erik Obozinski and Chad Marshall
			Edited by: Josh Stocking
			
			http://stackoverflow.com/questions/10812141/jquery-get-content-of-clicked-span-by-class
			http://www.jqueryscript.net/lightbox/Super-Simple-Modal-Popups-with-jQuery-CSS3-Transitions.html
			http://stackoverflow.com/questions/7609130/set-the-value-of-a-input-field-with-javascript
	
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

<!--EDIT SUBMISSION POPUP FORM-->
<div id="popup" class="modal-box">  
  <header>
    <a href="#" class="js-modal-close close">CLOSE</a>
    <h3>Upload New Files to Case:</h3>
  </header>
  <div class="modal-body">
   <form action="updateCase.php" id="testForm" method="post" enctype="multipart/form-data">
   <input id="caseIDtest" type="hidden" name="caseIDtest" value = "">
   <!--new case upload form starts here -->
                                <ul class="list-form">
                                    <label>Select Files to Upload:</label>
                                    <br/>
									<!-- creating the upload file buttons for each of the five files that need to be submitted -->
                                    <li class="textfield-container">
                                    	<label>Critical Incident:</label>
                                        <input name="userfile2[]" type="file" size="50" />
                                        <label>Memo:</label>
                                        <input name="userfile2[]" type="file" size="50" />
                                        <label>Teaching Notes:</label>
                                        <input name="userfile2[]" type="file" size="50" />
                                        <label>Summary:</label>
                                        <input name="userfile2[]" type="file" size="50" />
                                        <label>Cover Page:</label>
                                        <input name="userfile2[]" type="file" size="50" />
                                        <br />
										<!-- Final submit button for the form -->
                                        <input type="submit" class="button" style="border:0; width:auto; padding:5px;" value="Update Files" name="submitUpdate">
                                    </li>
                                </ul>
   </form>
  </div>
  <footer>
    <a href="#" class="js-modal-close">Close Button</a>
  </footer>
</div>
<!--END POPUP FORM-->

    <div class="container">
        <?php include( "includes/userHeader.php");//Includes user Header?>
        <div class="content">
            <?php include( "includes/subHeader.php");//Includes JCI logo?>
            <div class="row gutter">
                <div class="col m4 s4">
                    <div class="titleboxmargin grey">
                        <div class="bar teal"></div>
                        <img class="boxicon" src="../images/notificationicon.svg">
					<!-- Creating the iFrame that displays all of the case files for a specific incident -->
                        <h3 class="title">Case Files:</h3>
                    </div>
                    <div class="boxcontent col">
                    <?php $_SESSION['folder'] = $_GET['loc']; ?>
                        <iframe id ="submittedFiles" src="cases/downloadCase.php"></iframe>
                    </div>
					<!-- description underneath the iFrame for users about cases -->
                    <p><i>Welcome to the JCI Author Home Page! To submit a new Critical Incident, click on the tab and fill out the form. Once you upload your files, an entry will be added to the table on the right. To view files for each submitted Critical Incident, click on the view files button. The files will appear in the window above, where you can click on the link to download them.</i>
                    </p>
                    
                    <div class="titleboxmargin grey">
                        <div class="bar teal"></div>
                        <img class="boxicon" src="../images/notificationicon.svg">
						<!-- Creating the iFrame that displays all of the review files for a specific incident -->
                        <h3 class="title">Review Files:</h3>
                    </div>
                    <div class="boxcontent col">
                    <?php $_SESSION['folder'] = $_GET['loc']; ?>
                        <iframe id ="submittedFiles" src="cases/downloadReview.php"></iframe>
                    </div>
					<!-- description underneath the iFrame for users about reviews -->
                    <p><i>Any reviews posted on this case will be displayed in the box above.</i>
                    </p>
                </div>

                <div class=" col m8 s8 tabsauthor">
                    <ul class="tab-linksauthor">
                        <li class="active"><a href="#tab2">Submissions</a>
                        </li>
                        <!--Shows all previously uploaded cases-->
                        <li><a href="#tab1">Submit A New Critical Incident</a>
                        </li>
                        <!--To upload a new case-->
                    </ul>
                    <div class="tab-contentauthor">
                        <div id="tab1" class="tab">
                            <form action="uploadCase.php" method="post" enctype="multipart/form-data">
                                <!--new case upload form starts here -->
                                <ul class="list-form">
                                    <li class="textfield-container">
                                        <label for="text" class="textlabelwhite">Critical Incident Title:</label>
                                        <input id="text" type="text" name="caseTitle" placeholder="Critical Incident Title">
                                    </li>
                                    <li class="textfield-container">
                                        <label for="password" class="textlabelwhite">Author(s):</label>
                                        <input id="text" type="text" name="authors" placeholder="Author">
                                    </li>
                                    <li class="textfield-container">
                                        <label for="password" class="textlabelwhite">Overview:</label>
                                        <textarea id="textarea" rows="7" name="notes" placeholder="Type or Paste Your Abstract Here"></textarea>
                                    </li>
                                    <li class="textfield-container">
                                        <label for="password" class="textlabelwhite">Keywords:</label>
                                        <input id="text" type="keywords" name="keywords" placeholder="Enter Keywords Separated By Commas">
                                    </li>
                                    <label>Select Files to Upload:</label>
                                    <br/>
									<!-- creating the upload file buttons for each of the five files that need to be submitted -->
                                    <li class="textfield-container">
                                    	<label>Critical Incident:</label>
                                        <input name="userfile[]" type="file" size="50" />
                                        <label>Memo:</label>
                                        <input name="userfile[]" type="file" size="50" />
                                        <label>Teaching Notes:</label>
                                        <input name="userfile[]" type="file" size="50" />
                                        <label>Summary:</label>
                                        <input name="userfile[]" type="file" size="50" />
                                        <label>Cover Page:</label>
                                        <input name="userfile[]" type="file" size="50" />
                                        <br />
										<!-- Final submit button for the form -->
                                        <input type="submit" class="button" style="border:0; width:auto; padding:5px;" value="Upload Critical Incident" name="submit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="tab2" class="tab active">
                            <!--tab active starts -->
                            <form>
                                <!--Uploaded case review progress bar starts here-->
                                <div class="tealresults-noscroll">
                                    <!--teal results starts here-->
                                    <?php include("includes/casePull.php");//Includes Announcement SQL Query?>	
                                </div>
                                <!-- teal results ends here-->
                            </form>
                        </div>
                        <!--tab active ends here-->
                    </div>
                    <!-- tab-content -->
                </div>
                <!-- tabs -->
            </div>
            <div><?php include( "includes/footer.php");?></div><!--footer navigation-->
        </div>
    </div>
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/editSubmission.js"></script>
    <script src="../js/tabsteal.js"></script>
    <script src="../js/folder.js"></script>
</body>

</html>