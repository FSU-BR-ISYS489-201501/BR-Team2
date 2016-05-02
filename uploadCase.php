                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>Home</title>
                    <link rel="stylesheet" type="text/css" href="../css/main-styles.css">
                    <!-- https://www.google.com/fonts#UsePlace:use/Collection:PT+Sans -->
                    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
                </head>
                
                <body>
                    <?php
                    /*
					Last Edited: Date 4/23/2016
	
					Attribution:	
						Created By: Tyler Newton, Erik Obozinski and Chad Marshall
						
                    This page grabs the file to be uploaded and renames it
                   	It then creates a directory for the user if one is not already created
                    */
                    include('includes/createDirectory.php');
                    $caseName = $_POST['caseTitle'];
                    //where the file will be uploaded
                    $target_dir = "cases/$result/";
                    // Check submit was clicked
                    
                    if(isset($_POST["submit"])) {
                        $ftp_server = "ftp.sfcrjci.org";
                        //FTP Server credentials for creating directory
                        $ftp_user_name = "obodzie@sfcrjci.org";
                        //FTP User credentials
                        $ftp_user_pass = "r7Nv!WO_DeER";
                        //FTP Password credentials
                        $conn_id = ftp_connect($ftp_server);
                        //set up basic connection
                        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                        //login with username and password
                        for ($i = 0; $i <= 50; $i++) {
                            $folder_check = "public_html/" . $target_dir . "Case-". $i;
                            $dir = $target_dir . "Case-". $i . "/";
                            
                            if (file_exists($folder_check)) {
                            } else {
                                
                                if (ftp_mkdir($conn_id, $folder_check)) {
                                    //try to create the directory $dir
                                    $_SESSION['folder'] = $i;
									$reviewHome = $folder_check . "/Reviews";
                                    //close the connection
                                    $i = 51;
									if (ftp_mkdir($conn_id, $reviewHome)) {
									 //echo "successfully created $dir\n";
									} else {
									// echo "There was a problem while creating $dir\n";
}
									ftp_close($conn_id);
									
                                }
                
                            }
                
                        }
                
                        // Check if file already exists
                        for($i = 0; $i < count($_FILES['userfile']); $i++) {
							if($i == 0){
                            $target_file_new = $dir . "CriticalIncidentSubmit-1.docx";
							}
							else if($i== 1){
                            $target_file_new = $dir . "MemoSubmit-1.docx";
							}
							else if($i== 2){
                            $target_file_new = $dir . "TeachingNotesSubmit-1.docx";
							}
							else if($i== 3){
                            $target_file_new = $dir . "SummarySubmit-1.docx";
							}
							else if($i== 4){
                            $target_file_new = $dir . "CoverPageSubmit-1.docx";
							}
                            $FileType = pathinfo($target_file_new,PATHINFO_EXTENSION);
                            
                            if (file_exists($target_file_new)) {
                             
                                $message= "File Already Exists: ".$target_file_new;
                                $_SESSION['message'] = $message;
                                echo "<script language='javascript'>\n";
                                echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                                echo "</script>\n";
                                exit;
                                
                                if ($_FILES['userfile']['size'][$i] > 500000) {
                                    // Allow documents only
                                    $message= "File is too big: " . $target_file_new;
                                    $_SESSION['message'] = $message;
                                    echo "<script language='javascript'>\n";
                                    echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                                    echo "</script>\n";
                                    exit;
                                    
                                    if($FileType != "doc" && $FileType != "docx" ) {
                                        $message= "File must be a doc or docx file type: " . $target_file_new;
                                        $_SESSION['message'] = $message;
                                        echo "<script language='javascript'>\n";
                                        echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                                        echo "</script>\n";
                                        exit;
                                        // if everything is ok, try to upload file
                                    }
                
                                }
                
                            } else {
                                
                                if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $target_file_new)) {
                                    //outputs a message to the user that the file was uploaded
                                    $title = isset($_POST['caseTitle']) ? $_POST['caseTitle'] :
                                    false;
                                    //validation for title input
                                    $notes = isset($_POST['notes']) ? $_POST['notes'] :
                                    false;
                                    //validation for startDate input
                                    $dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
                                    $username = "T2BRGOLIVE";
                                    $password = "B1G70N@";
                                    try{
                                        //try database connection
                                        $dbConnect = new PDO($dbConnect, $username, $password);
                                        //if successful, connect
                                    }
                
                                    catch (PDOException $error) {
                                        //error handling
                                        echo 'Error Connecting: ' . $error->getMessage();
                                        //display connect unsuccessful error
                                    }
                
                                }
                
                            }
                
                        }
                
                    }
                
                    
                    if (isset($_POST['submit'])) {
                        //If register button is clicked from editorHome
                        $title = $_POST['caseTitle'];
                        //validation for title input
                        $notes = $_POST['notes'];
						$_SESSION['case_title'] = $title;
						
                        //validation for startDate input
                        $sql = $dbConnect->prepare("INSERT INTO `case`(`caseID`, `userID`, `assignedCaseID`, `keywordID`, `title`, `fileSubmitName`, `serverLocation`, `fileLocation`, `submitCount`,  `approvedStatus`, `downloadStatus`, `note`)VALUES(null, :userID, null, 1, :title, null, null, :fileLocation, 1, null, null, :notes)");
                        //I want to append the title, startDate, endDate, and content into the Announcements table of the database
                        $sql->bindValue(":title", $title);
                        //associate database content attribute to php variable
                        $sql->bindValue(":notes", $notes);
                        //associate database title attribute to php variable
                        $sql->bindValue(":userID", $_SESSION['userID']);
                        //associate database title attribute to php variable
                        $sql->bindValue(":fileLocation", $dir);
                        //associate database startDate attribute to php variable
                        $sql->execute();
                        //Execute Query
                        print_r($sql->errorInfo());
                        //Announcement post unsuccesful
                        $message= "Folder for new submission created! Your files have been uploaded!";
                        $_SESSION['message'] = $message;
						include('email.php');
                        echo "<script language='javascript'>\n";
                        echo "alert('" .$_SESSION['message']."'); window.location.href='http://br-t2-jci.sfcrjci.org/authorHome.php';";
                        echo "</script>\n";
							
						
                    }
                
                    //attribution to w3schools.com 
                    ?>
                    <?php require_once( 'includes/footer.php'); ?>
                </body>
                
                </html>