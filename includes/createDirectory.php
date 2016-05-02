				<?
				/*Date 4/4/16
				This page is the createDirectory 'Author' function, it will attempt to associate the logged 
				in user to the appropriate user in the user table of the database, if user exists
				then a directory will attempt to be created 
				*/
                session_start();
				$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
				$username = "T2BRGOLIVE";
				$password = "B1G70N@";

				try{//try database connection
					$dbConnect = new PDO($dbConnect, $username, $password);//if successful, connect
				}catch (PDOException $error) {//error handling
					echo 'Error Connecting: ' . $error->getMessage();//display connect unsuccessful error
				}
				
				//User table select
				$sth = $dbConnect->prepare("SELECT `userID` FROM `user` WHERE `email`=:email");//I want to verify user with database via email
				$sth->bindValue(":email", $_SESSION['login_user']);//verifies logged in user from database matches php session user and associates variables
				$sth->execute();//execute query

				$result = $sth->fetchColumn();//return result
				$_SESSION['userID'] = $result;
				$dir = "public_html/cases/$result";//directoy location and new folder name that will applied 
				
				$ftp_server = "ftp.sfcrjci.org";//FTP Server credentials for creating directory
				$ftp_user_name = "obodzie@sfcrjci.org";//FTP User credentials
				$ftp_user_pass = "r7Nv!WO_DeER";//FTP Password credentials

				$conn_id = ftp_connect($ftp_server);//set up basic connection
				
				$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);//login with username and password
				
				if (ftp_mkdir($conn_id, $dir)) {//try to create the directory $dir
				 $log= "successfully created $dir\n";//directory has been successfully created
				} else {
				 $log= "There was a problem while creating $dir\n";//directory has been unsuccessfully created
				}
				ftp_close($conn_id);//close the connection?>