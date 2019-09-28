<?php
include 'connection.php';
if(isset($_GET['gameid'])){
$gameid = $_GET['gameid'];
$q = "SELECT * FROM games WHERE GameID = '$gameid';";
$res = mysqli_query($conn,$q);
$row = mysqli_fetch_assoc($res);
$filesize = $row['filesize'];
$filesize = $filesize * 1024;
header("Content-Type: .apk");
header("Content-Length: ".$filesize);
header("Content-Disposition: attachment; filename=".$row['name'].".apk");
echo $row['gameapk'];
}
?>