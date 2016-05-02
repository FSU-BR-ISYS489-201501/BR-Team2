<?php
/*
Last Edited: Date 4/25/2016
Attribution:	
	Created By: Tyler Newton and UXTeam
	Edited by: Tyler Newton
	
Description:
	Header for loged in users
	Will redirect if user isnt logged in
*/
session_start();
					if(isset($_SESSION['login_user'])){
					} else {
						header("Location: index.php");
						// Redirecting To Home Page
					}
					$priv = ($_SESSION['secureLevel']);
?>
<header>
            <div class="row gutter">
                <div class="col m2 logo">
                    <a href="../index.php"><img class="logo" src="../images/jcilogo.svg" alt=""/></a>
                </div>	
                <div class="col m7 navbar">
                    <ul class="navprimary">
                        <li><a href="../resources.php">Resources</a></li>
                        <li><a href="../criticalIncidents.php">Critical Incidents</a></li>
                        <li><a href="../about.php">About</a></li>
                    </ul>	
                </div>
                <div class="col m3 navbar">
                    <ul class="login">
						<li><a href="../profileManagement.php">Profile Management</a></li>
                        <span style="font-size:1.5rem">|</span>
						<li><a href="includes/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
		</header>