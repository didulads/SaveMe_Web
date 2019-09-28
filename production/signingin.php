<?php
	if (!session_id()) { session_start(); }
	include('connection.php');
	if(isset($_GET['usernametxt']) && isset($_GET['passwordtxt'])){
	$name = $_GET['usernametxt'];
	$password = $_GET['passwordtxt'];
	
	$query_string = "SELECT * FROM user WHERE username='$name' AND password='$password'";
	$query=mysqli_query($conn,$query_string);

		if(mysqli_error($conn)){
			echo mysqli_error($conn);
		}
// 		echo mysqli_num_rows($query);
		if(mysqli_num_rows($query)==1){
			$usertype = "";
			$row = mysqli_fetch_assoc($query);
			$usertype = $row['usertype'];
// 			print_r($row);
				// echo 'User Type: '.$usertype;
			if($usertype=='Player'){
				if(!isset($_SESSION['Player'])){
				$_SESSION['Player']=$name;
				$_SESSION['userid']=$row['userID'];
				echo '<script>location.href="../Player/index.php";</script>';
			}else{
				unset($_SESSION['Player']);
				$_SESSION['Player']=$name;
				$_SESSION['userid']=$row['userID'];
				echo '<script>location.href="../Player/index.php";</script>';
			}
			}
			elseif($usertype=='Developer'){
			    print_r($row);
				if(!isset($_SESSION['Developer'])){
					$_SESSION['Developer']=$name;
					$_SESSION['userid']=$row['userID'];
					echo '<script>location.href="../Developer/index.php";</script>';
				}else{
					unset($_SESSION['Developer']);
					$_SESSION['Developer']=$name;
					$_SESSION['userid']=$row['userID'];
					echo '<script>location.href="../Developer/index.php";</script>';
				}
				echo '<br>'.$_SESSION['userid'];
			}
			elseif($usertype=='Distributor'){
				if(!isset($_SESSION['Distributor'])){
				$_SESSION['Distributor']=$name;
				$_SESSION['userid']=$row['userID'];
				echo '<script>location.href="../Distributor/index.php";</script>';
			}else{
					unset($_SESSION['Distributor']);
					$_SESSION['Distributor']=$name;
					$_SESSION['userid']=$row['userID'];
					echo '<script>location.href="../Distributor/index.php";</script>';
				}
			}
			if($usertype==""){
				// echo 'failed';
				$_SESSION['user'] = $name;
				echo '<script>location.href="../production/usertype.php";</script>';
			}
		} else {
		    echo '<script>location.href="./login.php?attempt=1";</script>';
		}
	}
?>