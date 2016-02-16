<div id="headerContainer">
	<div id="loginContainer">
    	<p><a href="register.php" id="joinStyle" >Join</a> 
        	<span style="font-size:20px">|</span> 
        <a href="
         <?php
			if(isset($_SESSION['login_user'])){
				echo "includes/logout.php";
			}else{
				echo "login.php";
			}
		?>" 
        id="loginStyle" >
        <?php
			if(isset($_SESSION['login_user'])){
				echo "Logout";
			}else{
				echo "Login";
			}
		?>
        </a></p>
    </div>
	<div id="menuContainer">
    	<a href="#">
			<div id="menuItem3Holder">
 				<p id="menuItem3">About</p>
    		</div>
        </a>
        <a href="#">
    		<div id="menuItem2Holder">
 				<p id="menuItem2">Archive</p>
    		</div>
        </a>
        <a href="#">
    		<div id="menuItem1Holder">
 				<p id="menuItem1">Resources</p>  
    		</div>
        </a>
    </div>
	<div id="headerLogo">
    	<a href="../index.php"><img src="../images/logo.png" width="400" height="83"/></a>
    </div>
</div>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/mainJS.js"></script>
