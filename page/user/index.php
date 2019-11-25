<?php 
    include_once("../../config/config.php");
    
    $password=$mysqli->$query"SELECT password FROM users WHERE nim = ?";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body class="bg-whatever roboto-regular">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="container roboto-light text-otherblue">
        <div class="row p-4">
            <div class="col bg-white border-rounded-md  p-3">
                <h4 class="form-title">Update Your Name or Email</h4>
                <hr>
                <!-- spacer -->
                <div class="p-2"></div>
                <form action="<?= BASE_URL ?>function/f_update.php" method="post">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control border-softblue" name="name" id="inputName">
                        </div>
                    </div>
                    <!-- spacer -->
                    <div class="p-2"></div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control border-softblue" aria-describedby="emailHelp" name="email" id="inputEmail">
                            <small id="emailHelp" class="form-text text-muted">    
                            * Change with your active email and dont forget to verification.
                            </small>
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
                        <label for="inputCurrent" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control border-softblue" name="currentPassword" id="inputCurrent" value="<?=$password?>" readonly disabled>
                        </div>
                    </div>
                    <!-- spacer -->
                    <div class="p-2"></div>
                    <div class="form-group row">
                        <label for="inputNew" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control border-softblue" aria-describedby="passwordlHelp" name="password" id="inputNew">
                            <small id="passwordHelp" class="form-text text-muted">    
                                * Make sure it's at least 8 characters including a number and a lowercase letter.
                            </small>
                        </div>
                    </div>
                    <!-- spacer -->
                    <div class="p-2"></div>
                    <div class="form-group row">
                        <label for="inputConfirm" class="col-sm-2 col-form-label">Retype New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control border-softblue" name="confirmPassword" id="inputConfirm" name="password2">
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
            <div class="col bg-white border-rounded-md  p-3">Column</div>
        </div>
    </div>


   <!-- Javascript -->
    <script src="<?= BASE_URL ?>vendor/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/js/bootstrap.min.js"></script>
</body>
</html>