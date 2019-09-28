<?php
	include 'connection.php';
	$items = $_POST['items'];
	$user = $_POST['user'];
	
	$coins_tot = 0;
	
	$item_obj = json_decode($items,true);
	foreach($item_obj as $barcode){
	    
	$itemquery = "SELECT * FROM offerings WHERE itemBarcode = '$barcode'";
	
	$resitem = mysqli_query($conn,$itemquery);
	if(!$resitem){
		echo false;
	}
	if(mysqli_num_rows($resitem)==1){
		$rowitem = mysqli_fetch_assoc($resitem);
		if($rowitem['availability']==1){
			
			$userquery = "SELECT * FROM player INNER JOIN user ON player.userID=user.userId WHERE PlayerID = '$user'";
			$resuser = mysqli_query($conn,$userquery);
			if(!$resuser){
				echo false;
			}
			if(mysqli_num_rows($resuser)==1){
				$rowuser = mysqli_fetch_assoc($resuser);
				$coins = $rowitem['offeredCoinAmount'];
				$org = $rowitem['organizationId'];
				$orgquery = "SELECT * FROM organization WHERE Organization_ID = '".$org."'";
				$resorg = mysqli_query($conn,$orgquery);
				if(mysqli_num_rows($resorg)==1){
					$roworg = mysqli_fetch_assoc($resorg);
					if($roworg['CoinBalance']>=$coins){
						$orgbalquery = "UPDATE organization SET CoinBalance = (CoinBalance-$coins) WHERE Organization_ID = '$org'";
						$resorgbal = mysqli_query($conn,$orgbalquery);
						if(!$resorgbal){
							echo false;
						}else{
						    
						}
						
						$stockquery = "UPDATE player SET coinBalance = (coinBalance+$coins) WHERE PlayerID = '$user'";
						$resstock = mysqli_query($conn,$stockquery);
						if(!$resstock){
							echo false;
						}else{
						}
						
						$date = date('Y-m-d');
						
						$earningsquery = "INSERT INTO earnings(Player_id,earnedAmount,dateEarned,offeringId) VALUES('$user',$coins,'$date',".$rowitem['offering_id'].")";
						$researnings = mysqli_query($conn,$earningsquery);
						if(!$researnings){
							echo false;
						}else{
							$coins_tot = $coins_tot + $coins; 
							echo true;
						}
					}else{
						echo false;
					}
				}else{
					echo false;
				}
			}else{
				echo false;
			}
		}
	}else{
		echo false;
	}
	}
?>
