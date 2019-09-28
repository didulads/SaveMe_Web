<?php 
	include 'connection.php';
	if(!isset($_POST['date'])){
    	$itemquery = "SELECT COUNT(*) AS no,gameObjectId as obj,paymentDate as date FROM `coinpayments` GROUP BY gameObjectId ORDER BY no DESC";
	} else {
	    $itemquery = "SELECT COUNT(*) AS no,gameObjectId as obj,paymentDate as date FROM `coinpayments` WHERE paymentDate = '".$_POST['date']."' GROUP BY gameObjectId ORDER BY no DESC";
	}
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