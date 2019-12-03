
<?php include_once('config/config.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poliklinik UM - Home</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">

    <!-- main css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">

    <!-- Font Awesome Icons -->
    <link href="asset/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        i 
        {
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

        .btn-poli
        {
            background-color: #00ACDF;
            border-color: white;
            border-radius: 18px;
            color: white;
            border-width: 2px;
        }

        .btn-poli:hover
        {
            background-color: white;
            border-color: #00ACDF;
            color: #00ACDF;
        }

        .poli-icon i
        {
            display: inline-block;
            height: 25vh;
            width: 25vh;
            color: #fff;
            border-radius: 100%;
            text-align: center;
            font-size: 11vh;
            line-height: 25vh;
            margin-right: 3.5%;
            margin-left: 3.5%;
            background-color: #00ACDF;
        }

        .text-poli
        {
            color: #00ACDF;
        }

        .nav-poli : hover
        {
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #00ACDF; color: white">
            <div class="container-fluid" style="background-color: #00ACDF">
                <a class="navbar-brand" href="#">Poliklinik UM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto" style="background-color: #00ACDF">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">Services</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Reservation</a>
                                <a class="dropdown-item" href="#">Riwayat</a>
                                <a class="dropdown-item" href="#">Information</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Help</a>
                        </li>
                    </ul>
                    <form class="form-inline mt-2 mt-md-0">
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
                        <a class="btn btn-poli my-2 my-sm-0 mr-sm-4" href="<?= BASE_URL ?>/page/auth/login.php" style="width: 80px">Login</a>
                        <a class="text-white" href="<?= BASE_URL ?>/page/auth/register.php">Sign up</a>
                    <?php endif; ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators" style="padding-bottom: 80px">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/img/img1.jpg" style="width: 100%;
                    height: auto; filter: brightness(65%)" alt="">
                <div class="carousel-caption" style="bottom: 200px">
                    <h1>Selamat Datang</h1>
                    <p>Di Website Poliklinik Universitas Negeri Malang</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/img/img2.jpg" style="width: 100%;
                    height: auto; filter: brightness(75%)" alt="">
                <div class="carousel-caption" style="bottom: 200px">
                    <h1>Selamat Datang</h1>
                    <p>Di Website Poliklinik Universitas Negeri Malang</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/img/img3.jpg" style="width: 100%;
                    height: auto; filter: brightness(75%)" alt="">
                <div class="carousel-caption" style="bottom: 200px">
                    <h1>Selamat Datang</h1>
                    <p>Di Website Poliklinik Universitas Negeri Malang</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev" style="padding-bottom: 5%">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#demo" role="button" data-slide="next" style="padding-bottom: 5%">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>

    <!-- if user has login speciality is hidden -->
    <?php
    if(isset($_SESSION['user'])) :
        if($_SESSION['user']['login']) :
    endif;
    ?>

    <!-- This menu widget if user has login, user can reservation -->
    <div class="container">
        <div class="card widget-reservation">
            <!-- Header of widget -->
            <div class="card-header text-otherblue bg-whatever">
                <div class="clearfix">
                    <div class="float-left">
                        <h5 class="roboto-light">Hey, Kamu!</h5>
                        <h3 class="roboto-bold">Mau Checkup ?</h3>
                    </div>
                    <div class="float-right align-middle">
                        <h6 class="roboto-light">Sisa antrian hari ini&nbsp;<i class="fas fa-question-circle text-success"></i></h6>
                        <div class="roboto-bold number">
                            <?php
                                // get data from database
                                $sql = $mysqli->query("SELECT * FROM `queue`");
                                $data = $sql->fetch_assoc() ;
                                echo $data['queue'];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content here -->
            <div class="card-body p-4">
                <form action="<?= BASE_URL ?>function/f_generate_reservation.php" method="post">
                    <div class="form-group">
                        <label for="complaintInput" class="text-otherblue card-title"><i class="fas fa-user-md text-pink"></i>&nbsp;Masukan keluhannmu</label>
                        <textarea class="form-control border-softblue border-rounded-md" name="complaint" style="height:80px; max-height:120px;" id="complaintInput" aria-describedby="complainHelp"></textarea>
                        <small id="complainHelp" class="form-text text-muted text-softblue">* Masukan keluhannmu supaya dokter bisa memahami gejala penyakit kamu.</small>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDate">Tanggal check up</label>
                            <input type="date" class="form-control border-softblue dateselect" name="date" required="required" id="inputDate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPoli"><span class="text-danger">*</span>Poli</label>
                            <select id="inputPoli" class="form-control border-softblue" name="poliCategory" required>
                                <option selected>Choose...</option>
                                <option>Poli Umum</option>
                                <option>Poli Gigi</option>
                                <option>Poli Ibu dan Anak</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Jenis pengunjung</label>
                            <input type="text" class="form-control border-softblue" name="typeUser" id="inputZip">
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="float-right">
                            <button type="submit" name="reserve" class="btn btn-success">Checkup now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END menu widget -->

    <?php
    else:
    ?>
    <div class="container" style="position: relative; bottom: 80px; padding-right: 5%; padding-left: 5%; background-color: white; border-radius: 5px; box-shadow : 0 10px 20px 0 #00ACDF;">
        <div class="text-white text-center"><br>
            <h2 style="color: black">Specialty</h2>
            <hr>
            <div class="row" style="color: #00ACDF">
                <div class="col-lg-4 col-md-6 text-center poli-icon">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-stethoscope mb-4"></i>
                        <h3 class="h4 mb-2">Umum</h3>
                        <p class="text-muted mb-0">Hadir untuk menangani berbagai keluhan penyakit dan pemeriksaan kesehatan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center poli-icon">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-tooth mb-4"></i>
                        <h3 class="h4 mb-2">Gigi</h3>
                        <p class="text-muted mb-0">Hadir untuk menangani keluhan seputar gigi dan akan dan pemeriksaan gigi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center poli-icon">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-baby mb-4"></i>
                        <h3 class="h4 mb-2">Ibu dan Anak</h3>
                        <p class="text-muted mb-0">Hadir untuk menangani berbagai keluhan dari ibu dan anak dengan sepenuh hati.</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <?php
    endif;
    ?>
 
    <br><br><br><br>

    <!-- Project Two Row -->
    <div class="container" style="position: relative; bottom: 80px; padding-right: 5%; padding-left: 5%; background-color: white">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <img class="img-fluid" src="asset/img/people.jpg" alt="">
            </div>
            <div class="col-lg-6 order-lg-first">
                <div class="text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-poli">People's Talk</h4>
                            <p class="mb-0 text-black-50">Pelayanan sangat baik dan cepat. Tempatnya juga bersih. Tidak ada biaya bagi warga UM. Namun, harus memiliki kartu anggota terlebih dahulu sebelum berobat. </p>
                            <hr class="d-none d-lg-block mb-0 mr-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br>

        <div class="container" style="width: 50%">
            <div class=" text-center">
                <h2>Happiness is the highest form of health.</h2>
                <p class="text-poli">- Dalai Lama -</p>
            </div>
        </div>

        <br><br><br><br>

        <!-- Project One Row -->
        <div class="row justify-content-center mb-5 mb-lg-0">
            <div class="col-lg-6">
                <img class="img-fluid" src="asset/img/doctor.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-poli">The Doctor</h4>
                            <p class="mb-0 text-black-50">"Kami selalu berupaya dalam memberikan pelayanan terbaik bagi masyarakat, baik dalam pemeriksaan maupun perawatan. Sejak lama, kesehatan masyarakat menjadi tujuan utama kami. Karena seperti kata pepatah, 'Mens sana in corpore sano.'"</p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Section -->
  <section class="signup-section">
    <div class="container" style="padding-left: 5%">
      <div class="row">

          <div class="col-lg-6 order-lg-first">
          <div class="text-center h-100">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-poli">About Poliklinik UM</h4>
                <p class="mb-0 text-black-50">Poliklinik UM merupakan salah satu fasilitas yang ada di Universitas Negeri Malang yang bergerak di bidang kesehatan. Fasilitas ini dapat diakses oleh seluruh warga UM secara gratis tanpa dipungut biaya apapun. Poliklinik dapat ditemukan di sebelah utara Graha Rektorat UM.</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

  <br><br><br>

      <div class="container" style="width: 50%">
        <div class="text-center">
          <h3>Register Now</h3>
          <p>Daftar terlebih dahulu untuk mendapatkan kartu anggota dan melakukan reservasi secara online!</p>
          <button class="btn btn-poli" style="border-color: #00ACDF">Register</button>
        </div>
      </div>

      <br><br><br>

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
<!-- Footer -->

    <!-- Jquery -->
    <script src="<?= BASE_URL ?>vendor/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="<?= BASE_URL ?>vendor/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= BASE_URL ?>vendor/js/bootstrap.min.js"></script>
    
    <!-- Javascript HERE -->
    
</body>
</html>