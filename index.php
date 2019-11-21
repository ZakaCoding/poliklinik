
<?php include_once('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poliklinik UM Hello</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <style type="text/css">
       .signup-section
 {
  padding:10rem 0;
  background:
  -webkit-gradient(linear,left top,left bottom,from(rgba(22,22,22,.1)),
    color-stop(75%,rgba(22,22,22,.5)),
    to(#fff)),
  url(img/img1.jpg);
  background:linear-gradient(to left,rgba(22,22,22,0) 0,
    rgba(22,22,22,.5) 10%,#fff 77%),
  url(img/img1.jpg);
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
      <a class="navbar-brand" href="#">Poliklinik</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
            <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-4" type="submit">Login</button>
          </form>
        </div>
    </nav>
  </header>

  <div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators" style="padding-bottom: 200px">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/img1.jpg" alt="">
      </div>
      <div class="carousel-item">
        <img src="img/img2.jpg" alt="">
      </div>
      <div class="carousel-item">
        <img src="img/img3.jpg" alt="">
      </div>
    </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev" style="padding-bottom: 10%">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#demo" role="button" data-slide="next" style="padding-bottom: 10%">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>

  <div class="container" style="position: relative; bottom: 200px; padding-right: 5%; padding-left: 5%">
    <div class="bg-primary text-white text-center" style="border-radius: 5px">
      <br/>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <h4>Contoh container</h4>
      <br/>
    </div>
 
    <br><br><br><br>

    <!-- Project Two Row -->

      <div class="row justify-content-center">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/img1.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-black">Mountains</h4>
                <p class="mb-0 text-black-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <br><br><br>

      <div class="container" style="width: 50%">
        <div class=" text-center">
          <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
        </div>
      </div>

      <br><br><br><br>

      <!-- Project One Row -->
      <div class="row justify-content-center mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/img1.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-black">Misty</h4>
                <p class="mb-0 text-black-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
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
                <h4 class="text-black">Mountains</h4>
                <p class="mb-0 text-black-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
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
          <h3>Sign up today</h3>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <button class="btn btn-success">Get Started</button>
        </div>
      </div>

      <br><br><br>

      <!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
        <p>
          <a href="#!">MDBootstrap</a>
        </p>
        <p>
          <a href="#!">MDWordPress</a>
        </p>
        <p>
          <a href="#!">BrandFlow</a>
        </p>
        <p>
          <a href="#!">Bootstrap Angular</a>
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!">Shipping Rates</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">© 2018 Copyright:
          <a href="https://mdbootstrap.com/education/bootstrap/">
            <strong> MDBootstrap.com</strong>
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
    <script src="vendor/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="vendor/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="vendor/js/bootstrap.min.js"></script>
</body>
</html>