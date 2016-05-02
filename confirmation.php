<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCI: Confirmation</title>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <?php include( "includes/header.php");?>
        <div class="content">
            <div class="row gutter"></div>
            <div class="row gutter">
                <!--Row gutter starts-->
				<?php
                    $option = isset($_POST['emailAddress']) ? $_POST['emailAddress'] :
                    false;
                    $_SESSION["RandomPass"] = generatePassword();
                    $dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
                    $username = "T2BRGOLIVE";
                    $password = "B1G70N@";
                    try{
                        $dbConnect = new PDO($dbConnect, $username, $password);
                    }
                
                    catch (PDOException $error) {
                        echo 'Error Connecting: ' . $error->getMessage();
                    }
                
                    //Checks if email exists in Database already
                    $chkEmail = $dbConnect->prepare("SELECT * FROM `user` WHERE `email`=:email");
                    $chkEmail->bindValue(":email", $option);
                    $chkEmail->execute();
                    $rowsTest = $chkEmail->rowCount();
                    
                    if ($rowsTest == 1) {
                        
                        if ($option) {
                            //gets the user's last name
                            $email = $_POST['emailAddress'];
                            $sql = $dbConnect->prepare("UPDATE `user` SET `hash`= :hashPass WHERE `email`=:email");
                            $sql->bindValue(":hashPass", $hashPass);
                            $sql->bindValue(":email", $email);
                            $sql->execute();
                            $to = $email;
                            $subject = "Reset Password";
                            $txt = "Please use the code below and enter it into the verification box you were redirected to. If the code matches and both new password fields match, your password will be reset: \r\n" . $_SESSION["RandomPass"];
                            mail($to,$subject,$txt);
							echo "<br /> <p style='font-family:talo; color:black; margin-top:10px; font-size:16px;'>Please be patient. A password reset link is being sent to: " . $email . " \r\n If you cannot see the email in your inbox, please check your spam folder.</p>";
                        } else {
                            echo ("<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please enter a valid email address.</p>");
                        }
                
                    }
                
                    
                    function generatePassword($length = 8) {
                        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                        $count = mb_strlen($chars);
                        for ($i = 0, $result = ''; $i < $length; $i++) {
                            $index = rand(0, $count - 1);
                            $result .= mb_substr($chars, $index, 1);
                        }
                
                        return $result;
                    }
                
                ?>
                <div class="tab-content">
				<div id="tab1" class="tab active">
				<form action="../includes/changePassword.php" method="post">
                    <ul class="list-form">
                        <li class="textfield-container">
                            <label for="phone" class="textlabelwhite">Verification Code:</label>
                            <input id="ver" name="ver" type="text" placeholder="0123456789">
                        </li>
                        <li class="textfield-container">
                            <label id="form-text" class="textlabelwhite">Email:</label>
                            <input id="email" name="email" type="text" placeholder="JaneDoe@gmail.com">
                        </li>
                        <li class="textfield-container">
                            <label id="form-text" class="textlabelwhite">New Password:</label>
                            <input id="password" name="password" type="password" placeholder="**********">
                        </li>
                        <li class="textfield-container">
                            <label id="form-text" class="textlabelwhite">Confirm Password:</label>
                            <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="**********">
                        </li>
                        <input id="registerButton" name="register" class="button" type="submit" style="float:left; width:135px;" value=" Change Password ">
                    </ul>
                </form>
            </div>
            </div>
            <?php include( "includes/footer.php");?>
        </div>
    </div>
    <!--Row gutter ends-->
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/searchdropdown.js"></script>
</body>

</html>