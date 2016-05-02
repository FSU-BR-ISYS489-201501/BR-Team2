<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton
	Edited by: Tyler Newton
	
Description:
	This page controls the text displayed in the user header based on the current page being displayed. 
*/
session_start();
if(isset($_SESSION['login_user'])){
} else {
	header("Location: index.php");
	// Redirecting To Home Page
}

$priv = ($_SESSION['secureLevel']);
$authorHome = "/authorHome.php";
$reviewerHome = "/reviewerHome.php";
$editorHome = "/editorHome.php";
$editSubmissions = "/editSubmissions.php";
$incidentManager = "/incidentManager.php";
$assignReviewer = "/assignReviewer.php";
$publishJournal = "/publish.php";
$userManager = "/userManager.php";
$currentpage = $_SERVER['REQUEST_URI'];
$priv = ($_SESSION['secureLevel']);//only if login-pull is success
/*This page is where any user 'Editor' is redirected to based off of database usertype variable
here they are able to Manage Announcements
*/
?>

<div class="row gutter"> <!--sub menu starts here-->
	<nav class="sec">
		<h2 class="navsectitle"><?php 
			if($authorHome == $currentpage){
				echo "Author Home";
			}else if($reviewerHome == $currentpage){
				echo "Reviewer Home";
			}else if($editorHome == $currentpage){
				echo "Announcement Manager";
			}else if($editSubmissions == $currentpage){
				echo "Submission Editor";
			}else if($incidentManager == $currentpage){
				echo "Incident Manager";
			}else if($assignReviewer == $currentpage){
				echo "index Of Incidents";
			}else if($publishJournal == $currentpage){
				echo "Publish Journal";
			}else if($userManager == $currentpage){
				echo "User Manager";
			}
		?></h2>
        	<ul>
				<li class="editor" <?php if($priv >= 3){}else{ echo 'style="display:none;"'; } ?>><a>Editor</a>	
                	<ul>
                    	<?php 
							if($priv == 3){
								echo'<li><a href="editorHome.php">Announcements Manager</a></li>';
                             	echo'<li><a href="editSubmissions.php">Submissions</a></li>';
							}
							if($priv == 4){
								echo'<li><a href="editorHome.php">Announcements Manager</a></li>';
                             	echo'<li><a href="editSubmissions.php">Submissions</a></li>';
								echo'<li><a href="assignReviewer.php">Reviewer Manager</a></li>';
							}
							if($priv == 5){
								echo'<li><a href="editorHome.php">Announcements Manager</a></li>';
                             	echo'<li><a href="editSubmissions.php">Submissions</a></li>';
								echo'<li><a href="incidentManager.php">Incident Manager</a></li>';
                            	echo'<li><a href="assignReviewer.php">Reviewer Manager</a></li>';
                           		echo'<li><a href="publish.php">Publish Journal</a></li>';
								echo'<li><a href="singleCase.php">Upload Case</a></li>';
                                echo'<li><a href="userManager.php">User Manager</a></li>';	
								echo'<li><a href="siteManager.php">Site Manager</a></li>';
								
							}
						?>
					</ul>
                </li>
               		<li class="reviewer" <?php if($priv >= 2){}else{ echo 'style="display:none;"'; } ?>><a href="reviewerHome.php">Reviewer</a></li>
                    <li class="author" <?php if($priv >= 1){}else{ echo 'style="display:none;"'; } ?>><a href="authorHome.php">Author</a></li>
               	</ul>
            </nav>
     </div> <!--sub menu ends here-->
   