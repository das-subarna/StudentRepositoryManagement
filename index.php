<?php
session_start();
error_reporting(0);
// admin
include 'includes/config.php';
if ($_SESSION['alogin'] != '') {
    $_SESSION['alogin'] = '';
}
// student
if ($_SESSION['slogin'] != '') {
  $_SESSION['slogin'] = '';
}
//admin

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $p = "hello";
    $password = md5($_POST['password']); //md5 encryption
    //echo "<script>console.log('password: " . $password . "' );</script>";
    $sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Admin Login Details!');</script>";
    }
}
//student
if (isset($_POST['slogin'])) {
  $suname = $_POST['susername'];
  $spassword = md5($_POST['spassword']); //md5 encryption
  $sql = "SELECT RollId,password FROM student WHERE RollId=:suname and password=:spassword";
  $query = $dbh->prepare($sql);
  $query->bindParam(':suname', $suname, PDO::PARAM_STR);
  $query->bindParam(':spassword', $spassword, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
      $_SESSION['slogin'] = $_POST['susername'];
      echo "<script type='text/javascript'> document.location = 'Sdashboard.php'; </script>";
  } else {
      echo "<script>alert('Invalid Student Login Details!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Team Future SDMP | Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Title Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> <!-- apple devices -->
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@teamfuture.in">contact@teamfuture.in</a>
        <i class="icofont-phone"></i> +91 99999 00000
      </div>
      <div class="social-links float-right">
        <a href="https://www.facebook.com/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.linkedin.com/" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Team Future</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#services">Member's Area</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#team">Team</a></li>
          <!--   <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown">Welcome to <span>Team Future SDMP</span></h2>
                <p class="animated fadeInUp">Welcome to the Students' Data Management Portal for Team Future.</p>
                <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown">For the Students</h2>
				<p class="animated fadeInUp">Your personal and academic results a click away.</p>
                <a href="#services" class="btn-get-started animated fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown">Smooth User-Friendly UI</h2>
                <a href="#services" class="btn-get-started animated fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <h2>Member's Area</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-toggle="modal" data-target="#myModal2">
            <div class="icon"><i class="icofont-computer"></i></div>
            <h4 class="title"><a style="cursor:pointer;">Student Login</a></h4>
            <p class="description">Login for Students Only.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="icofont-result-sport"></i></div>
            <h4 class="title"><a href="./find-result.php">Result</a></h4>
            <p class="description">Click to View Result</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200 "data-toggle="modal" data-target="#myModal">
            <div class="icon"><i class="icofont-login"></i></div>
            <h4 class="title"><a style="cursor:pointer;">Admin Login</a></h4>
            <p class="description">Login for Institute Administrators Only</p>
          </div>

          <!--=== Admin Modal BEGINS ===-->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Admin Login</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
                      <div class="col-sm-11">
                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-11">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                      </div>
                    </div>

                      <div class="form-group mt-20">
                      <div class="col-sm-offset-1 col-sm-11">

                        <button type="submit" name="login" class="btn btn-info btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!--=== Admin MODAL ENDS ===-->

          <!-- Student Modal -->
          <!--=== Modal BEGINS ===-->
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Student Login</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Identity No</label>
                      <div class="col-sm-11">
                        <input type="text" name="susername" class="form-control" id="inputEmail3" placeholder="ID/Roll No" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-11">
                        <input type="password" name="spassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                      </div>
                    </div>

                      <div class="form-group mt-20">
                      <div class="col-sm-offset-1 col-sm-11">

                        <button type="submit" name="slogin" class="btn btn-info btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!--=== STUDENT MODAL ENDS ===-->

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=tPg0supr9Y8" class="venobox play-btn mb-4" data-vbtype="video"
              data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>The portal focuses on students' database management, including both personal and academic details.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Reduces Hardship</a></h4>
              <p class="description">Reduces hardships and to some extent, errors in manual entry and maintenance of
                data.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-crop"></i></div>
              <h4 class="title"><a href="">Zero Knowledge Required</a></h4>
              <p class="description">No formal knowledge about the database is required. Thus, proves to be
                user-friendly. </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
<?php
$sql1 = "SELECT StudentId from tblstudents ";
$query1 = $dbh->prepare($sql1);
$query1->execute();
$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
$totalstudents = $query1->rowCount();
?>
    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="icofont-users-alt-5" style="color: #20b38e;"></i>
              <span data-toggle="counter-up"><?php echo htmlentities($totalstudents); ?></span>
              <p>Registered Students</p>
            </div>
          </div>
<?php
$sql = "SELECT id from  tblsubjects ";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$totalsubjects = $query->rowCount();
?>
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-book" style="color: #c042ff;"></i>
              <span data-toggle="counter-up"><?php echo htmlentities($totalsubjects); ?></span>
              <p>Subjects Listed</p>
            </div>
          </div>
<?php
$sql2 = "SELECT id from  tblclasses ";
$query2 = $dbh->prepare($sql2);
$query2->execute();
$results2 = $query2->fetchAll(PDO::FETCH_OBJ);
$totalclasses = $query2->rowCount();
?>
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-listing-box" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up"><?php echo htmlentities($totalclasses); ?></span>
              <p>Total Classes Listed</p>
            </div>
          </div>
<?php
$sql3 = "SELECT  distinct StudentId from  tblresult ";
$query3 = $dbh->prepare($sql3);
$query3->execute();
$results3 = $query3->fetchAll(PDO::FETCH_OBJ);
$totalresults = $query3->rowCount();
?>
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-bars" style="color: #ffb459;"></i>
              <span data-toggle="counter-up"><?php echo htmlentities($totalresults); ?></span>
              <p>Results Declared</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>The Team behind the Development of the Portal</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Subarna Das</h4>
                <div class="social">
                  <a href="https://www.facebook.com/sd.subarna"><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/sd.subarna"><i class="icofont-facebook"></i></a>
                  <a href="https://www.facebook.com/sd.subarna"><i class="icofont-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/subarna-das/"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Soham Sengupta</h4>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/random__584/" target="_blank"><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Rijul Ganguly</h4>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sandipan Bera</h4>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Sonarpur Station Road, Kolkata</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><a href="mailto:contact@teamfuture.in">contact@teamfuture.in</a></p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+91 99999 00000</p>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Team Future</h3>
            <p>
              Sonarpur Station Rd. <br>
              Kolkata<br><br>
              <strong>Phone:</strong> +91 99999 00000<br>
              <strong>Email:</strong> contact@teamfuture.in<br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Our Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Student Details</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Result</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Admin Login</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Future Institute of Enginering and Management</h4>
            <p><i class="icofont icofont-arrow-right"></i><a href="https://futureengineering.in/" target="_blank"
                class="text-light">Take me to 'futureengineering.in'</a></p>


          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>'SDMP'</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed and Developed by Subarna, Soham, Rijul, Sandipan
      </div>
    </div>
  </footer><!-- End Footer -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <style>
  .btn.btn-labeled {
  padding-top: 0;
  padding-bottom: 0;
}

.btn.btn-labeled .fa {
  margin-right: 0px;
}

.btn.btn-labeled .btn-label {
  position: relative;
  background: transparent;
  background: rgba(0, 0, 0, 0.15);
  display: inline-block;
  padding: 6px 12px;
  left: -12px;
  border-radius: 4px 0 0 4px;
}

.btn.btn-labeled .btn-label.btn-label-right {
  left: auto;
  right: -12px;
  border-radius: 0 4px 4px 0;
}

.btn.btn-labeled.btn-rounded .btn-label {
  border-radius: 30px 0 0 30px;
}

.btn.btn-labeled.btn-rounded .btn-label.btn-label-right {
  left: auto;
  right: -12px;
  border-radius: 0 30px 30px 0;
}
</style>

</body>

</html>