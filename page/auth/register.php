<?php 
    include_once('../../config/config.php'); 
    session_start();
    // get error data if any
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : NULL;
    $invalid_name = '';
    $invalid_nim = '';
    $invalid_email = '';
    $invalid_password = '';
    $invalid_confirmPassword = '';

    if($error != NULL)
    {
        // has error on form input
        $message = $error['message'];
        switch ($error['errorCode']) {
            case 'ERR_EMPTY_NAME':
                # code...
                $invalid_name = 'is-invalid';
                break;
            case 'ERR_INVALID_NAME':
                # code...
                $invalid_name = 'is-invalid';
                break;
            case 'ERR_EMPTY_NIM':
                # code...
                $invalid_nim = 'is-invalid';
                break;
            case 'ERR_EMPTY_EMAIL':
                # code...
                $invalid_email = 'is-invalid';
                break;
            case 'ERR_EMAIL_EXISTS':
                # code...
                $invalid_email = 'is-invalid';
                break;
            case 'ERR_EMPTY_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_EMPTY_CONFIRM':
                # code...
                $invalid_confirmPassword = 'is-invalid';
                break;
            
            default:
                # code...
                break;
        }
    }
                            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register account</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">
    <!-- Vendor css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/node_modules/animate.css/animate.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
</head>
<body class="bg-midblue">
    <div class="container wrapper">
        <!-- Grid row -->
        <div class="row d-flex justify-content-center">
            <!-- Grid column -->
            <div class="col-md-6 align-self-center">
                <div class="clearfix">
                    <h3 class="text-center text-softblack">
                        Student sign up
                    </h3>
                    <p class="text-center">make sure your account is secure.</p>
                    <img src="<?= BASE_URL ?>asset/img/logo-1.png" class="align-center logo" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="clearfix">
                            <h3 class="text-center text-softblack">
                                Create your account
                            </h3><br>
                        </div>
                        <form class="form-login" action="<?= BASE_URL ?>function/f_register.php" id="register-form" method="post">
                            <div class="form-group">
                                <label for="nameInput">Name</label>
                                <input type="text" id="nameInput" class="form-control <?= $invalid_name; ?>" name="name" placeholder="Your name" value="<?= $_SESSION['data']['name']; ?>">
                                <div class="invalid-feedback">
                                <?= $message; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nimInput">NIM</label>
                                <input type="text" id="nimInput" class="form-control <?= $invalid_nim; ?>" name="nim" placeholder="Enter your nim" value="<?= $_SESSION['data']['nim']; ?>">
                                <div class="invalid-feedback">
                                <?= $message; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emailInput">Email address</label>
                                <input type="email" id="emailInput" class="form-control <?= $invalid_email; ?>"  name="email" aria-describedby="emailHelp" placeholder="e.g john@mail.com" value="<?= $_SESSION['data']['email']; ?>">
                                <div class="invalid-feedback">
                                    Email already exists on another account!
                                </div>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="pwdInput">Password</label>
                                <input type="password" id="pwdInput" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[0-9]).{0,}" aria-describedby="passwordlHelp" placeholder="Create a password" required>
                                <small id="passwordlHelp" class="form-text text-muted">
                                Make sure it's <span id="min-length">at least 8 characters</span>
                                <span id="validate-number"> including a number</span> and a <span id="lowcase">lowercase letter.</span>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="pwdConfirm">Confirm password</label>
                                <input type="password" id="pwdConfirm" class="form-control"  name="confirmPassword" placeholder="Confirm a password" required>
                                <div class="invalid-feedback">
                                Your confirm password do not match
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block" name="signup" id="button">Sign up</button>
                                <small class="form-text text-muted">By clicking “Sign up, you agree to our terms of service and privacy statement. We’ll occasionally send you account related emails.</small><br>

                                <!-- Check if was success create account -->
                                <?php
                                    // 
                                    // check session was set
                                    if(isset($_SESSION['success'])) :
                                        
                                ?>
                                <!-- Show allert message success -->
                                <div class="alert alert-success alert-dismissible fade show animated shake" role="alert">
                                    <strong>Well done!&nbsp;</strong><?= $_SESSION['success']['message'] ?>
                                    <hr>
                                    <p class="mb-0">goto <a href="<?= BASE_URL.'page/auth/login.php' ?>">login</a> page</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php elseif(isset($_SESSION['failed'])) : ?>
                                <!-- Show allert message failed -->
                                <div class="alert alert-warning alert-dismissible fade show animated shake" role="alert">
                                    <strong>Oopss&nbsp;</strong><?= $_SESSION['failed']['message'] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php 
                                    endif;
                                ?>


                                <small class="form-text text-muted text-center">Already have an account ? <a href="<?= BASE_URL . 'page/auth/login.php' ?>">Log in</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery -->
    <script src="<?= BASE_URL ?>vendor/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="<?= BASE_URL ?>vendor/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= BASE_URL ?>vendor/js/bootstrap.min.js"></script>

    <!-- Javascript HERE -->
    <script src="<?= BASE_URL ?>js/register_validation.js"></script>
</body>
</html>
<?php 
    // destroy session was set before
    session_unset();
    session_destroy();
?>