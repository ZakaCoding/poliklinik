<?php
    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    $currpass  = $mysqli->real_escape_string($_POST['currpass']);
    $password  = $mysqli->real_escape_string($_POST['password']);
    $password2 = $mysqli->real_escape_string($_POST['password2']);
    $user = $mysqli->query("SELECT * FROM users WHERE email = '". $_SESSION['user']['email'] . "'");

    function errorHandling($errCode, $message)
    {
        global $name, $nim, $email;
        $error = [
            "errorCode" => $errCode
        ];
        
        // create session error
        $_SESSION['error'] = [ "errorCode" => $errCode, "message" => $message ];
        
        return header('location:' . BASE_URL . '/page/user');
    }

    $message = '';

    try {
        // Check form password and confirm
        if($currpass != password_verify($password,$data['password']))
        {
            $message = "Your typing password is not match with your current password";
            throw new Exception("ERR_WRONG_PASSWORD");
        }
        else
        {
            // Check password and confirm is match
            if($password != $confirmPassword)
            {
                $message = "Your typing password is not match";
                throw new Exception("ERR_PASSWORD_MISMATCH");
            }
        }
    } catch (Exception $e) {
        
        errorHandling($e->getMessage(),$message);
        exit();
    }

    if($user->num_rows > 0)
    {
        // Fetch to array data
        $user = $user->fetch_assoc();

        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
    }

    $mysqli->query("UPDATE users SET `password` = $password WHERE `nim` = ".$user['nim']) ;

    if($mysqli->affected_rows > 0)
    {
       // Redirect with success
       $_SESSION['flashMessage'] = [
        'status' => "success",
        'message' => "your data has been change."
        ];
        header('location: '.BASE_URL.'page/user');
    }
    else
    {
        // Redirect with success
        $_SESSION['flashMessage'] = [
            'status' => "failed",
            'message' => $mysqli->error
        ];
        header('location: '.BASE_URL.'page/user');
    }
?>