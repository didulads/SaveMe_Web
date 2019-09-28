<?php
include 'connection.php';
$orgid = $_POST['org']; 
$date = date('Y-m-d');
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$coins = $_POST['coins'];
	$offer = $_POST['offer'];
	$cost = $_POST['cost'];
	$query = "INSERT INTO package(packageName,CoinAmount,offeradvert,cost) VALUES('$name',$coins,$offer,'$cost');";
	$res = mysqli_query($conn,$query);
	if(!$res){
		echo 'Unsuccessful '.mysqli_error($conn);
	}else{
		$id= mysqli_insert_id($conn);
		$querypr = "INSERT INTO packagepurchases(datePurchased,amount,packageId,organizationId) VALUES('$date',$cost,$id,'$orgid');";
		$respr = mysqli_query($conn,$querypr);
		if(!$respr){
			echo 'Unsuccessful '.mysqli_error($conn);
		}else{
			$updquery = "UPDATE organization SET CoinBalance = CoinBalance + $coins WHERE Organization_ID = '$orgid';";
			$resupd = mysqli_query($conn,$updquery);
			if(!$resupd){
				echo 'Unsuccessful '.$updquery;
			}else{
				echo 'UPDATE Success';
			}
		}
	}
}
else{
	$package = $_POST['pkg'];
	if($package==10){
		$insq = "INSERT INTO packagepurchases(datePurchased,amount,packageId,organizationId) VALUES('$date',$package,1,'$orgid');";
	}if($package==50){
		$insq = "INSERT INTO packagepurchases(datePurchased,amount,packageId,organizationId) VALUES('$date',$package,2,'$orgid');";
	}if($package==100){
		$insq = "INSERT INTO packagepurchases(datePurchased,amount,packageId,organizationId) VALUES('$date',$package,3,'$orgid');";
	}
	$resq = mysqli_query($conn,$insq);
	if(!$resq){
		echo 'Unsuccessful '.mysqli_error($conn);
	}else{
			$updquery = "UPDATE organization SET CoinBalance = CoinBalance + ($package) WHERE Organization_ID = '$orgid';";
			$resupd = mysqli_query($conn,$updquery);
			if(!$resupd){
				echo 'Unsuccessful '.$updquery;
			}else{
				echo 'UPDATE Success';
			}
	}
}
?>