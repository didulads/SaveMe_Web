<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['Player']);
	unset($_SESSION['Developer']);
	unset($_SESSION['Distributor']);
	header("Location: login.php");
?>