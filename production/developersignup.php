<?php
include 'connection.php';
session_start();

$devid = $_GET['devid'];
$nickname = $_GET['nicknametxtup'];
$account = $_GET['accountup'];
$devtype = $_GET['devtype'];
if(isset($_SESSION['userid'])){
	$userid = $_SESSION['userid'];
} else {
	$userid = 400;
}

$devquery = "INSERT INTO developer(developerId,userId,developerType,nickname,accountnumber) VALUES('$devid',$userid,'$devtype','$nickname',$account);";
$res = mysqli_query($conn,$devquery);
if(!$res){
	echo 'Error Occured '.mysqli_error($conn);
}else{
	echo 'Developer Added Successfully';
	$_SESSION['Developer'] = $nickname;
	
	$devupd = "UPDATE user SET usertype = 'Developer' WHERE userId = $userid";
	$resupd = mysqli_query($conn,$devupd);
	
	if(!$resupd){
		echo 'Error occured while updating';
	}else{
		echo "<script>location.href = '../Developer/index.php'</script>";
	}
}
?>
