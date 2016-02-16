<?php
include('login-pull.php'); // Includes Login Script
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<title>Untitled Document</title>
</head>

<body>

<div class="menu-container">
	<a href="index.php" style="text-decoration:none; color:#0000;"><div class="menu-sub"><p id="menu-text">Home</p></div></a>
	<a href="contact_form.php" style="text-decoration:none; color:#0000;"><div class="menu-sub"><p id="menu-text">Contact Form</p></div></a>
	<a href="login.php" style="text-decoration:none; color:#0000;"><div class="menu-sub"><p id="menu-text">Login</p></div></a>
	<a href="logout.php" style="text-decoration:none; color:#0000;"><div class="menu-sub"><p id="menu-text">Logout</p></div></a>
	<div class="menu-session">
    	<div id="menu-text-session">
		<?php
			if(isset($_SESSION['login_user'])){
				echo "Welcome " .$_SESSION['login_user'];
			}else{
				echo "Welcome"	;
			}
		?>
        </div>
	</div>
</div>

<div id="home-container">
	<h1>Team #2 - JCI</h1>
	<h2>Current Updates</h2>	
</div>

<div id="update-container">
    <p>1. Contact form created and functioning (currently pointed to Josh's email address)</p>
    <p>2. Login form functioning</p>
    <p>3. Logout script funtioning</p>
    <p>4. Welcome message tied to current user session functioning</p>
    <p>5. Basic temporary site template created</p>
    <br />
    <br />
    <img src="images/cat.png" width="300" height="184" />
</div>


</body>
</html>