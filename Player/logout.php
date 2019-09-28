<?php
	session_start();
	unset($_SESSION['Player']);
	unset($_SESSION['user']);
	header("location: ../production/login.php");
?>