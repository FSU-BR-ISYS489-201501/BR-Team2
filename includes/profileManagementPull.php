<?php
	session_start();
	$error='';
	// Variable To Store Error Message
	
	if (isset($_POST['update'])) {
		
		if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['employer']) || empty($_POST['primaryAddress']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['countryCode']) || empty($_POST['primaryPhone'])) {
			$error = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Please fill out all required information. </p>";
		} else {
			$firstName=$_POST['firstName'];
			$lastName=$_POST['lastName'];
			$title=$_POST['title'];
			$suffix=$_POST['suffix'];
			$suffixTwo=$_POST['suffixTwo'];
			$email=$_POST['email'];
			$employer=$_POST['employer'];
			$expertise=$_POST['expertise'];
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
			$suffix = stripslashes($suffix);
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
			
			$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
			$username = "T2BRGOLIVE";
			$password = "B1G70N@";
			try{
				$dbConnect = new PDO($dbConnect, $username, $password);
				$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}

			catch (PDOException $error) {
				echo 'Error Connecting: ' . $error->getMessage();
			}
			//address table update
			$address = "UPDATE address SET addressLineFirst='$primaryAddress', addressLineSecond='$secondaryAddress', city='$city', stateProvince='$state', postalCode='$zip', country='$country' WHERE addressID= ".$_SESSION['user'];
			// Prepare statement
    		$stmtAddress = $dbConnect->prepare($address);

    		// execute the query
    		$stmtAddress->execute();
			
			//phone table update
			$phone = "UPDATE phone SET typeID='$phoneType', countryCode='$countryCode', primaryPhone='$primaryPhone', secondaryPhone='$secondaryPhone' WHERE phoneID= ".$_SESSION['user'];
			// Prepare statement
    		$stmtPhone = $dbConnect->prepare($phone);

    		// execute the query
    		$stmtPhone->execute();
			
			//user table update
			$userQuery = "UPDATE user SET title='$title', suffix='$suffix', suffixTwo='$suffixTwo', firstName='$firstName', lastName='$lastName', email='$email', employer='$employer', expertise='$expertise' WHERE userID= ".$_SESSION['user'];
			
			// Prepare statement
    		$stmtUser = $dbConnect->prepare($userQuery);

    		// execute the query
    		$stmtUser->execute();
			
			//message to tell user the account has been updated
			$alert = "<br /> <p style='font-family:talo; color:white; margin-top:10px; font-size:16px;'>Information Updated. </p>";
		}
	}
?>