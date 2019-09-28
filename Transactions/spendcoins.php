<?php
	include 'connection.php';
	$obj = $_GET['obj'];
	$gameId = $_GET['gameId'];
	$playerid = $_GET['playerid'];
	
	$itemquery = "SELECT * FROM gameobject WHERE gameobjectId = '$obj' AND gameId = '$gameId'";
	$resitem = mysqli_query($conn,$itemquery);
	if(!$resitem){
		echo 'Error occured';
	}
	if(mysqli_num_rows($resitem)==1){
		$rowitem = mysqli_fetch_assoc($resitem);
		$objcoinval = $rowitem['obj_coins'];
		$userquery = "SELECT coinBalance FROM player WHERE PlayerID = '$playerid'";
		$resuser = mysqli_query($conn,$userquery);
		$rowuser = mysqli_fetch_assoc($resuser);
		$usercoinval = $rowuser['coinBalance'];
		if($objcoinval<$usercoinval){
			$updatedcoin = ($usercoinval-$objcoinval);
			$coinupdate = "UPDATE player SET coinBalance = $updatedcoin WHERE PlayerID = '$playerid'";
			$resupdate = mysqli_query($conn,$coinupdate);
			if(!$resupdate){
				echo 'Error occured while updating | '.$coinupdate;
			}else{
				$date = Date('Y-m-d');
				$purchaselogq = "INSERT INTO coinpayments(amount,paymentDate,playerId,gameObjectId,gameId) VALUES($objcoinval,'$date','$playerid','$obj','$gameId');";
				$reslog = mysqli_query($conn,$purchaselogq);
				if(!$reslog){
					echo 'Error occured while payment | '.$purchaselogq;
				}else{
					echo 'You Purchased the item successfully';
				}
			}
		}else{
			echo 'Sorry You do not have enough coins.';
		}
	}else if(mysqli_num_rows($resitem)>1){
		echo 'Error Occured While Purchasing';
	}else{
		echo 'This Object cannot purchase using "SAVE ME"';
	}
?>