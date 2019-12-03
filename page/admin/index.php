<?php 
    include_once("../../config/config.php");
    session_start();

    // check user has login or nah
    if(isset($_SESSION['admin']))
    {   
        // First check status is login on session data
        if($_SESSION['admin']['login']) //if true
        {
            // Then check all data session is match
            // die($_SESSION['user']['email']);
            $query = $mysqli->query("SELECT * FROM `admins` WHERE remember_token = '". $_SESSION['admin']['token'] ."' LIMIT 1");
            if($query->num_rows == 0)
            {
                // Remove session login
                unset($_SESSION['admin']);
                session_destroy();
                // Redirect to login page
                header("location: ".BASE_URL.'page/auth/login_admin.php');
                exit(1);
            }
        }
        else
        {
            // Redirect to login page
            // die("this 2");
            header("location: ".BASE_URL.'page/auth/login_admin.php');
            exit(1);
        }
    }
    else
    {
        // Redirect to login page
        // die("This 3");
        header("location: ".BASE_URL.'page/auth/login_admin.php');
        exit(1);
    }
    
    // Data disini bray >>
    // get data from database
    $admin = $mysqli->query("SELECT * FROM admins WHERE remember_token = '". $_SESSION['admin']['token'] . "'");
    if($admin->num_rows > 0)
    {
        // Fetch to array data
        $admin = $admin->fetch_assoc();

        // How to use this data
        // like this example.
        // you want data email then code is
        // $admin['email'] --> output program "zakanoor@outlook.co.id"
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poliklinik | Admin</title>
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
                if(isset($_SESSION['admin'])) :
                  if($_SESSION['admin']['login'] == true):
                ?>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello, <?php $name = explode(' ',$admin['name']); echo $name[0]; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Manage Reservation</a>
                    <a class="dropdown-item" href="<?= BASE_URL ?>function/logout_admin.php">Logout</a>
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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Admin page</h1>
                <p class="lead">This is a admin page, you can manage this web app.</p>
            </div>
        </div>
        <!-- Setting pill nav here -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <!-- <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="false">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-reserve-tab" data-toggle="pill" href="#pills-reserve" role="tab" aria-controls="pills-reserve" aria-selected="false">Manage Reservation</a>
            </li>
        </ul>
        <!-- END here -->
        <div class="tab-content" id="pills-tabContent">
            <!-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Home</div> -->
            <!--
                NOTE* 
                This page useing templating system 
                create all pill page on another file like _list_users.php
                and call on this page
             -->
            <!-- Pills page -->
            <!-- Pill data users -->
            <?php include_once "_profile_edit.php"; ?>
            <?php include_once "_list_users.php"; ?>
            <?php include_once "_reservation.php"; ?>
            <!-- End pills page -->
        </div>
        
    </div>

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