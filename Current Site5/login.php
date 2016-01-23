<?php
include('login-pull.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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

<div id="login-content">
		<div id="login">
			<h1>Login</h1>
			<form action="" method="post">
					<label id="form-text">UserName </label>
					<input id="name" name="username" placeholder="username" type="text">
                <br />
					<label id="form-text">Password  </label>
					<input id="password" name="password" placeholder="**********" type="password">
                <br />
				<input id="login-button" name="submit" type="submit" value=" Login ">
			<span><?php echo $error; ?></span>
			</form>
		</div>
</div>
</body>
</html>