<?php
    include 'connection.php';
    $player = $_POST['player'];
    
    $orgquery = "SELECT SUM(earnedAmount) AS amount, dateEarned FROM `earnings` WHERE Player_id = '$player' GROUP by dateEarned";
    
    $res = mysqli_query($conn,$orgquery);
    
    if(mysqli_num_rows($res)){
        $rows = array();
        while($r = mysqli_fetch_assoc($res)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
    } else {
        echo "0";
    }

    mysqli_close($conn);
?>