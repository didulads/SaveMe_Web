<?php 
	include 'connection.php';
	$dev = $_POST['dev'];
	
	$itemquery = "SELECT * FROM `coinpayments` WHERE `gameId` IN (SELECT GameID FROM `games` WHERE `Developer_id` = (SELECT developerId FROM developer WHERE userId = '$dev'))";
	$resitem = mysqli_query($conn,$itemquery);
	if($resitem){
		$rows = array();
        while($r = mysqli_fetch_assoc($resitem)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
	}else{
		echo '404';
	}
?>