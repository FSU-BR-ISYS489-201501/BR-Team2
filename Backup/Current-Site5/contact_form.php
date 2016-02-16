<?php 
include('login-pull.php'); // Includes Login Script
$action=$_REQUEST['action']; 
if ($action=="")    /* display the contact form */ 
    { 
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
<div id="contact-content">
	<h1>Contact Us</h1>
	
    <form  action="" method="POST" enctype="multipart/form-data"> 
    <input type="hidden" name="action" value="submit"> 
    Your name:<br> 
    <input name="name" type="text" value="" size="30"/><br> 
    Your email:<br> 
    <input name="email" type="text" value="" size="30"/><br>
	Subject:<br>
	<select name="subject">
	<option value=""></option>
	<option value="JCI Information">JCI Information</option>
	<option value="SRC Information">SRC Information</option>
	<option value="Tech Support">Tech Support</option>
	<option value="Other">Other</option>
	</select><br>
    Your message:<br> 
    <textarea name="message" rows="7" cols="30"></textarea><br> 
    <input type="submit" value="Send email"/> 
    </form> 
    </div>
    <?php 
    }  
else                /* send the submitted data */ 
    { 
	if (!empty($_REQUEST['name'])) {
		$name = $_REQUEST['name'];
	} else {
		$name = NULL;
		echo '<p class="error"> You forgot to enter your name!</p>'; 
		
	}

	if (!empty($_REQUEST['email'])) {
		$email=$_REQUEST['email'];
	} else {
		$email = NULL;
		echo '<p class="error"> You forgot to enter your email!</p>'; 
	}
	
	if (!empty($_REQUEST['message'])) {
		$message=$_REQUEST['message']; 
	} else {
		$message = NULL;
		echo '<p class="error"> You forgot to enter a message!</p>'; 
	}
    
	if (!empty($_REQUEST['subject'])) {
		$subject=$_REQUEST['subject']; 
	} else {
		$subject = NULL;
		echo '<p class="error"> You forgot to enter a subject!</p>'; 
		
	}
	
	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<a href='$url'>Go Back</a>";
	
    if ($name && $email && $message && $subject) {         
        $from="From: $name<$email>\r\nReturn-path: $email";
        mail("josh.stocking@gmail.com", $subject, $message, $from); 
        echo "Email sent!"; 
        } 
    }   
?>

</body>
</html>