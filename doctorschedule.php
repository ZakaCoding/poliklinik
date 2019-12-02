
<?php include_once('config/config.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poliklinik UM</title>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link href="asset/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
      i {
        color: black
      }

       .signup-section
 {
  padding:10rem 0;
  background:
  -webkit-gradient(linear,left top,left bottom,from(rgba(22,22,22,.1)),
    color-stop(75%,rgba(22,22,22,.5)),
    to(#fff)),
  url(asset/img/img1.jpg);
  background:linear-gradient(to left,rgba(22,22,22,.1) 0,
    rgba(22,22,22,.5) 10%,#fff 55%),
  url(asset/img/img1.jpg);
  background-position:center;
  background-repeat:no-repeat;
  background-attachment:scroll;
  background-size:cover
 }
    </style>
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Poliklinik</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Services</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Reservation</a>
                  <a class="dropdown-item" href="#">Riwayat</a>
                  <a class="dropdown-item" href="#">Information</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li> -->
            </ul>
            <form class="form-inline mt-2 mt-md-0">
              <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
              <!-- Check user has login -->
              <?php
                if(isset($_SESSION['user'])) :
                  if($_SESSION['user']['login'] == true):
              ?>
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hello, <?= $_SESSION['user']['name'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= BASE_URL ?>page/user">Profile</a>
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
  </header>

<section style="padding-top: 80px">
  <center>
  <div class="container">
      <h3>Jadwal Dokter Poliklinik</h3>
      <br><br>
    <div class="row col-md-10" style="text-align: left">
        <div class="col-md-2">
          <img src="asset\img\google.png" style="width: 70%">
        </div>
        <div class="col-md-8">
          <h2>Rizkiiiiiii</h2>
          <hr>
          <p>Poli Umum</p>
        </div>
    </div>
        <div class="col-md-10">
          <table class="table table-bordered table-striped">
    <thead>
      <tr><th>Hari</th><th>Jam</th></tr>
    </thead>
    <tbody>
      <tr><td>Senin</td><td>08.00</td></tr>
    </tbody>
  </table>
        </div>
    </div>
  </div>
</center>
</section>

      <!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4 bg-dark">

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
          <a href="#!">Services</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
        
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">links</h6>
        <p>
          <a href="#!">Register</a>
        </p>
        <p>
          <a href="#!">Login</a>
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
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr style="background-color: grey">

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
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
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
<!-- Footer -->

    <!-- Javascript HERE -->
    
    <!-- Jquery -->
    <script src="<?= BASE_URL ?>vendor/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="<?= BASE_URL ?>vendor/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= BASE_URL ?>vendor/js/bootstrap.min.js"></script>
</body>
</html>