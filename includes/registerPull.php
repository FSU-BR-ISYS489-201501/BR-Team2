<?php
	session_start();
	$error='';
	// Variable To Store Error Message
	/*
	Last Edited:
		4/17/2016
	Attribution:	
		Created By: Tyler Newton
		Code Assit (relevant to older version of register pull): http://stackoverflow.com/questions/35641558/php-inserting-duplicates-in-db
	Description:
		registerPull sanitizes the users input on the register page, ensures both passwords entered match and that the email entered is of correct format. 
		All input values are then store in variables and a verification code is generated and store in the DB. 
		All store values are inserted in the appropriate database tables and an email containing the user’s verification code is sent to the inactive user. 
		Finally the users is redirected to the verifyAccount page where he/she will enter the code emailed to them.
	*/
	
	if (isset($_POST['register'])) {
		
		if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['employer']) || empty($_POST['password']) || empty($_POST['passwordConfirm']) || empty($_POST['primaryAddress']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['countryCode']) || empty($_POST['primaryPhone'])) {
			$error = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please fill out all required information. </p>";
		} else
		if($_POST['password'] !== $_POST['passwordConfirm']){
			$error = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please ensure your passwords match.</p>";
		} else
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error = "<br /><p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please enter a valid email address</p>";
		} else {
			// Define all labels on the register form
			$firstName=$_POST['firstName'];
			$lastName=$_POST['lastName'];
			$title=$_POST['title'];
			$suffix=$_POST['suffix'];
			$suffixTwo=$_POST['suffixTwo'];
			$email=$_POST['email'];
			$employer=$_POST['employer'];
			$expertise=$_POST['expertise'];
			$hash=md5($_POST['password']);
			$confirmHash=md5($_POST['passwordConfirm']);
			$primaryAddress=$_POST['primaryAddress'];
			$secondaryAddress=$_POST['secondaryAddress'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$zip=$_POST['zip'];
			$country=$_POST['country'];
			$phoneType=$_POST['phoneType'];
			$countryCode=$_POST['countryCode'];
			$primaryPhone=$_POST['primaryPhone'];
			$secondaryPhone=$_POST['secondaryPhone'];
			// Formats phone numbers 
			$primaryPhone = preg_replace('/\D+/', '', $primaryPhone);
			$secondaryPhone = preg_replace('/\D+/', '', $secondaryPhone);
			// To protect MySQL injection for Security purpose
			$firstName = stripslashes($firstName);
			$lastName = stripslashes($lastName);
			$title = stripslashes($title);
			$suffixOne = stripslashes($suffixOne);
			$suffixTwo = stripslashes($suffixTwo);
			$email = stripslashes($email);
			$employer = stripslashes($employer);
			$expertise = stripslashes($expertise);
			$hash = stripslashes($hash);
			$confirmHash = stripslashes($confirmHash);
			$primaryAddress = stripslashes($primaryAddress);
			$secondaryAddress = stripslashes($secondaryAddress);
			$city = stripslashes($city);
			$state = stripslashes($state);
			$zip = stripslashes($zip);
			$country = stripslashes($country);
			$phoneType = stripslashes($phoneType);
			$countryCode = stripslashes($countryCode);
			$primaryPhone = stripslashes($primaryPhone);
			$secondaryPhone = stripslashes($secondaryPhone);
			//Random Code
			$verifCode = rand();
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
			$chkEmail->bindValue(":email", $email);
			$chkEmail->execute();
			$rowsTest = $chkEmail->rowCount();
			
			if ($rowsTest == 1) {
				$error = "<br /><p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Email Exists</p>";
			} else {
				//Address table insert 
				$address = $dbConnect->prepare("INSERT INTO `address`(`addressID`,`typeID`,`addressLineFirst`,`addressLineSecond`,`city`,`stateProvince`,`postalCode`,`country`)VALUES(null,:phoneType,:primaryAddress,:secondaryAddress,:city,:stateProvince,:postalCode,:country)");
				$address->bindValue(":phoneType", $phoneType);
				$address->bindValue(":primaryAddress", $primaryAddress);
				$address->bindValue(":secondaryAddress", $secondaryAddress);
				$address->bindValue(":city", $city);
				$address->bindValue(":stateProvince", $state);
				$address->bindValue(":postalCode", $zip);
				$address->bindValue(":country", $country);
				$address->execute();
				$addID = $dbConnect->lastInsertId(`addressID`);
				//Phone table insert
				$phone = $dbConnect->prepare("INSERT INTO `phone`(`phoneID`,`typeID`,`countryCode`,`primaryPhone`,`secondaryPhone`)VALUES(null,:phoneType,:countryCode,:primaryPhone,:secondaryPhone)");
				$phone->bindValue(":phoneType", $phoneType);
				$phone->bindValue(":countryCode", $countryCode);
				$phone->bindValue(":primaryPhone", $primaryPhone);
				$phone->bindValue(":secondaryPhone", $secondaryPhone);
				$phone->execute();
				$phoneID = $dbConnect->lastInsertId(`phoneID`);
				//User table insert	
				$reg = $dbConnect->prepare("INSERT INTO `user`(`userID`,`addressID`,`phoneID`,`memberID`,`noteID`,`title`,`suffix`,`suffixTwo`,`firstName`,`lastName`,`email`,`employer`,`expertise`,`hash`,`verifyCode`)VALUES(null,:addID,:phoneID,null,null,:title,:suffix,:suffixTwo,:firstName,:lastName,:email,:employer,:expertise,:hash,:verifCode)");
				$reg->bindValue(":addID", $addID);
				$reg->bindValue(":phoneID", $phoneID);
				$reg->bindValue(":title", $title);
				$reg->bindValue(":suffix", $suffix);
				$reg->bindValue(":suffixTwo", $suffixTwo);
				$reg->bindValue(":firstName", $firstName);
				$reg->bindValue(":lastName", $lastName);
				$reg->bindValue(":email", $email);
				$reg->bindValue(":employer", $employer);
				$reg->bindValue(":expertise", $expertise);
				$reg->bindValue(":hash", $hash);
				$reg->bindValue(":verifCode", $verifCode);
				//Execute, Redirect and error returns	
				
				if($reg->execute()){
					$codePull = $dbConnect->prepare("SELECT `verifyCode` FROM `user` WHERE `email`=:email");
					$codePull->bindValue(":email", $email);
					$codePull->execute();
					$code = $codePull->fetch(PDO::FETCH_ASSOC);
					$code = $code['verifyCode'];
					//Mail Verificication
					$to = $email;
					$subject = "Account Verification";
					$txt = "Thank you for registering! Please follow the link and enter the unique code given below to activate your account." . "\r\n" . "\r\n" . "Link: http://br-t2-jci.sfcrjci.org/verifyAccount.php" . "\r\n" . "Unique Actication code: ". $code;
					$headers = "From: webmaster@br-t2-jci.sfcrjci.org";
					mail($to,$subject,$txt,$headers);
					header('Location: verifyAccount.php', true, 303);
					exit;
				} else {
					print_r($reg->errorInfo());
				}

			}

		}

	}

?>