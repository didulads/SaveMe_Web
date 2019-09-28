<?php
    include 'connection.php';
    $org = $_POST['org'];
    $pw = $_POST['pw'];
    $orgquery = "SELECT o.Organization_ID, u.username, o.CoinBalance from user AS u INNER join organization AS o where u.userID = o.userId AND o.Organization_ID = '$org' and u.password = '$pw'";
    
    $res = mysqli_query($conn,$orgquery);
    
    if(mysqli_num_rows($res) == 1){
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