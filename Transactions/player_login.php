<?php
	include 'connection.php';
	$gamer = $_GET['playerid'];
	$password = $_GET['password'];
	
	$itemquery = "SELECT player.coinBalance, user.username, player.PlayerID FROM user INNER JOIN player ON player.userID = user.userId WHERE player.PlayerID = '$gamer' AND user.password = '$password';";
	$resitem = mysqli_query($conn,$itemquery);
	if(!$resitem){
		echo '2';
	}
	if(mysqli_num_rows($resitem)==1){
		$row = mysqli_fetch_assoc($resitem);
        echo $row['coinBalance']."|".$row['username']."|".$row['PlayerID'];
	}else if(mysqli_num_rows($resitem)>1){
		echo '2';
	}else{
		echo '404';
	}
?>