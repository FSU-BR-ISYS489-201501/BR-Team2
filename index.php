<?php
session_start();
/*
Last Edited: Date 4/20/2016
Attribution:	
	Announcement Tab Created By: Tyler Newton
	
Description:
	This is the hope page of the site where all visitors are greeted and their website experience begins.
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal of Critical Incidents</title>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <?php include( "includes/header.php");?>
        <!--search part ends-->
        
        <div class="content">
            
            <div class="row gutter"></div>
            <div class="row gutter">
                <div class="homepageimage">
                    <img class="image" src="../images/conference.jpg">
                </div>
            </div>
            
           
            <!--Row gutter ends-->
            <div class="row gutter">
                <!--Row gutter starts-->
                <div class="col s4 m4">
                    <!--Archive Starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/archivesicon.svg">
                        <h3 class="title">Critical Incidents</h3>
                    </div>
                    <!--Archive titlebox ends-->
                    <div class="col searchbg">
                        <form action="criticalIncidents.php" method="post" enctype="multipart/form-data" >
                            <input class="search2" type="search" name="searchInput" placeholder="Enter Search Term">
                            <li>
                            <input type="submit" class="button" style="float:left; width:135px;" name="go">
                            </li>
                        </form>
                    </div>
                    <div class="boxcontent">
                        <div class="col">
                            <p>The collection of past published JCI Critical Incidents are located here, either click the button below, or the Critical Incidents tab on top of the page.<br></br>You can also search for a certain item in the Journal by using the above search bar. </p>
                            <div>
                                <a href="criticalIncidents.php" class="button sm long ghost">View Critical Incidents</a>
                            </div>
                        </div>
                    </div>
                     <div class="col s4 m4">
                     <div class="titlebox grey" style="float:left; width:300px;">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/archivesicon.svg">
                        <h3 class="title">Full Journals</h3>
                    </div>
                    <div class="boxcontent">
                        <div class="col" style="float:left; width:300px;" >
                            <p><?php include( "includes/journalPull.php");?> </p>
                        </div>
                    </div>
                    </div>
                </div>
                <!--Archive ends-->
                <div class="col s4 m4">
                    <!--Date starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/documenticon.svg">
                        <h3 class="title">Announcements</h3>
                    </div>
                    <!--Date titlebox ends-->
                    <div class="boxcontent" style="height:450px; overflow-y:scroll;">
                        <div class="col">
                            <?php include( "includes/announcementPull.php");?>
                        </div>
                    </div>
                </div>
                <!--Date ends-->
                <div class="col s4 m4">
                    <!--Getting Started Starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/getstartedicon.svg">
                        <h3 class="title">Welcome to the JCI</h3>
                    </div>
                    <!--Getting Started titlebox ends-->
                    <div class="boxcontent">
                        <div class="col">
                        <!--updated by Josh 4/7/2016-->
                            <p>Welcome to the JCI Website! As part of the Society for Case Research, we publish a variety of different cases for educational purposes. When you register for our site, you are registering as an author, but we encourage you to strive to become a reviewer for cases as well. All cases are protected by the double-blind rule, so authors will not know reviewers names, and vice versa. We encourage you to register for our website by clicking the button below. <br></br>Please do not register if you do not plan on becoming an Author or a Reviewer. <br></br>Thanks for visiting our site!</p>
                            <div class="getstartedbutton join">
                                <a href="memberRegistration.php" class="button sm orange center">JOIN</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Getting Started ends-->
            </div>
            <div class="row gutter">
           
                    </div>
            <?php include( "includes/footer.php");?>
        </div>
    </div>
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/searchdropdown.js"></script>
</body>

</html>