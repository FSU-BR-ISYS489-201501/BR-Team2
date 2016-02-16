<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/main-styles.css">
<!-- https://www.google.com/fonts#UsePlace:use/Collection:PT+Sans -->
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

</head>
<body>


<div id="userWrapper">

    	<header> 
			<nav>
				<ul>
					<li><a id = "AU" onClick="loadQueryResults(this.id)" class="links" >AUTHOR</a></li>
					<li><a id = "ED" onClick="loadQueryResults(this.id)" class="links" >EDITOR</a></li>
					<li><a id = "RE" onClick="loadQueryResults(this.id)" class="links" >REVIEWER</a></li>
				</ul>
			</nav>

		</header>

		<script>
			function loadQueryResults(clicked_id) {
				//alert(clicked_id);
				
				if (clicked_id == "AU") {
					$('#content').load('authorBody.php');
				return false;
				}	
				else if (clicked_id == "ED") {
					$('#content').load('editorBody.php');
				return false;
				}	
				else if (clicked_id == "RE") {
					$('#content').load('reviewerBody.php');
				return false;
				}	
			}
		</script>
		
		<section id="content">
		</section>
		

	</div>





<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/mainJS.js"></script>

</body>
</html>