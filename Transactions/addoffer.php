<?php
	include 'connection.php';
	echo 'in';
	if(isset($_GET['barcode'])){
		$name = $_GET['name'];
		$barcode = $_GET['barcode'];
		$desc = $_GET['desc'];
		$coins = $_GET['coins'];
		$availability = $_GET['aval'];
		$org = $_GET['orgid'];
		
		$query = "INSERT INTO offerings(itemName,itemBarcode,itemDescription,offeredCoinAmount,availability,organizationId) VALUES('$name',$barcode,'$desc',$coins,$availability,'$org')";
		$res = mysqli_query($conn,$query);
		if(!$res){
			echo mysqli_error($conn);
		}else{
			echo 'Offer Added to the offer List';
		}	
	}else{
		echo 'Please Enter Valid values';
	}
?>