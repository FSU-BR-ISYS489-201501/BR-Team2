<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check submit was clicked
if(isset($_POST["submit"])) {
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. \n";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. \n";
    $uploadOk = 0;
}
// Allow documents only
if($FileType != "doc" && $FileType != "docx" ) {
    echo "Sorry, only doc and docx files are allowed. \n";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. \n";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. \n";
    } else {
        echo "Sorry, there was an error uploading your file. \n";
    }
}
}
//attribution to w3schools.com 
?>
