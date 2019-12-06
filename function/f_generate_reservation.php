<?php
    // include config file
    include_once '../config/config.php';
    session_start();

    // Code ...
    if(!isset($_POST['reserve']))
    {
        // redirect back
        header('location:'.BASE_URL);
        exit();
    }
    
    // Get all data form input
    $uniqid = uniqid();
    $complaint = $mysqli->real_escape_string($_POST['complaint']);
    $date = $mysqli->real_escape_string($_POST['date']);
    $poliCategory = $mysqli->real_escape_string($_POST['poliCategory']);
    $typeUser = $mysqli->real_escape_string($_POST['typeUser']);

    // User id
    $sql = $mysqli->query("SELECT user_id FROM `users` WHERE email = '". $_SESSION['user']['email'] ."'");
    if($sql->num_rows > 0)
    {
        $userId = $sql->fetch_assoc();
        $userId = $userId['user_id'];
    }

    // Error handling here

    // Database transaction
    $mysqli->query("START TRANSACTION");
    $queue = $mysqli->query("SELECT queue FROM `queue` FOR UPDATE");
    $dataQ = $queue->fetch_assoc();
    $dataQ = $dataQ['queue'];
    // Generate ticket
    switch($poliCategory) {
        case 'Poli Umum':
            $ticket = 'U'.$dataQ;
        break;
        case 'Poli Gigi':
            $ticket = 'G'.$dataQ;
        break;
        case 'Poli Ibu dan Anak':
            $ticket = 'MC'.$dataQ;
        break;
        default:
            // Run code default
            $ticket = $dataQ;
        break;
    }
    // Insert to database
    $query = "INSERT INTO `tbl_reservasi` (`reservation_id`,`user_id`, `poli_category`,`queue`, `complaint`,`status`,`ticket`,`reservased_at`, `created_at`, `updated_at`) VALUES (".
    $values .= "'$uniqid',$userId, '$poliCategory', $dataQ, '$complaint', 'confirmed', '$ticket', '$date', NOW(), NOW())";

    // check data success insert
    if($mysqli->query($query))
    {
        // And update queue with commit
        $mysqli->query("UPDATE queue SET `queue` = $dataQ-1");
        $mysqli->query('COMMIT');

        // Redirect with success
        $_SESSION['flashMessage'] = [
            'status' => "Success",
            'message' => "Your data has been change."
        ];
        // echo "Success insert to database";
        header('location:'.BASE_URL);
    }
    else
    {
        $mysqli->query('ROLLBACK');
        // echo "failed ". $mysqli->error;

        // Redirect with success
        $_SESSION['flashMessage'] = [
            'status' => "Failed",
            'message' => "Failed add reservation. ".$mysqli->error
        ];
        header('location:'.BASE_URL);
    }

    