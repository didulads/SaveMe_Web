<?php
$servername = "localhost";
$username = "id9799843_didula";
$password = "didulads@gmail.com";
$dbname = "id9799843_saveme";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>