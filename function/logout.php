<?php
    session_start();
    include_once '../config/config.php';

    // clearly token when user logout
    $mysqli->query("UPDATE users SET remember_token = '' WHERE email = '". $_SESSION['user']['email'] ."'");
    if($mysqli->affected_rows)
    {
        session_unset();
        session_destroy();
        // Redirect to landing page
        header('location: '.BASE_URL);
    }
    else
    {
        // No else i mean :)
        session_unset();
        session_destroy();
        // Redirect to landing page
        header('location: '.BASE_URL);
    }