 <?php
					$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
					$username = "T2BRGOLIVE";
					$password = "B1G70N@";

					try{ //try database connection
						$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
					} catch (PDOException $error) { //error handling
						echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
					}
						
						$smt = $dbConnect->prepare('SELECT * FROM `user` WHERE `reviewer` = 1');
						$smt->execute();
						$reviewer = $smt->fetchAll();
						
						
							echo '<table height="100px" style="margin-top:0px; overflow-y:scroll;">';
							echo '<tbody style="overflow:hidden; height:auto; display:table; table-layout:fixed; width:100%;">';
							
                        	echo '<th>First Name</th>';
                        	echo '<th>Last Name</th>';
                            echo '<th>Employer</th>';
                            echo '<th>Expertise</th>';
                        	echo '</tr>';
														
                    
							foreach ($reviewer as $row){
							echo '<tr>';
							echo '<td>'.$row['firstName']. '</td>';
							echo '<td>'.$row['lastName']. '</td>';
							echo '<td>'.$row['employer']. '</td>';
							echo '<td>'.$row['expertise']. '</td>';
							echo '</tr>';
							}
							
							
							echo '<tr>';
							echo '</tr>';
                        	echo '</tbody>';
                    		echo '</table>';
						
						?>  