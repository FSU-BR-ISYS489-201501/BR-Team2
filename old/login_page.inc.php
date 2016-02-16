<?php 
// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}
// Display the form:
?>
<?php require_once('header.php');	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>

<link rel="stylesheet" type="text/css" href="../css/main-styles.css">
<!-- https://www.google.com/fonts#UsePlace:use/Collection:PT+Sans -->
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

</head>


<div id="wrapper">

	<div id="testContainer">
	
		<center>
		<h1>Login</h1>
		<form action="login.php" method="post">
			<p>Email: <input type="text" style="height:30px; width:350px" name="email" size="20" maxlength="60" /> </p>
			<p>Password: <input type="password" style="height:30px; width:350px" name="pass" size="20" maxlength="20" /></p>
			<p><input type="submit" name="submit" value="Login" /></p>
		</form>
		</center>
	</div>

</div>


<?php
include ('footer.php');
?>