<?php
	include 'connection.php';
	$barcode = $_POST['item'];
	
	$itemquery = "SELECT offering_id, organizationId, itemName, availability, offeredCoinAmount AS amount FROM offerings WHERE itemBarcode = '$barcode'";
	$resitem = mysqli_query($conn,$itemquery);
	if(!$resitem){
		echo 'Error occured';
	}
	if(mysqli_num_rows($resitem)==1){
	   // $rows = array();
    //     while($r = mysqli_fetch_assoc($resitem)) {
    //         $rows[] = $r;
    //     }
	    echo json_encode(mysqli_fetch_assoc($resitem));
	   //print_r(mysqli_fetch_assoc($resitem));
	}else{
		echo '0';
	}
?>
