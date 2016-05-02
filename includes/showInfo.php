                <!--Row gutter starts-->
				<?php
                    $option = isset($_POST['cellproviders']) ? $_POST['cellproviders'] :
                    false;
                    $number = isset($_POST['number']) ? $_POST['number'] :
                    false;
                    
                    if ($option) {
                        
                        if ($number) {
                            $dbConnect = 'mysql:dbname=br_t2_jci;host=localhost';
                            $username = "T2BRGOLIVE";
                            $password = "B1G70N@";
                            try{
                                $dbConnect = new PDO($dbConnect, $username, $password);
                            }
                
                            catch (PDOException $error) {
                                echo 'Error Connecting: ' . $error->getMessage();
                            }
                
                            $chkPhone = $dbConnect->prepare("SELECT `phoneID` FROM `phone` WHERE `primaryPhone`=:phone");
                            $chkPhone->bindValue(":phone", $number);
                            $chkPhone->execute();
                            $phoneID = $chkPhone->fetch(PDO::FETCH_ASSOC);
                            $phoneID = $phoneID['phoneID'];
                            $chkPhoneN = $dbConnect->prepare("SELECT `email` FROM `user` WHERE `phoneID`=:phoneID");
                            $chkPhoneN->bindValue(":phoneID", $phoneID);
                            $chkPhoneN->execute();
                            $email = $chkPhoneN->fetch(PDO::FETCH_ASSOC);
                            $email = $email['email'];
                            $phone = $_POST['number'];
                            $address = $_POST['cellproviders'];
                            $fullAddress = $phone . $address;
                            $to = $fullAddress;
                            $subject = "Recover Username - SFCRJCI";
                            $txt = "Your active email address is " . $email;
                            mail($to,$subject,$txt);
                            echo "<script language='javascript'>\n";
                        echo "alert('Please be patient. Your current email address is being sent to: " .$phone."'); window.location.href='http://br-t2-jci.sfcrjci.org/login.php';";
                        echo "</script>\n";
                        }
                
                    } else {
                        echo "<script language='javascript'>\n";
                        echo "alert('Task Option Is Required'); window.location.href='http://br-t2-jci.sfcrjci.org/recoverAccount.php';";
                        echo "</script>\n";
                        exit;
                    }
                
                ?>
