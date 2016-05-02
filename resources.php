<!--
Last Edited: 4/23/2016

Attribution:	
	Created By: Erik Obodzinski
	Updated By: Josh Stocking and Chad Marshall
	
Description:
	This page contains information about the JCI in regards to the Editorial policy, Ethical policy,
	JCI Guidelines, and Help.
		
-->
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JCI: Resources</title>
        <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<?php include("includes/header.php")//Includes Header Navigation;?>
       		
		<div id="searchdrop" class="row gutter">
            <div class="col s3 m2">
                <form id="ui_element" class="search_wrapper">
                    <input class="search_input" type="text" placeholder="Enter Search Term" />
                    <input class="lets_search" type="submit" value="GO" />
                    <ul class="search_dropdown">
                        <li>
                            <input type="checkbox" />
                            <label for="all"><strong>All Categories</strong>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="Criteria">Criteria 1</label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="Formatting">Formatting</label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="Criteria">Criteria 2</label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="People">People</label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="Criteria">Criteria 3</label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="Journals">Journals</label>
                        </li>
                        <li>
                            <input type="checkbox" />
                            <label for="Criteria">Criteria 4</label>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <!--row gutter ends-->
        <!--search part ends-->
        <div class="content">
            <div class="row gutter"></div>
            <div class="row gutter">
                <!--Row gutter starts-->
                <div class="col s4 m4" style="margin-top:0px; padding-top:0px;">
                    <div class="col gs">
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
                    <div class="col">
                        <div class="titlebox grey">
                            <div class="bar blue"></div>
                            <img class="boxicon" src="../images/linksicon.svg">
                            <h3 class="title">Links</h3>
                        </div>
                        <div class="boxcontent">
                            <div class="col">
                                <h5><a class="links" href="https://www.sfcr.org/jci/">www.sfcr.org/jci.org</a></h5>
                                <h5><a class="links" href="http://www.sfcr.org">www.sfcr.org</a></h5>
                            </div>
                        </div>
                    </div>
                    <!--Links ends-->
                </div>
                <div class="col s4 m4">
                    <!--legal titlebox starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/legalicon.svg">
                        <h3 class="title">Editorial Policy</h3>
                    </div>
                    <!--Legal titlebox ends-->
                    <!-- Editorial policy starts-->
                    <div class="boxcontent">
                        <div class="col">
                            <p>The Journal of Critical Incidents provides a set of Editorial Policies to be followed in order to be an active member.<br></br>Please click on the button below to view a PDF of the Journal of Critical Incidents Editorial Policy.</p>
                            <div>
                             <a href='includes/JCI_Editorial_Policy.pdf' class="button sm long ghost">Download Editorial Policy</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--Editorial policy ends-->
                <div class="col s4 m4">
                    <!--Formatting titlebox Starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/formattingicon.svg">
                        <h3 class="title">JCI Guidelines</h3>
                    </div>
                    <!--Formatting titlebox ends-->
                    <!--JCI Guidelines text and button-->
                    <div class="boxcontent">
                        <div class="col">
                            <p>Click on the button below to view a PDF of the current Society For Case Research and Journal of Critical Incidents guidelines.<br></br>These guidelines are for Authors in regards to creating a submission to be considered for publication.</p>
                            <div>
                                <a href='includes/SCR_Manuscript_Guidelines_for_Authors.pdf' class="button sm long ghost">Download Guidelines</a> <!-- pdf link -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--JCI Guidelines text and button end-->
                <div class="col s4 m4">
                    <!--legal titlebox starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/legalicon.svg">
                        <h3 class="title">Ethical Policy</h3>
                    </div>
                    <!--Legal titlebox ends-->
                    <div class="boxcontent">
                        <div class="col">
                            <p>Please click on the button below to view a PDF of the Journal of Critical Incidents Publication Ethics Policy and Malpractice Statement.</p>
                            <div>
                             <a href='includes/Publication Ethics Policy and Malpractice Statement.pdf' class="button sm long ghost">Download Ethics Policy</a> <!-- pdf link -->
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--Formatting ends-->
                <div class="col s4 m4">
                    <!--Help Starts-->
                    <div class="titlebox grey">
                        <div class="bar blue"></div>
                        <img class="boxicon" src="../images/helpicon.svg">
                        <h3 class="title">Help</h3>
                    </div>
                    <!--Help titlebox ends-->
                    <div class="boxcontent">
                        <div class="col">
                            <p>Still confused? You can click on the button below to contact the Editor, Tim Brotherton directly for more information.</p>
                            <div>
                                <a href='contactUs.php' class="button sm long ghost">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Help ends-->
            </div>
            <!--Row gutter ends-->
            <?php include( "includes/footer.php");?>
        </div>
        <script src="../js/jquery-1.12.0.min.js"></script>
        <script src="../js/tabs.js"></script>
        <script src="../js/searchdropdown.js"></script>
</body>
</html>