<?php 
    include_once('../config/config.php'); 
    session_start();
    
    // Check url 
    $status = '';
    if(!isset($_GET['email']) || !isset($_GET['token']))
    {
        $status = 'notset';
    }

    if(empty($_GET['email']) || empty($_GET['token']))
    {
        $status = 'empty';
    }
    else
    {
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $token = isset($_GET['token']) ? $_GET['token'] : '';
    
        // Check data with database file system
        $query = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `remember_token` = '$token' LIMIT 1");
        if($query->num_rows > 0)
        {   
            $data = $query->fetch_assoc();
            // Update to database
            $update = $mysqli->query("UPDATE users SET email_verified_at = NOW(), remember_token = '' WHERE email = '$email'");
            if($mysqli->affected_rows)
            {
                $status = 'success';
            }
            else
            {
                $status = 'empty';
            }
        }
        else
        {
            $status = 'data not exists';
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email address</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">
    <!-- Vendor css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/node_modules/animate.css/animate.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
</head>
<body>
    <!-- Main here -->
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container"> 
                <a class="navbar-brand" href="#">Poliklinik</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
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
                    <form class="form-inline mt-2 mt-md-0">
                        <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
                        <a class="btn btn-outline-success my-2 my-sm-0 mr-sm-4" href="<?= BASE_URL.'page/auth/register.php' ?>">Register</a>
                        <a href="<?= BASE_URL.'page/auth/login.php' ?>" class="text-white">Login</a>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="p-5"></div>
    <main role="main" class="flex-shrink-0 p-4">
        <div class="container">
            <?php
                // Check url
                if($status == 'notset'):
            ?>
            <div class="card text-center">
                <div class="card-body">
                    <div class="error">
                        <img src="<?= BASE_URL ?>asset/img/error_background.png" class="error-bg" alt=""> <!-- Error Background -->
                        <img src="<?= BASE_URL ?>asset/img/error_character.png" class="error-character" alt=""> <!-- Error Character animation -->
                    </div>
                    <h3 class="card-title p-4">Something went wrong</h3>
                    <p class="card-text">
                        Something unexpected went wrong with this URL: “<a href="<?= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>”"> <?= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>”</a>.<br> The system cannot find the request site.
                    </p>
                    <a href="<?= BASE_URL ?>" class="btn btn-primary">Go main page</a>
                </div>
            </div>
            <?php
                elseif($status == 'empty'):
            ?>
            <div class="card text-center">
                <div class="card-body">
                    <div class="error">
                        <img src="<?= BASE_URL ?>asset/img/error_background.png" class="error-bg" alt=""> <!-- Error Background -->
                        <img src="<?= BASE_URL ?>asset/img/error_character.png" class="error-character" alt=""> <!-- Error Character animation -->
                    </div>
                    <h3 class="card-title p-4">Something went wrong</h3>
                    <p class="card-text">
                        Something unexpected went wrong with this URL: “<a href="<?= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>”"> <?= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>”</a>.<br> The system cannot find the request site.
                    </p>
                    <a href="<?= BASE_URL ?>" class="btn btn-primary">Go main page</a>
                </div>
            </div>
            <?php elseif($status == 'success') : ?>
            <div class="card text-center">
                <div class="card-body">
                    <img src="<?= BASE_URL ?>asset/img/email.png" class="email-icon" alt="">
                    <h3 class="card-title p-4">Email Confirmation</h3>
                    <p class="card-text">
                        Thanks for registering an account! You're coolest person
                        in all the world (and i've met a lot of really cool people).
                        <br> Finally yay! Your account active now
                    </p>
                    <a href="<?= BASE_URL ?>" class="btn btn-primary">Go login page</a>
                </div>
            </div>
            <?php elseif($status == 'data not exists') : ?>
            <div class="card text-center">
                <div class="card-body">
                    <div class="error">
                        <img src="<?= BASE_URL ?>asset/img/error_background.png" class="error-bg" alt=""> <!-- Error Background -->
                        <img src="<?= BASE_URL ?>asset/img/error_character.png" class="error-character" alt=""> <!-- Error Character animation -->
                    </div>
                    <h3 class="card-title p-4">Something went wrong</h3>
                    <p class="card-text">
                        Something unexpected went wrong with this email <strong><?= $_GET['email'] ?></strong>.<br> The system cannot find the data.
                    </p>
                    <a href="<?= BASE_URL ?>" class="btn btn-primary">Go main page</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <hr>
            <p class="text-center">Copyright &copy; 2019 Poliklinik UM. All Right reserved by Develeoper ZakaCoding, Rizki Nisa, Setya, Oktarian</p>
        </div>
    </footer>


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