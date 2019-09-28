<?php
include 'connection.php';
$orgid = $_POST['org']; 
$query = "SELECT CreditCardNumber FROM organization INNER JOIN user ON organization.userId = user.userId WHERE organization.Organization_ID = '$orgid'";
$res = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($res);
echo $row['CreditCardNumber'];
?>