<?php
	include 'connection.php';
	$gamer = $_GET['playerid'];
	
	$itemquery = "SELECT coinBalance FROM player WHERE PlayerID = '$gamer';";
	$resitem = mysqli_query($conn,$itemquery);
	if(!$resitem){
		echo '2';
	}
	if(mysqli_num_rows($resitem)==1){
		$row = mysqli_fetch_assoc($resitem);
        echo $row['coinBalance'];
	}else if(mysqli_num_rows($resitem)>1){
		echo '2';
	}else{
		echo '404';
	}
?>