<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/main-styles.css">
<!-- https://www.google.com/fonts#UsePlace:use/Collection:PT+Sans -->
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

</head>
<body>

<div id="wrapper">

	<div id="testContainer">
	REVIEWER PAGE
	<br></br>
	<iframe src="download.php"></iframe>
<br></br>
	<form action="upload.php" method="post" enctype="multipart/form-data">
    Select a file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>
	</div>

</div>



<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/mainJS.js"></script>

</body>
</html>