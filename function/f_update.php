<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    // Load composer's AutoLoader
    require '../source/vendor/autoload.php';

    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    $name  = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $user = $mysqli->query("SELECT * FROM users WHERE email = '". $_SESSION['user']['email'] . "'");

    /**
     * Error handling with session flash data
     */
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


    /**
     * Error exceptipon handling
     * if any error, system throw error and
     * redirect back with flash message
     */
    $message = '';

    try {
        // Check form name
        if(empty($name))
        {
            $message = "The name field is required.";
            throw new Exception("ERR_EMPTY_NAME");
        }
        else
        {
            /**
             * Only letter and spacing are allowed
             */
            if(!preg_match("/^[a-zA-Z_\s]*$/",$name))
            {
                $message = "This field can only be filled with the alphabet excluding numbers or characters. Your request to change is <strong>".$name.'</strong>';
                throw new Exception("ERR_INVALID_NAME");
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


    if($email != $_SESSION['user']['email'])
    {
        $mysqli->query("UPDATE users SET `name` = '$name', `email` = '$email', `email_verified_at` = NULL, `updated_at` = NOW() WHERE nim =". $user['nim']);
    }
    else
    {
        $mysqli->query("UPDATE users SET `name` = '$name', `email` = '$email', `updated_at` = NOW() WHERE nim =". $user['nim']);
    }

    if($mysqli->affected_rows > 0)
    {
        // Redirect with success
        $_SESSION['flashMessage'] = [
            'status' => "success",
            'message' => "Your data has been change."
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