<?php
	include 'connection.php';
	session_start();
	$playerid = $_GET['playerid'];
	$userid = $_SESSION['userid'];
	$query = "INSERT INTO player(PlayerID,userID,coinBalance) VALUES ('$playerid',$userid,0)";
	$updatedb = "UPDATE user SET usertype = 'Player' WHERE userID = $userid";
	if(mysqli_query($conn,$query)){
		mysqli_query($conn,$updatedb);
		if(isset($_SESSION['Player'])){
		    $_SESSION['Player']=$playerid;
		    echo "<script>location.href = '../Player/index.php'</script>";
		}else{
			unset($_SESSION['Player']);
			$_SESSION['Player']=$playerid;
			echo "<script>location.href = '../Player/index.php'</script>";
		}
	}else{
		echo "$userid Could not insert".mysqli_error($conn);
	}
?>