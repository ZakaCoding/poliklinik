<?php
    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    $name  = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $nim = $mysqli->$query = "SELECT nim FROM users WHERE name = ?";

    $query = "UPDATE `users` SET `name` = $nama, `email` = $email WHERE `nim` = $nim ";

    if($mysqli->query($query))
    {
        echo "Success";
    }
    else
    {
        echo "failed " . $mysqli->error;
    }
?>