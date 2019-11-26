
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
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
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
              <a class="btn btn-outline-success my-2 my-sm-0 mr-sm-4" href="<?= BASE_URL ?>/page/auth/login.php">Login</a>
              <a class="text-white" href="<?= BASE_URL ?>/page/auth/register.php">Sign up</a>
            </form>
          </div>
      </div>
    </nav>
  </header>

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
  height: auto" alt="">
      </div>
      <div class="carousel-item">
        <img src="asset/img/img2.jpg" style="width: 100%;
  height: auto" alt="">
      </div>
      <div class="carousel-item">
        <img src="asset/img/img3.jpg" style="width: 100%;
  height: auto" alt="">
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

  <div class="container" style="position: relative; bottom: 80px; padding-right: 5%; padding-left: 5%; background-color: white">
    <div class="bg-primary text-white text-center" style="border-radius: 5px">
      <div class="row" style="background-color: white; color: black">
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-seedling mb-4"></i>
            <h3 class="h4 mb-2">Clean</h3>
            <p class="text-muted mb-0">Selalu berupaya menciptakan lingkungan yang bersih agar terhindar dari berbagai penyakit.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-briefcase-medical mb-4"></i>
            <h3 class="h4 mb-2">Healthy</h3>
            <p class="text-muted mb-0">Kesehatan warga UM menjadi fokus utama, baik kesehatan fisik maupun psikis.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart mb-4"></i>
            <h3 class="h4 mb-2">Love</h3>
            <p class="text-muted mb-0">Selalu berupaya memberikan pelayanan yang terbaik dengan sepenuh hati dan cinta.</p>
          </div>
        </div>
      </div>
    </div>
 
    <br><br><br><br>

    <!-- Project Two Row -->

      <div class="row justify-content-center">
        <div class="col-lg-6">
          <img class="img-fluid" src="asset/img/img1.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-black">People's Talk</h4>
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
          <p>- Dalai Lama -</p>
        </div>
      </div>

      <br><br><br><br>

      <!-- Project One Row -->
      <div class="row justify-content-center mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="asset/img/img1.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-black">The Doctor</h4>
                <p class="mb-0 text-black-50">"Kami selalu berupaya dalam memberikan pelayanan terbaik bagi masyarakat, baik dalam pemeriksaan maupun perawatan. Sejak lama, kesehatan masyarakat menjadi tujuan utama kami. Karena seperti kata pepatah, 'Mens sana in corpore sano.'"</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    </section>

    <!-- Signup Section -->
  <section class="signup-section">
    <div class="container" style="padding-left: 5%">
      <div class="row">

          <div class="col-lg-6 order-lg-first">
          <div class="text-center h-100">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-black">About Poliklinik UM</h4>
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
        <div class=" text-center">
          <h3>Register Now</h3>
          <p>Daftar terlebih dahulu untuk mendapatkan kartu anggota dan melakukan reservasi secara online!</p>
          <button class="btn" style="background-color: black; color: white">Register</button>
        </div>
      </div>

      <br><br><br>

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