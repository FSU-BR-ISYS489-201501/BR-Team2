<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCI: Critical Incidents</title>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <?php include( "includes/header.php");?>
        <!--search part ends-->
        <div class="row gutter">
            <!--Journal Search Bar Starts-->
            <div class="col search">
                <div class="searchbg">
					<h3 class="title">Search Critical Incident:</h3>
                    <form action="criticalIncidents.php" method="post" enctype="multipart/form-data" >
                            <input class="search2" type="search" name="searchInput" placeholder="Enter Search Term">
                            <input type="submit" class="button go orange searchgobutton" name="go" value= "Go">
                              
                    </form>
                    
                </div>
            </div>
        </div>
        <!--Journal Search Bar Ends-->
        <div class="content">
            <div class="row gutter">
                <div class="col m12">
                    <div class="col m10">
                        <div class="results">
                        	<?php include( "includes/filteredSearch.php");?>    
                        </div>
                    </div>
                    <div class="col m2">
                        <div>
                            <img class="ads" src="../images/journal-image.jpg">
                        </div>
                        <div>
                            <img class="ads" src="../images/journal-image.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m12">
                <?php include( "includes/footer.php");?>
            </div>
        </div>
        <script src="../js/jquery-1.12.0.min.js"></script>
        <script src="../js/tabs.js"></script>
        <script src="../js/searchdropdown.js"></script>
</body>

</html>