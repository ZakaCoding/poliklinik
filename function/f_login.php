<?php
    // Start session
    session_start();
    // get connection to database
    include_once "../config/config.php";

    // if register button did not click
    if(!isset($_POST['sign']))
    {
        // redirect back
        header("location: " . BASE_URL . 'page/auth/login.php');
        exit(); // Stop code
    }

    // Get all data request form register.php
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    /**
     * Error handling with session flash data
     */
    function errorHandling($errCode, $message)
    {
        global $name, $nim, $email;
        $error = [
            "errorCode" => $errCode
        ];
        
        // create temp data if any error
        $request = [
            "email" => $email
        ];
        
        // create session error
        $_SESSION['data'] = $request;
        $_SESSION['error'] = [ "errorCode" => $errCode, "message" => $message ];
        
        return header('location:' . BASE_URL . 'page/auth/login.php');
        exit();
    }


    /**
     * Error exceptipon handling
     * if any error, system throw error and
     * redirect back with flash message
     */
    $message = '';

    try {
        // Check form email
        if(empty($email))
        {
            $message = "The name field is required.";
            throw new Exception("ERR_EMPTY_EMAIL");
        }
        else
        {
            /**
             * validate email format
             */
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $message = "Invalid email format";
                throw new Exception("ERR_INVALID_EMAIL");
            }
        }

        /**
         * check email is exist
         * email unique any user just can use 1 email for 1 account
         */
        $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `email_verified_at` IS NOT NULL LIMIT 1");
        if($result->num_rows == 0)
        {
            $message = "The account does not exist or not activated. Enter a different account or get a new account.";
            throw new Exception("ERR_EMAIL_NOT_EXISTS");
            exit();
        }
        else
        {
            // save to varible
            $data = $result->fetch_assoc();
        }

        // Check form password and confirm
        if(empty($password))
        {
            $message = "This field is required.";
            throw new Exception("ERR_PWD_EMPTY");
        }

        //  Check password
        if(password_verify($password,$data['password']))
        {
            // store token for secure login
            // Create Token
            $token  = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
            $token  = str_shuffle($token);
            $token  = substr($token,0,32);

            $mysqli->query("UPDATE users SET remember_token = '$token' WHERE email = '$email'");
            if($mysqli->affected_rows)
            {
                // Redirect to main page with user data
                $_SESSION['user'] = [
                    'name' => $data['name'],
                    'nim' => $data['nim'],
                    'email' => $data['email'],
                    'token' => $token,
                    'login' => true
                ];
                header('location: '.BASE_URL);
            }
            else
            {
                $message = "Login failed. Something went wrong. ERROR[77222] Call admin for this error.";
                throw new Exception("ERR_LOGIN_FAILED");
            }
        }
        else
        {
            $message = "Your account or password is incorrect. If you don't remember your password, reset it now.";
            throw new Exception ("ERR_INVALID_PASSWORD");
        }
    } catch (Exception $e) { 
        errorHandling($e->getMessage(),$message);
    }