<?php
	if (!session_id()) { session_start(); }
	include('connection.php');
	$name = $_GET['usernametxtup'];
	$password = $_GET['passwordtxtup'];
	$email = $_GET['emailtxtup'];
// 	$birthday = $_GET['birthdaytxt'];
	$regdate = $_GET['regDate'];
	$country = $_GET['country'];
	
	$count_query = "SELECT * FROM user";
	$query_string = "SELECT * FROM user WHERE username='$name'";
	$countresult=mysqli_query($conn,$count_query);
	$count = mysqli_num_rows($countresult)+1;
	list($regmonth, $regday, $regyear) = explode('/', $regdate);
	$registrationDate = "$regyear-$regmonth-$regday";
	// list($bmonth, $bday, $byear) = explode('/', $birthday);
	// $birthDate = "$byear-$bmonth-$bday";
// 	$birthDate = $birthday;
	$insert_string = "INSERT INTO user(userName,registeredDate,password,country,email) values('$name','$registrationDate','$password','$country','$email')";
	
	$query = mysqli_query($conn,$query_string);
		
		if(!$query){
			echo 'failed '.mysqli_error($conn);
		}
		
		if(!mysqli_num_rows($query)>0){
			if(mysqli_query($conn,$insert_string)){
				//get the added row's id
				if(!isset($_SESSION['user'])){
					header("location: usertype.php");
					$_SESSION['user']=$name;
					$_SESSION['userid']= mysqli_insert_id($conn);
				} else {
				    echo $_SESSION['user'];
				}
			}else{
				echo "Could not insert".mysqli_error($conn);
			}
		}else{
			echo "User Exist";
		}
?>
