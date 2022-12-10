<?php 
    session_start();
    $server = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'ibuy';
    // global $conn;
    $conn = new mysqli($server, $userName, $password, $dbName);
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }
      

    function countPlus($table,$id) {
        $server = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'ibuy';
        $conn = new mysqli($server, $userName, $password, $dbName);
        $increaseCountSql = "UPDATE `$table` SET tbl_used_count = tbl_used_count + 1 WHERE `id` = '$id'";
        $conn->query($increaseCountSql);
    }

    function countMinus($table,$id) {
        $server = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'ibuy';
        $conn = new mysqli($server, $userName, $password, $dbName);
        $increaseCountSql = "UPDATE `$table` SET tbl_used_count = tbl_used_count - 1 WHERE `id` = '$id'";
        $conn->query($increaseCountSql);
    }

    function checkCount($table,$id,$col) {
        $server = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'ibuy';
        $conn = new mysqli($server, $userName, $password, $dbName);
        $increaseCountSql = "SELECT * FROM `$table` WHERE `$col` = '$id'";
        $count = $conn->query($increaseCountSql);
        return $count->num_rows;
    }

    // countPlus('tbl_auctions','2');
?>