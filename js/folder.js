function getIdRefresh(k){
		var s= document.getElementById(k).value;
		window.location.href = "authorHome.php?loc=" + s; 	
	}
	
function getIdRefreshReviewer(k){
		var s= document.getElementById(k).value;
		window.location.href = "reviewerHome.php?loc=" + s; 	
	}