<?php
session_start();
include('login-pull.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="login-content" style="margin-left:50px; margin-top:150px;">
		<div id="login">
        <?php
			if(isset($_SESSION['login_user'])){
				echo "Welcome " .$_SESSION['login_user'];
			}else{
				echo "Welcome"	;
			}
		?>
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