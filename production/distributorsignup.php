<?php
	include 'connection.php';
	session_start();
	$orgid = $_GET['orgid'];
	$creditcard = $_GET['CreditCardNumbertxtup'];
	$pin = $_GET['Pintxtup'];
	$contact = $_GET['ContactNumbertxtup'];
	$userid = $_SESSION['userid'];
	$username = $_SESSION['user'];
	
	$query = "INSERT INTO organization(Organization_ID,userId,CreditCardNumber,PIN,contactNumber,CoinBalance) VALUES ('$orgid',$userid,$creditcard,$pin,$contact,0)";
	$res = mysqli_query($conn,$query);
	if(!$res){
		echo 'Error Occured '.mysqli_error($conn);
	}else{
		$_SESSION['Distributor'] = $username;
		
		$disupd = "UPDATE user SET usertype = 'Distributor' WHERE userId = $userid";
		$resupd = mysqli_query($conn,$disupd);
		
		if(!$resupd){
			echo 'Error occured while updating';
		}else{
			echo "<script>location.href = '../Distributor/index.php'</script>";
		}
	}
?>