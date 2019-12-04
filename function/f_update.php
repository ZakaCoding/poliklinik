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
        // Create Token
        $token  = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
        $token  = str_shuffle($token);
        $token  = substr($token,0,32);
        $mysqli->query("UPDATE users SET `name` = '$name', `email` = '$email', `email_verified_at` = NULL, `remember_token` = '$token', `updated_at` = NOW() WHERE nim =". $user['nim']);
    }
    else
    {
        $mysqli->query("UPDATE users SET `name` = '$name', `email` = '$email', `updated_at` = NOW() WHERE nim =". $user['nim']);
    }

    if($mysqli->affected_rows > 0)
    {

        /*  This code for send email verification
        *   Email verification use PHPMailer, it's open source code form Developer
        *   With GPL License.
        */

        // Make object from PHPMailer
        $mail = new PHPMailer(true);

        // Server Setting for send mail
        $mail->isSMTP(true);
        $mail->SMTPDebug = 1;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'toor.env@gmail.com';
        $mail->Password = 'kze-j8sgg-7cd81f88';
        // Password is secret. dont tell anybody ONLY DEVELOPER to use
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Receipments
        $mail->setFrom('donot-reply@poliklinik.um.ac.id', 'Developer');
        $mail->addAddress($email,$usrname);

        // Content sent
        $link = BASE_URL."page/verify-account.php?email=$email&token=$token";
        // Link for AccountVerify
        $mail->isHTML(true);
        $mail->Subject = "Confirm Email change from your account";

        /*
        | this function for render email
        | cz if use file_get_contents, system can't parsing data
        | to mail.php
        */
        function render_mail($name, $mail, $links)
        {
            ob_start();
            include "../page/mail_account_change.php";
            return ob_get_contents();
        }

        $mail->Body = render_mail($name, $email, $link);
        if($mail->Send())        
        {
            // Redirect with success
            $_SESSION['flashMessage'] = [
                'status' => "Success",
                'message' => "Your data has been change."
            ];
            header('location: '.BASE_URL.'page/user');
        }
        else
        {
            die("Do something");
        }
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