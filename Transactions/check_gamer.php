<?php
    include 'connection.php';
    $player = $_POST['player'];
    $gamerquery = "SELECT * FROM player WHERE PlayerID = '$player'";

    $res = mysqli_query($conn,$gamerquery);

    if(mysqli_num_rows($res) == 1){
        echo "1";
    } else {
        echo "0";
    }

    mysqli_close($conn);
?>