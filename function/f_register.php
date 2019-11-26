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

    // if register button did not click
    if(!isset($_POST['signup']))
    {
        // redirect back
        header("location: " . BASE_URL . 'page/auth/register.php');
        exit(); // Stop code
    }

    // Get all data request form register.php
    $name  = $mysqli->real_escape_string($_POST['name']);
    $nim  = $mysqli->real_escape_string($_POST['nim']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $confirmPassword = $mysqli->real_escape_string($_POST['confirmPassword']);

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
            "name" => $name,
            "nim" => $nim,
            "email" => $email
        ];
        
        // create session error
        $_SESSION['data'] = $request;
        $_SESSION['error'] = [ "errorCode" => $errCode, "message" => $message ];
        
        return header('location:' . BASE_URL . '/page/auth/register.php');
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
                $message = "This field can only be filled with the alphabet excluding numbers or characters.";
                throw new Exception("ERR_INVALID_NAME");
            }
        }

        // Check form NIM
        if(empty($nim))
        {
            $message = "The nim field is required.";
            throw new Exception("ERR_EMPTY_NIM");
        }
        else
        {
            if(!preg_match("/^[0-9]*$/",$nim))
            {
                $message = "This field only number.";
                throw new Exception("ERR_INVALID_NIM");
            }
        }

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
            else
            {
                /**
                 * check email is not exist
                 * email unique any user just can use 1 email for 1 account
                 */
                $result = $mysqli->query("SELECT `email` FROM `users` WHERE `email` = '$email' LIMIT 1");
                if($result->num_rows == 1)
                {
                    $message = "Email already exists. if you have account before you can login";
                    throw new Exception("ERR_EMAIL_EXISTS");
                }
            }
        }

        // Check form password and confirm
        if(empty($password) || empty($confirmPassword))
        {
            $message = "This field is required.";
            throw new Exception("ERR_PWD_EMPTY");
        }
        else
        {
            // check password min length 8 and inlcude string,number,character
            if(strlen($password) < 8)
            {
                $message = "Password min 8 length and with Number and character";
                throw new Exception("WARNING_PASSWORD_LIMIT");
            }
            // Check password and confirm is match
            if($password != $confirmPassword)
            {
                $message = "Your typing password is not match";
                throw new Exception("ERR_PASSWORD_MISMATCH");
            }
        }
    } catch (Exception $e) {
        
        errorHandling($e->getMessage(),$message);
    }

    /**
     * this new line for :
     * 
     * --> create token for secure login system
     * 
     * --> create password hash
     * 
     * --> Store data to database
     * 
     * --> sent email to user for confirm their account
     */
    
    // Create Token
    $token  = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
    $token  = str_shuffle($token);
    $token  = substr($token,0,32);
    
    // Hash password
    $pwd = password_hash($password,PASSWORD_DEFAULT);
    
    // Store to database
    $query = "INSERT INTO `users` (`name`,`nim`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES(".
    $values .= "'$name', $nim, '$email', '$pwd', '$token', NOW(), NOW())";

    if($mysqli->query($query))
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
        $link = BASE_URL."page/verify-account.php?email=$email&token=&$token";
        // Link for AccountVerify
        $mail->isHTML(true);
        $mail->Subject = "Email confirmation for activated your account";

        /*
        | this function for render email
        | cz if use file_get_contents, system can't parsing data
        | to mail.php
        */
        function render_mail($name, $mail, $links)
        {
            ob_start();
            include "../page/mail.php";
            return ob_get_contents();
        }

        $mail->Body = render_mail($name, $email, $link);

        // Check is mail sent
        if($mail->Send())
        {
            $_SESSION['success'] = [
                'status' => 'success',
                'message' => 'You have successfully created your account. Please check your email for confirmation.'
            ];
            header("location:". BASE_URL .'/page/auth/register.php');
        }
        else
        {
            // Error code
            // [77001] Account has create but error when sent email
            $_SESSION['failed'] = [
                'status' => 'failed',
                'message' => 'Something went wrong. your account has ben create, but have error. Call admin and show this error code [77001]'
            ];
            header("location:". BASE_URL .'/page/auth/register.php');
        }
    }
    else
    {
        echo "failed " . $mysqli->error;
    }