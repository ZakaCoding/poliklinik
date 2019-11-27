<?php
    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    $name  = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $user = $mysqli->query("SELECT * FROM users WHERE email = '". $_SESSION['user']['email'] . "'");

    if($user->num_rows > 0)
    {
        // Fetch to array data
        $user = $user->fetch_assoc();

        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
    }

    $mysqli->query("UPDATE users SET `name` = '$name', `email` = '$email' WHERE nim =". $user['nim']);

    if($mysqli->affected_rows)
    {
        echo "Success";
        header("location:". BASE_URL .'/page/user');
    }
    else
    {
        echo "failed " . $mysqli->error;
    }
?>