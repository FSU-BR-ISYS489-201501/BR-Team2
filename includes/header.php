<?php
session_start();
/*
Last Edited: Date 4/23/2016
Attribution:	
	Created By: Tyler Newton and UXTeam
	Edited by: Tyler Newton
	
Description:
	Site header with changing text based on users status
*/
?>

<header>
    <div class="col s3 m3">
        <a href="../index.php"><img class="image" src="../images/jcilogo.svg" alt="" />
        </a>
    </div>
    <div class="col s5 m6 navbar">
        <div>
            <ul class="navprimary">
                <li><a href="../resources.php">Resources</a>
                </li>
                <li><a href="../criticalIncidents.php">Critical Incidents</a>
                </li>
                <li><a href="../about.php">About</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col s3 m2 navbar">
        <ul class="login">
            <li>
                <a href="
					<?php
						if(isset($_SESSION['login_user'])){
							echo "../authorHome.php";
						}else{
							echo "../memberRegistration.php";
						}
					?>
                 ">
                    <?php
						if(isset($_SESSION['login_user'])){
							echo "Profile Management";
						}else{
							echo "Join";
						}
					?>	
                </a>
            </li>
            <span style="font-size:1.5rem">|</span>
            <li>
                <a href="
					<?php
						if(isset($_SESSION['login_user'])){
							echo "includes/logout.php";
						}else{
							echo "../login.php";
						}
					?>
                 ">
					<?php
						if(isset($_SESSION['login_user'])){
							echo "Logout";
						}else{
							echo "Login";
						}
					?>
                 </a>
            </li>
        </ul>
    </div>
    <div class="col s1 m1 navbar">
        <a href="#/"><img class="searchicon" src="../images/searchicon.svg">
        </a>
    </div>
</header>
<div id="searchdrop" class="row gutter">
    <div class="col s3 m2">
        <form method="post" action="../criticalIncidentsFiltered.php" id="ui_element" class="search_wrapper">
            <input class="searchInput" name="searchInput" type="text" placeholder="Enter Search Term" />
            <input type="submit" class="button go orange searchgobutton" value="GO">Go</a>
            <ul class="search_dropdown">
                <li>
                    <input type="checkbox" name="all" />
                    <label for="all" ><strong>All Categories</strong>
                    </label>
                </li>
                <li>
                    <input type="checkbox" name="all"/>
                    <label for="Criteria" >Criteria 1</label>
                </li>
                <li>
                    <input type="checkbox" name="all"/>
                    <label for="Formatting" >Formatting</label>
                </li>
                <li>
                    <input type="checkbox" name="note"/>
                    <label for="Criteria" >Note</label>
                </li>
                <li>
                    <input type="checkbox" name="author"/>
                    <label for="People" >Author</label>
                </li>
                <li>
                    <input type="checkbox" name="all"/>
                    <label for="Criteria" >Criteria 3</label>
                </li>
                <li>
                    <input type="checkbox" name="caseTitle" />
                    <label for="Journals" >Case Title</label>
                </li>
                <li>
                    <input type="checkbox" name="all"/>
                    <label for="Criteria">Criteria 4</label>
                </li>
            </ul>
        </form>
    </div>
</div>
<!--row gutter ends-->