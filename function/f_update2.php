<?php
    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    $currpass  = $mysqli->real_escape_string($_POST['currpass']);
    $password  = $mysqli->real_escape_string($_POST['password']);
    $password2 = $mysqli->real_escape_string($_POST['password2']);

    $data = $mysqli->query("SELECT * FROM users WHERE email = '". $_SESSION['user']['email'] . "'");
    if($data->num_rows > 0)
    {
        // Fetch to array data
        $data = $data->fetch_assoc();
        // die("sadasa");
        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
    }
    
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
        if(empty($currpass))
        {
            $message = "This field is required.";
            throw new Exception("ERR_EMPTY_CURR");
        }
        else
        {
            // Check form password and confirm
            if(!password_verify($currpass,$data['password']))
            {
                $message = "Your typing password is not match with your current password";
                throw new Exception("ERR_INVALID_CURR");
            }
        }

        if(empty($password))
        {
            $message = "This field is required.";
            throw new Exception("ERR_EMPTY_PASSWORD");
        }
        else
        {
            // check password min length 8 and inlcude string,number,character
            if(strlen($password) < 8)
            {
                $message = "Password min 8 length and with Number and character";
                throw new Exception("WARNING_PASSWORD_LIMIT");
            }
        }

        if(empty($password2))
        {
            $message = "This field is required.";
            throw new Exception("ERR_EMPTY_REPASS");
        }
        else
        {
            // Check password and confirm is match
            if($password != $password2)
            {
                $message = "Your typing password is not match";
                throw new Exception("ERR_PASSWORD_MISMATCH");
            }
        }

    } catch (Exception $e) {
        errorHandling($e->getMessage(),$message);
        exit();
    }

    //hash password
    $pwd = password_hash($password,PASSWORD_DEFAULT);

    $mysqli->query("UPDATE users SET `password` = '$pwd' WHERE nim = ". $data['nim']);

    if($mysqli->affected_rows > 0)
    {
       // Redirect with success
       $_SESSION['flashMessage'] = [
        'status' => "Success",
        'message' => "your data has been change."
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