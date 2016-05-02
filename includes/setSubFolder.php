<?php
	session_start();
	echo "<script language='javascript'>\n";
						echo "alert('" .$_SESSION['folder']."'); ";
						echo "</script>\n";
	
	
	//header('Location: http://www.br-t2-jci.sfcrjci.org/authorHome.php');
	
	?>