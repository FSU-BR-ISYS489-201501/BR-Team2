<?php
require ('../mysqli_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	REQUIRE (MYSQL);
	//VALIDATE THE USERNAME
	if (!empty($_POST['username'])){
		$u = mysqli_real_escape_string 
		($dbc, $_POST['username']);
	} else {
		$u = FALSE;
		echo '<p class="error"> You forgot to enter your username!</p>';
	}

	//VALIDATE THE PASSWORD
	if (!empty($_POST['password'])){
		$p = mysqli_real_escape_string 
		($dbc, $_POST['password']);
	} else {
		$p = FALSE;
		echo '<p class="error"> You forgot to enter your password!</p>';
	}
	
	if ($u && $p) { //IF EVERYTHING'S OK
		//QUERY THE DATABASE
		$q = "SELECT userName, password FROM user WHERE (username='$u' AND password=SHA1 ('$p')) AND active IS NULL";
		$r = mysqli_query ($dbc, $q) or trigger_error("-Query: $q\n<br />MYSQL Error: " . mysqli_error($dbc));
		if (@mysqli_num_rows($r) == 1) {
			echo '<p>It Worked yeah</p>';
			//A MATCH WAS MADE
			//REGISTER VALUES
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			mysqli_free_result($r);
			mysqli_close($dbc);
			//REDIRECT THE USER
			$url = BASE_URL . 'index.php'; ob_end_clean(); //DELETE THE BUFFER
			//DEFINE THE URL
			header("Location: $url");
			exit(); //QUIT THE SCRIPT
		}else{ //IF EVERYTHING NOT OKAY
			echo '<p class="error"> 
		Either the username and password entered do not match 
		those on file or you have not yet activated your account.</p>';
		}
	}else{
		echo '<p class ="error">Please try again.</p>';
	}
	
mysqli_close($dbc);
}
?>


<html>
<head>
<title>Login</title>
</head>
<body>
<h1></h1>
<form action="login.php" method="post">
<label>User Name :</label>
<input type="text" name="username" /><br />
<label>Password</label>
<input type="password" name="password" /><br />
<input type="submit" value="Login" name="submit"/>
</form>
<?php

?>
</body>
</html>