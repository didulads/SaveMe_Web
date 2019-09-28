<?php
	include 'connection.php';
	$gametype = $_POST['gametype'];
	$gamename = $_POST['gamename'];
	$gameid = $_POST['gameid'];
	$devid = $_POST['developerid'];
	$description = $_POST['desc'];
	if(isset($_POST['uploadbtn'])){
		if($_FILES['ups']['size']){
			$filename = $_FILES['ups']['name'];
			$tmpName = $_FILES['ups']['tmp_name'];
			$fileSize = $_FILES['ups']['size'];
			$fileType = $_FILES['ups']['type'];
			
			$tmpThumb = $_FILES['thumb']['tmp_name'];
			$thfp = fopen($tmpThumb,'r');
			$thumbcont = fread($thfp,filesize($tmpThumb));
			$thumbcont = addslashes($thumbcont);
			fclose($thfp);
			
			$fp = fopen($tmpName,'r');
			$content = fread($fp,filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);
			
			$query = "INSERT INTO games VALUES('$gameid','$gamename','$devid','$gametype','$content',($fileSize/1024),'$thumbcont','$description');";
			$res = mysqli_query($conn,$query);
			if(!$res){
				echo '<html><head>';
				echo '<link rel="stylesheet" type="text/css" href="../production/css/sweetalert.css">';
				echo '</head><body>';
				echo '<script src="../production/js/sweetalert.min.js"></script>';
				echo '<script>swal({
					title: "Game Upload Unsuccessful",
					text: "Error '.mysqli_error($conn).'",
					type: "error",
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
				echo '<script>swal({
					title: "Game Upload Successful",
					text: "Game uploaded with ID : '.$gameid.'",
					type: "success",
					confirmButtonText: "Go Back"},
					function(){
						location.href = "index.php";
				});</script>';
				echo '</body></html>';
			}
		}else{
			print_r($_FILES['ups']['error']);
		}
	}
?>