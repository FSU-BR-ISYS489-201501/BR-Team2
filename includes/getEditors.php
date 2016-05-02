 <?php
					$dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
					$username = "T2BRGOLIVE";
					$password = "B1G70N@";

					try{ //try database connection
						$dbConnect = new PDO($dbConnect, $username, $password); //if successful, connect
					} catch (PDOException $error) { //error handling
						echo 'Error Connecting: ' . $error->getMessage(); //display connect unsuccessful error
					}
						
						$smt = $dbConnect->prepare('SELECT * FROM `user` WHERE `littleEditor` = 1');
						$smt->execute();
						$littleE = $smt->fetchAll();
						
						$smt2 = $dbConnect->prepare('SELECT * FROM `user` WHERE `bigEditor` = 1');
						$smt2->execute();
						$bigE = $smt->fetchAll();
							echo '<table height="100px" style="position:absolute; top:0; overflow:hidden;">';
							echo '<tbody style="height:auto; display:table; width:100%; overflow:hidden;">';
							
                        	echo '<th>First Name</th>';
                        	echo '<th>Last Name</th>';
                            echo '<th>Employer</th>';
                            echo '<th>Expertise</th>';
                        	echo '</tr>';
														
                    
							foreach ($littleE as $row){
							echo '<tr>';
							echo '<td>'.$row['firstName']. '</td>';
							echo '<td>'.$row['lastName']. '</td>';
							echo '<td>'.$row['employer']. '</td>';
							echo '<td>'.$row['expertise']. '</td>';
							echo '</tr>';
							}
							
							foreach ($bigE as $row){
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