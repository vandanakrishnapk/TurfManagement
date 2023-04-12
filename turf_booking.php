<?php 
include 'connection.php';
session_start();
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}
else{
    if(isset($_POST['submit']))
    {
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $event_type = $_POST['event_type'];
        $turfid = $_GET['id'];
        var_dump($turfid);
        $customerid = $_SESSION['id'];
        $sql = mysqli_connect($conn,"INSERT INTO booking_table(turf_id,customer_id,from_date,to_date,event_type) VALUES('$turfid','$customerid','$from_date','$to_date','$event_type')");
        if($sql)
        {
            echo "success";
            mysqli_close($conn);
            header("location:turf_booking.php");
        }
    }
    
    else{
        echo "something error";
    }
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Turf Booking Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://media.istockphoto.com/id/520999573/photo/indoor-soccer-football-field.jpg?s=612x612&w=0&k=20&c=X2PinGm51YPcqCAFCqDh7GvJxoG2WnJ19aadfRYk2dI=" rel="icon">
  <link href="https://media.istockphoto.com/id/520999573/photo/indoor-soccer-football-field.jpg?s=612x612&w=0&k=20&c=X2PinGm51YPcqCAFCqDh7GvJxoG2WnJ19aadfRYk2dI=" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    #hero
    {
      background-image:url("https://media.istockphoto.com/id/520999573/photo/indoor-soccer-football-field.jpg?s=612x612&w=0&k=20&c=X2PinGm51YPcqCAFCqDh7GvJxoG2WnJ19aadfRYk2dI=");
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Turf<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
         
       
             
    
        </ul>
        
      </nav><!-- .navbar -->

  

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container mt-1" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">   
        <h3 style="color:white;">Sign up here</h3>
        <div class="card" style="width:500px">
          <div class="card-header" style="background-color:bisque">
          Turf Booking
          </div>
          <div class="card-body">
            <form action="turf_booking.php" method="POST">
          <div class="form-group">
            <input type="date" class="form-control mt-2" name="from_date">
            <input type="date" class="form-control mt-2" name="to_date">
           <select name="event_type">
            <option value="football">Football</option>
            <option value="cricket">cricket</option>
            <option value="volleyball">volleyball</option>
           </select>          
            <input type="submit" class="btn btn-primary mt-2"  name="submit" value="submit">
            <a href="owner_dashboard.php" class="btn btn-primary">Back</a>
          </div>
            </form>
          </div>
        </div>
        
     
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
           
          </div>
       

      </div>
    </section><!-- End About Section -->

   
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          
            <div class="footer-info">
          
             
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php } ?>

?>
      