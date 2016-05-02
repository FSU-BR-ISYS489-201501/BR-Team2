<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JCI: Change Password</title>
        <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<?php include("header.php");
		/*Includes Header Navigation
		This page is the change password function, it validates user input for email and 
		temporary password, then hashes new password and updates the user's new password in the database*/
		 ?>	
		<div class="content">
			<div class="row gutter"></div>
			<div class="row gutter"><!--Row gutter starts-->
				<?php
					$option = isset($_POST['email']) ? $_POST['email'] : false; //validation for email input
					$testSession = isset($_POST['ver']) ? $_POST['ver'] : false; //validation for verification code
					$pass = isset($_POST['password']) ? $_POST['password'] : false; //validation for password input
					$confPass = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : false; //validation for second password input, verify
					
					$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
					$username = "T2BRGOLIVE";
					$password = "B1G70N@";

					try{//try database connection
						$dbConnect = new PDO($dbConnect, $username, $password);//if successful, connect
					}catch (PDOException $error) {//error handling
						echo 'Error Connecting: ' . $error->getMessage();//display connect unsuccessful error
					}
		

					
							if ($testSession == $_SESSION["RandomPass"]){
							
								if ($pass == $confPass){//gets the user's email and password
								$email = $_POST['email'];//storing user input from email field into the email variable ($email)
								$password = $_POST['password'];//storing user input from password field into the password variable ($password)
								$hashPass = md5($password);//attempt to hash 
								//User table update
								$sql = $dbConnect->prepare("UPDATE `user` SET `hash`= :hashPass WHERE `email`=:email");//I want to update hash attribute in user table of database
								$sql->bindValue(":hashPass", $hashPass);//associate database password attribute to php variable
								$sql->bindValue(":email", $email);//associate database email attribute to php variable
								$sql->execute();//execute query
								echo("<br /> <p style='font-family:talo; color:black; margin-top:10px; font-size:16px;'>Your password has been changed, please give it a try!</p>"); //Password change success message
								
								}
								}
						
							
				?>

			</div>	
			<?php include("footer.php");//Includes footer navigation?>	
		</div>	
	</div><!--Row gutter ends-->
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/tabs.js"></script>
<script src="../js/searchdropdown.js"></script>
</body>
</html>