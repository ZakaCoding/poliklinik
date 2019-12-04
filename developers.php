<?php include_once 'config/config.php'; ?>
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
                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
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
    <div class="container">
        <div class="text-center p-4">
            <h1 class="roboto-regular font-32">Well Done, <br>Developers</h1>
            <h5 class="roboto-light text-muted">Introduce this is the developer of all this, say hi to them</h5>
        </div>
        <div class="p-4"></div>
        <div class="row">
            <div class="col col-md-3">
                <div class="card" style="max-width: 18rem;">
                    <img src="asset/img/aing.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Zaka Noor &mdash;<br> <small>Head of Programmer</small></h5>
                        <small>CURRENTLY WORKING ON</small>
                        <div class="p-1"></div>
                        <p class="card-text">Backend and Frontend devloper. Manage All team, The chief programmer plays a major role
<!--                          
                         in being a barrier for his teammates in terms of infrastructure negotiations and project schedules. 
                         Also to limit features that should not be done in the specified timeline. -->
                         </p>
                    </div>
                </div>
            </div>
            <!-- <div class="p-2"></div> -->
            <div class="col col-md-3">
                <div class="card" style="max-width: 18rem;">
                    <img src="asset/img/dude.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Setya Rahadi &mdash;<br> <small>System Analyst</small></h5>
                        <small>CURRENTLY WORKING ON</small>
                        <div class="p-1"></div>
                        <p class="card-text">Page user, create CRUD sistem. System Analyst has a big role in making it easy for programmers not to do their own analysis.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="p-2"></div> -->
            <div class="col col-md-3">
                <div class="card" style="max-width: 18rem;">
                    <img src="asset/img/nisa.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Rizki Nisa &mdash;<br> <small>UI/UX Designer</small></h5>
                        <small>CURRENTLY WORKING ON</small>
                        <div class="p-1"></div>
                        <p class="card-text">Landing page, Create UI/UX. UX Designer plays a role in how to make users feel comfortable and comfortable using the application. But the main thing is how to make the user can solve their needs when using the application.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="p-2"></div> -->
            <div class="col col-md-3">
                <div class="card" style="max-width: 18rem;">
                    <img src="asset/img/okta.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Oktarian &mdash;<br> <small>Frontend Designer</small> </h5>
                        <small>CURRENTLY WORKING ON</small>
                        <div class="p-1"></div>
                        <p class="card-text">Admin page, Usually the frontend designer will work on the design in the form of HTML / CSS / Javascript which contains the effects of jQuery and has created a web display with CSS decoration.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4"></div>
    </div>

    <!-- sub main -->
    <div class="sub-main bg-white"></div>
    <div class="container">
        <hr>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small mdb-color pt-4" style="background-color: #00ACDF">

    <!-- Footer Links -->
    <div class="container text-center text-md-left text-white">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Poliklinik UM</h6>
            <p>Poliklinik UM merupakan salah satu fasilitas yang ada di Universitas Negeri Malang yang bergerak di bidang kesehatan.</p>
        </div>
        <!-- Grid column -->

        <hr class="w-100 clearfix d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Facility</h6>
            <p>
            <a href="#!" class="text-white">Services</a>
            </p>
            <p>
            <a href="#!" class="text-white">Help</a>
            </p>
            
        </div>
        <!-- Grid column -->

        <hr class="w-100 clearfix d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">links</h6>
            <p>
            <a href="#!" class="text-white">Register</a>
            </p>
            <p>
            <a href="#!" class="text-white">Login</a>
            </p>
            
        </div>

        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p>
            <i class="fas fa-home mr-3"></i> Jl. Semarang 5, Malang</p>
            <p>
            <i class="fas fa-envelope mr-3"></i> poliklinik@um.ac.id</p>
            <p>
            <i class="fas fa-phone mr-3"></i> (0341) 551312</p>
            
        </div>
        <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr style="background-color: black">

        <!-- Grid row -->
        <div class="row d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-7 col-lg-8">

            <!--Copyright-->
            <p class="text-center text-md-left">© 2019 Copyright:
            <a>
                <strong> Poliklinik UM</strong>
            </a>
            </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-5 col-lg-4 ml-lg-0">

            <!-- Social buttons -->
            <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="#">
                    <i class="fab fa-google-plus-g"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="#">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                </li>
            </ul>
            </div>

        </div>
        <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    </footer>

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