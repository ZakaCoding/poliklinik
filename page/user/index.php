<?php 
    include_once("../../config/config.php");
    session_start();
    // check user has login or nah
    if(isset($_SESSION['user']))
    {   
        // First check status is login on session data
        if($_SESSION['user']['login']) //if true
        {
            // Then check all data session is match
            // die($_SESSION['user']['email']);
            $query = $mysqli->query("SELECT * FROM `users` WHERE remember_token = '". $_SESSION['user']['token'] ."' LIMIT 1");
            if($query->num_rows == 0)
            {
                // Remove session login
                unset($_SESSION['user']);
                session_destroy();
                // Redirect to login page
                header("location: ".BASE_URL.'page/auth/login.php');
                exit(1);
            }
        }
        else
        {
            // Redirect to login page
            // die("this 2");
            header("location: ".BASE_URL.'page/auth/login.php');
            exit(1);
        }
    }
    else
    {
        // Redirect to login page
        // die("This 3");
        header("location: ".BASE_URL.'page/auth/login.php');
        exit(1);
    }
    
    // Data disini bray >>
    // get data from database
    $user = $mysqli->query("SELECT * FROM users WHERE remember_token = '". $_SESSION['user']['token'] . "'");
    if($user->num_rows > 0)
    {
        // Fetch to array data
        $user = $user->fetch_assoc();
        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
    }
    /**
     * System Error handling
     */
    // get error data if any
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : NULL;
    // die(var_dump($error));
    $invalid_name = '';
    $invalid_current = '';
    $invalid_password = '';
    $invalid_repass = '';
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
            case 'ERR_EMPTY_CURR':
                # code...
                $invalid_current = 'is-invalid';
                break;
            case 'ERR_EMPTY_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_EMPTY_REPASS':
                # code...
                $invalid_repass = 'is-invalid';
                break;
            case 'WARNING_PASSWORD_LIMIT':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_WRONG_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_INVALID_CURR':
                # code...
                $invalid_current = 'is-invalid';
                break;
            case 'ERR_PASSWORD_MISMATCH':
                # code...
                $invalid_repass = 'is-invalid';
                break;
            default:
                # code...
                break;
        }
    }
    $data = $mysqli->query("SELECT * FROM tbl_reservasi WHERE user_id IN (SELECT user_id FROM users WHERE remember_token = '". $_SESSION['user']['token'] . "')");
    if($data->num_rows > 0)
    {
        // Fetch to array data
        $data = $data->fetch_assoc();
        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
        // For numbering
        $i++;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poliklinik | user</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
    <!-- Vendor css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/node_modules/animate.css/animate.min.css">
    <!-- Sweet alert -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- Sweet alert 2 -->
   <script src="<?= BASE_URL ?>vendor/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
   <style>
    /* Modal Header */
    .modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
    }
    /* Modal Body */
    .modal-body {padding: 2px 16px;}
    /* Modal Footer */
    .modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
    }
    /* Modal Content */
    .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    animation-name: animatetop;
    animation-duration: 0.4s
    }
    /* Add Animation */
    @keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
    }   
   </style>
</head>
<body class="bg-whatever roboto-regular">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?=BASE_URL ?>">Poliklinik</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <?php
                if(isset($_SESSION['user'])) :
                  if($_SESSION['user']['login'] == true):
                ?>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello, <?php $name = explode(' ',$user['name']); echo $name[0]; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Manage Reservation</a>
                    <a class="dropdown-item" href="<?= BASE_URL ?>/function/logout.php">Logout</a>
                    </div>
                </div>

                    <?php endif; ?>
                <?php else: ?>
                    <a class="btn btn-outline-success my-2 my-sm-0 mr-sm-4" href="<?= BASE_URL ?>/page/auth/login.php">Login</a>
                    <a class="text-white" href="<?= BASE_URL ?>/page/auth/register.php">Sign up</a>
                <?php endif; ?>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="container roboto-light text-otherblue">
        <div class="p-4"></div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Edit profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-reservation-tab" data-toggle="pill" href="#pills-reservation" role="tab" aria-controls="pills-reservation" aria-selected="false">Manage reservation</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- Error Handling php -->
                <h2 class="roboto-regular p-2">Edit Profile</h2>
                <div class="row p-4">
                    <div class="col bg-white border-rounded-md p-3">
                        <h4 class="form-title">Update Your Name or Email</h4>
                        <hr>
                        <!-- spacer -->
                        <div class="p-2"></div>
                        <form action="<?= BASE_URL ?>function/f_update.php" method="post">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-softblue <?= $invalid_name ?>" name="name" id="inputName" value="<?= $user['name'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $message; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- spacer -->
                            <div class="p-2"></div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control border-softblue" aria-describedby="emailHelp" name="email" id="inputEmail" value="<?= $user['email'] ?>">
                                    <small id="emailHelp" class="form-text text-muted">    
                                        * Change with your active email and dont forget for verification.
                                    </small>

                                    <!-- Alert if user has change their email -->
                                    <?php
                                        if($_SESSION['user']['email'] != $user['email']) :
                                    ?>
                                        <div class="p-1"></div>
                                        <div class="alert alert-primary">
                                            Your email has change. Please confirm your email so you can login again.
                                        </div>
                                    <?php
                                        endif;
                                    ?>

                                </div>
                            </div>                    
                            <!-- spacer -->
                            <div class="p-2"></div>
                            <div class="clearfix">
                                <button type="submit" class="btn btn-outline-success float-right">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="p-2"></div>
                    <div class="col bg-white border-rounded-md  p-3">
                        <h4 class="form-title">Manage Your Social Login</h4>
                        <hr>
                        <!-- spacer -->
                        <div class="p-2"></div>
                        <p>Enable or disable login to User page from your social login.</p>
                        <div class="p-2"></div>
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="media">
                                    <img src="<?= BASE_URL ?>asset/img/google.png" class="mr-3 logo-small" alt="...">
                                    <div class="media-body p-1 align-middle">
                                        Connect Google Account
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="" class="btn btn-outline-primary">Connect</a>
                            </div>
                        </div>
                        <div class="p-2"></div>
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="media">
                                    <img src="<?= BASE_URL ?>asset/img/facebook.png" class="mr-3 logo-small" alt="...">
                                    <div class="media-body p-1 align-middle">
                                        Connect Facebook Account
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="" class="btn btn-outline-primary">Connect</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 p-2"></div>
                    <div class="col bg-white border-rounded-md  p-3">
                        <h4 class="form-title">Update Your Password</h4>
                        <hr>
                        <!-- spacer -->
                        <div class="p-2"></div>
                        <form action="<?= BASE_URL ?>function/f_update2.php" method="post">
                            <div class="form-group row">
                                <label for="inputCurr" class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control border-softblue <?= $invalid_current ?>" name="currpass" id="inputCurr">
                                    <div class="invalid-feedback">
                                        <?= $message; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- spacer -->
                            <div class="p-2"></div>
                            <div class="form-group row">
                                <label for="pwdInput" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control border-softblue <?= $invalid_password ?>" aria-describedby="passwordlHelp" name="password" id="pwdInput">
                                    <div class="invalid-feedback">
                                        <?= $message; ?>
                                    </div>
                                    <small id="passwordlHelp" class="form-text text-muted">
                                    Make sure it's <span id="min-length">at least 8 characters</span>
                                    <span id="validate-number"> including a number</span> and a <span id="lowcase">lowercase letter.</span>
                                    </small>
                                </div>
                            </div>
                            <!-- spacer -->
                            <div class="p-2"></div>
                            <div class="form-group row">
                                <label for="pwdConfirm" class="col-sm-2 col-form-label">Retype New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control border-softblue <?= $invalid_repass ?>" id="pwdConfirm" name="password2">
                                    <div class="invalid-feedback">
                                        <?= empty($message) ? "Your confirm password do not match" : $message; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- spacer -->
                            <div class="p-2"></div>
                            <div class="clearfix">
                                <button id="button" type="submit" class="btn btn-outline-success float-right">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="p-2"></div>
                    <div class="col bg-white border-rounded-md  p-3">Column</div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-reservation" role="tabpanel" aria-labelledby="pills-reservation-tab">
                <h2 class="roboto-regular p-2">Manage Reservation</h2>
                <div class="row p-4">
                <?php include_once '_list_reserve.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="container p-4">Copyright &copy; 2019 Poliklinik UM</footer>

    <!-- Flash message succes or failed when update data -->
    <?php
        if(isset($_SESSION['flashMessage'])) :
            if($_SESSION['flashMessage']['status'] == 'Success'):
    ?>
                <!-- Alert -->
                <div class="container flash-message">
                    <div class="alert alert-success alert-dismissible fade show animated bounceInDown" role="alert">
                        <strong><?= $_SESSION['flashMessage']['status'] ?></strong> <?= $_SESSION['flashMessage']['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
    <?php
            elseif($_SESSION['flashMessage']['status'] == 'Failed'):
    ?>
                <!-- Alert -->
                <div class="container flash-message">
                    <div class="alert alert-danger alert-dismissible fade show animated bounceInDown" role="alert">
                        <strong><?= $_SESSION['flashMessage']['status'] ?></strong> <?= $_SESSION['flashMessage']['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
    <?php
            endif;
        endif;
    ?>

   <!-- Javascript Vendor-->
    <script src="<?= BASE_URL ?>vendor/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/js/bootstrap.min.js"></script>
    <!-- Javascript here -->
    <script src="<?= BASE_URL ?>js/register_validation.js"></script>
</body>
</html>
<?php
    // Destroy session flash Message
    unset($_SESSION['flashMessage']);
    unset($_SESSION['error']);
?>