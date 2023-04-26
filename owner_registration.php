<?php
include 'connection.php';

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $place = $_POST['place'];
  $email = $_POST['email'];
 
  $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];  
    $folder = "./image/".$filename;
    $image=$filename; 
    $uploadOk = 1; 
    $imageFileType =strtolower(pathinfo($folder,PATHINFO_EXTENSION));
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if($uploadOk == 0)
    {
        echo "Sorry";
    
    }
    else{
        move_uploaded_file($tempname,$folder);  
    }

  
  $username = $_POST['username'];
  $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


  mysqli_query($conn,"INSERT INTO owner_registration(name,mobile,place,email,photo,approval_status) VALUES('$name','$mobile','$place','$email','$image','0')");
  $log =mysqli_insert_id($conn);
  $sql = mysqli_query($conn,"INSERT INTO login(login_id,username,password,type) VALUES('$log','$username','$hash','owner')");
  if($sql)
  {
    echo '<script>alert("Registration completed successfully");</script>';
    ?>
    
   <script>window.location.assign('owner_registration.php');</script> 
   <?php
  
  }
  else
  {
    echo 'something went wrong';
  }
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
          <div class="card-header" style="background-color:aquamarine">
          Owner Registration
          </div>
          <div class="card-body">
            <form  name="myform" method="POST" enctype="multipart/form-data" required>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name" id="name" onkeyup="clearmsg('sp1')"><span style="color: red;" id="sp1"></span>
            <input type="number" class="form-control mt-2" placeholder="Mobile_number" name="mobile" id="mobile" onkeyup="clearmsg('sp2')"><span style="color: red;" id="sp2"></span>
            <input type="text" class="form-control mt-2" placeholder="Place" name="place" id="place" onkeyup="clearmsg('sp3')"><span style="color: red;" id="sp3"></span>
            <input type="email" class="form-control mt-2" placeholder="Email ID" name="email" id="email" onkeyup="clearmsg('sp4')"><span style="color: red;" id="sp4"></span>
            <input type="email" class="form-control mt-2" placeholder="Username" name="username" id="username" onkeyup="clearmsg('sp5')"><span style="color: red;" id="sp5"></span>
            <input type="password" class="form-control mt-2" placeholder="Password" name="password" id="password" onkeyup="clearmsg('sp6')"><span style="color: red;" id="sp6"></span>
            <input type="file" class="form-control mt-2" name="photo">
            <button onclick="return valid(); return false;" name="submit">Submit</button>
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
<script type="text/javascript">
function valid()
{  
  var name = document.getElementById("name").value;
  var mobile = document.getElementById("mobile").value;
  var place = document.getElementById("place").value;
  var email = document.getElementById("email").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  
if (name=="")
{   
  
   document.getElementById("sp1").innerHTML="please enter your name";
  return false;
}

if(mobile == "")
{
  document.getElementById("sp2").innerHTML="please enter mobile";
   return false;
}

if(place == "")
{
  document.getElementById("sp3").innerHTML="please enter place";
   return false;
}

if(email == "")
{
  document.getElementById("sp4").innerHTML="please enter email";
   return false;
}


if(username == "")
{
  document.getElementById("sp5").innerHTML="please enter username";
   return false;
}


if(password == "")
{
  document.getElementById("sp6").innerHTML="please enter password";
  return false;
}
return true;
}  
function clearmsg(sp)
{
document.getElementById(sp).innerHTML="";
}

    </script>
</body>

</html>