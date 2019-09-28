<?php
	include 'connection.php';
	$user = $_GET['userid'];
	
	$itemquery = "SELECT * FROM user INNER JOIN player ON player.userID = user.userId WHERE player.PlayerID = '$user';";
	$resitem = mysqli_query($conn,$itemquery);
	if(!$resitem){
		echo 'Error occured '.mysqli_error($conn);
	}
	if(mysqli_num_rows($resitem)==1){
		$row = mysqli_fetch_assoc($resitem);
		echo 'Success';
	}else if(mysqli_num_rows($resitem)>1){
		echo 'Error While Login';
	}else{
		echo 'UserID is invalid';
	}
?>