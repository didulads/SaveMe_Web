<?php
include 'connection.php';
$gameid = $_POST['gamename'];
$errors = true;
$dup = false;
for($i=0;$i<sizeof($_POST['objid']);$i++){
	$objid = $_POST['objid'][$i];
	$objname = $_POST['objname'][$i];
	$objdetails = $_POST['objdetails'][$i];
	$objcoins = $_POST['objcoins'][$i];
	
	$objquery = "INSERT INTO gameobject VALUES('$objid','$objname','$objdetails',$objcoins,'$gameid');";
	$objres = mysqli_query($conn,$objquery);
	if(!$objres){
		if(mysqli_errno($conn)==1062){
			echo 'You have registered this object already '.$objid;
			$dup = true;
		}
		else{
			echo 'Sorry! Unexpected error occured '.mysqli_errno($conn);
		}
	}else{
		$errors = false;
	}
}
if(!$errors){
		echo 'Insert successful';
		echo '<html><head>';
		echo '<link rel="stylesheet" type="text/css" href="../production/css/sweetalert.css">';
		echo '</head><body>';
		echo '<script src="../production/js/sweetalert.min.js"></script>';
		echo '<script>swal({
			title: "Game Objects Registered",
			text: "Update Successful",
			type: "success",
			confirmButtonText: "Go Back"},
			function(){
			location.href = "index.php";
		});</script>';
		echo '</body></html>';
}else{
	echo '<html><head>';
		echo '<link rel="stylesheet" type="text/css" href="../production/css/sweetalert.css">';
		echo '</head><body>';
		echo '<script src="../production/js/sweetalert.min.js"></script>';
		if($dup){
		echo '<script>swal({
			title: "You have already registered this object.",
			text: "Duplicate",
			type: "error",
			confirmButtonText: "Go Back"},
			function(){
				location.href = "index.php";
			});</script>';
		}else{
			echo '<script>swal({
			title: "Register Unsuccessful",
			text: "Error ",
			type: "error",
			confirmButtonText: "Go Back"},
			function(){
				location.href = "index.php";
			});</script>';
		}
			echo '</body></html>';
}
?>