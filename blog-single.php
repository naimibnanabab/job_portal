<?php
 session_start();
 if(isset($_SESSION['email'])==true){

 }else{
  header('location:job-post.php');
 }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Next-Hire - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a class="navbar-brand" href="index.html" style="font-weight: extra-bold; font-size: 3rem;">Next-Hire</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
            <?php 
if (isset($_SESSION['email']) && $_SESSION['email'] == true) { ?>
    <li class="nav-item cta mr-md-2"><a href="job-post.php" class="nav-link"><?php echo $_SESSION['email']; ?></a></li>
    <li class="nav-item cta cta-colored"><a href="logout.php" class="nav-link">Logout</a></li>
<?php
} else { ?>
    <li class="nav-item cta mr-md-2"><a href="job-post.php" class="nav-link">Login</a></li>
<?php
}
?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
 <?php 
  include("connection/db.php");
  $id=$_GET['id'];
 $query=mysqli_query($conn,"select * from all_jobs where job_id='$id' ");
 while($row=mysqli_fetch_array($query)){
   $title = $row['job_title'];
   $des= $row['des'];
   $country= $row['country'];
   $state= $row['state'];
   $city= $row['city'];
   $id_job = $row['job_id'];
 }
  
 
 
 ?> 


    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="blog.php">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Single</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
  <div class="container-fluid"> <!-- Change to container-fluid for full width -->
    <div class="row">
      <div class="col-md-10 offset-md-1 ftco-animate"> <!-- Adjust column size to make the form wider -->
        <h2 class="mb-3"><?php echo $title; ?></h2>
        <h5><?php echo $country; ?>, <?php echo $state; ?>, <?php echo $city; ?></h5>
        <p><?php echo $des; ?></p>

        <form action="apply_job.php" id="JobPortal" method="post" enctype='multipart/form-data' style="border: 1px solid gray">
          <div style="padding: 2%">
            <input type="hidden" name="job_seeker" id='job_seeker' value="<?php echo $_SESSION['email']; ?>">
            <input type="hidden" name="id_job" id='id_job' value="<?php echo $id_job; ?>">

            <!-- First and Last Name Fields -->
            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label for="first_name" class="form-label">Enter Your First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name...">
              </div>
              <div class="col-sm-6">
                <label for="last_name" class="form-label">Enter Your Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name...">
              </div>
            </div>

            <!-- Date of Birth and Resume -->
            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth">
              </div>
              <div class="col-sm-6">
                <label for="file" class="form-label">Resume</label>
                <input type="file" id="file" name="file" class="form-control">
              </div>
            </div>

            <!-- Contact Number and Email -->
            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label for="number" class="form-label">Enter Your Contact Number</label>
                <input type="number" id="number" name="number" class="form-control" placeholder="Contact Number...">
              </div>
              <div class="col-sm-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" disabled="disabled" value="<?php echo $_SESSION['email']; ?>">
              </div>
            </div>

            <!-- Submit Button -->
            <div style="padding: 2%">
              <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
        	<div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Employers</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Register</a></li>
                <li><a href="#" class="py-2 d-block">Post a Job</a></li>
                <li><a href="#" class="py-2 d-block">Advance Skill Search</a></li>
                <li><a href="#" class="py-2 d-block">Recruiting Service</a></li>
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Faq</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Workers</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Register</a></li>
                <li><a href="#" class="py-2 d-block">Post Your Skills</a></li>
                <li><a href="#" class="py-2 d-block">Job Search</a></li>
                <li><a href="#" class="py-2 d-block">Emploer Search</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>