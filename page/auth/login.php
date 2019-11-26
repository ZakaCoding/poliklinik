<?php 
    include_once('../../config/config.php'); 
    session_start();
    // get error data if any
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : NULL;
    $invalid_email = '';
    $invalid_password = '';
    $loginFailed = '';

    if($error != NULL)
    {
        // has error on form input
        $message = $error['message'];
        switch ($error['errorCode']) {
            case 'ERR_EMPTY_EMAIL':
                # code...
                $invalid_email = 'is-invalid';
                break;
            case 'ERR_EMAIL_NOT_EXISTS':
                # code...
                $invalid_email = 'is-invalid';
                break;
            case 'ERR_EMPTY_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_INVALID_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_LOGIN_FAILED':
                # code...
                $loginFailed = 'is-invalid';
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
                                Login to your account
                            </h3><br>
                        </div>
                        <form class="form-login" action="<?= BASE_URL ?>function/f_login.php" id="register-form" method="post">
                            <div class="form-group">
                                <label for="emailInput">Email address</label>
                                <input type="email" id="emailInput" class="form-control <?= $invalid_email; ?>"  name="email" aria-describedby="emailHelp" placeholder="e.g john@mail.com" value="<?= $_SESSION['data']['email']; ?>">
                                <div class="invalid-feedback">
                                    <?= $message; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwdInput">Password</label>
                                <input type="password" id="pwdInput" class="form-control <?= $invalid_password; ?>" name="password" aria-describedby="passwordlHelp" placeholder="Create a password" required>
                                <div class="invalid-feedback">
                                    <?= $message; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block" name="sign" id="button">Sign</button>
                                <?php
                                    if($loginFailed == 'is-invalid'):
                                ?>
                                    <div class="p-2"></div>
                                    <div class="alert alert-warning alert-dismissible fade show animated shake" role="alert">
                                        <strong>Hmmm :(</strong><?= $message; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <small class="form-text text-muted text-center">Already have an account ? <a href="<?= BASE_URL . 'page/auth/register.php' ?>">Sign up</a></small>
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