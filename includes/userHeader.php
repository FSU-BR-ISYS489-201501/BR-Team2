<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/main-styles.css">
<!-- https://www.google.com/fonts#UsePlace:use/Collection:PT+Sans -->
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

</head>

<body>

<div id="headerContainer">
<!-- {$_SESSION['first_name']} -->
	<div id="loginContainer" >
		<div class="dropdown">
			<button class="dropbtn"><?php echo "<p>Hello," .$_SESSION['login_user']. "</p>";?></button>
				<div class="dropdown-content">
					<a href="#">Notifications</a>
					<a href="#">Profile</a>
					<a href="#">Edit Profile</a>
					<a href="includes/logout.php">Logout</a>
				</div>
		</div>    	
    </div>

	<div id="menuContainer">
    	<a href="#">
			<div id="menuItem3Holder">
 				<p id="menuItem3">About</p>
    		</div>
        </a>
        <a href="#">
    		<div id="menuItem2Holder">
 				<p id="menuItem2">Archive</p>
    		</div>
        </a>
        <a href="#">
    		<div id="menuItem1Holder">
 				<p id="menuItem1">Resources</p>  
    		</div>
        </a>
    </div>
    
	<div id="headerLogo">
    	<img src="../images/logo.png" width="400" height="83"/>
    </div>
    
</div>

<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/mainJS.js"></script>

</body>
</html>