<?php
    // Set default time zone
    // Agar php server sama dengan punya user untuk waktunya
    date_default_timezone_set('Asia/Jakarta');

    $mysqli = new mysqli('localhost','root','7cd81f88','poliklinik');
    // if connection has error
    if($mysqli->connect_error)
    {
        die("Mysql connection error [". $mysqli->connect_errno ."] ".$mysqli->connect_error);
        // End connection
        $mysqli->close;
    }

    // get data from database
    $dateNow = date('Y-m-d');
    // die($dateNow);
    $sql = $mysqli->query("SELECT `reservased_at` FROM `tbl_reservasi` WHERE `reservased_at` = '$dateNow'");
    $queueNow = $sql->num_rows;

    if($sql->num_rows > 0)
    {  
        $countQueue = $queueNow;
        // Update queue
        $mysqli->query("START TRANSACTION");
        $dataQueue = $mysqli->query("SELECT * FROM `queue` FOR UPDATE");
        $data = $dataQueue->fetch_assoc();
        $data = $data['queue']; // data queue before commit

        // Now update on queue
        $mysqli->query("UPDATE `queue` SET `queue` = 100-$queueNow");
        // Check is affected rows database
        if($mysqli->affected_rows)
        {
            echo "Success update queue to 100.<br>";
            echo "last data ".$data;
            // Commit change if success
            $mysqli->query("COMMIT");
        }
        else
        {
            echo "Failed update queue. ".$mysqli->error;
            // Rollback data last change
            $mysqli->query("ROLLBACK");
        }
    }
    else
    {
        $countQueue = $queueNow;
        // Update queue
        $mysqli->query("START TRANSACTION");
        $dataQueue = $mysqli->query("SELECT * FROM `queue` FOR UPDATE");
        $data = $dataQueue->fetch_assoc();
        $data = $data['queue']; // data queue before commit

        // Now update on queue
        $mysqli->query("UPDATE `queue` SET `queue` = 100");
        // Check is affected rows database
        if($mysqli->affected_rows)
        {
            echo "Success update queue to 100.<br>";
            echo "last data ".$data;
            // Commit change if success
            $mysqli->query("COMMIT");
        }
        else
        {
            echo "Failed update queue. ".$mysqli->error;
            // Rollback data last change
            $mysqli->query("ROLLBACK");
        }
    }