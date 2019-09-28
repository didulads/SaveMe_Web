<?php 
	include 'connection.php';
	$org = $_POST['org'];
	
	$itemquery = "SELECT itemName,itemDescription,offeredCoinAmount,itemBarcode FROM `offerings` WHERE organizationId='".$org."'";
	$resitem = mysqli_query($conn,$itemquery);
	if($resitem){
		$rows = array();
        while($r = mysqli_fetch_assoc($resitem)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
	}else{
		echo '404 '.$itemquery;
	}
?>