<?php
    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    $dateReserve  = $mysqli->real_escape_string($_POST['dateReserve']);
    $poliCategory = $mysqli->real_escape_string($_POST['poliCategory']);
    $inputComplaint = $mysqli->real_escape_string($_POST['complaint']);
    $rID = $mysqli->real_escape_string($_POST['reserveID']);
    $user = $mysqli->query("SELECT * FROM users WHERE email = '". $_SESSION['user']['email'] . "'");

    /**
     * Error exceptipon handling
     * if any error, system throw error and
     * redirect back with flash message
     */
    $message = '';
    
    if($user->num_rows > 0)
    {
        // Fetch to array data
        $user = $user->fetch_assoc();

        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
    }
    
    $mysqli->query("UPDATE tbl_reservasi SET `reservased_at` = '$dateReserve', `poli_category` = '$poliCategory', `complaint` = '$inputComplaint' , `updated_at` = NOW() WHERE reservation_id ='$rID'");
    if($mysqli->affected_rows > 0)
    {
        // Redirect with success
        $_SESSION['flashMessage'] = [
            'status' => "Success",
            'message' => "Your Reservation has been change. with this ID ".$rID
        ];
        header('location: '.BASE_URL.'page/user');
    }
    else
    {
        // Redirect with success
        $_SESSION['flashMessage'] = [
            'status' => "Failed",
            'message' => $mysqli->error
        ];
        header('location: '.BASE_URL.'page/user');
    }
?>