<?php
    include 'connection.php';
    $player = $_POST['player'];
    
    $orgquery = "SELECT SUM(amount) AS amount, paymentDate FROM `coinpayments` WHERE playerId = '$player' GROUP by paymentDate";
    
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