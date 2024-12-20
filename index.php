<?php
session_start();
include("connection/db.php");
$query=mysqli_query($conn,"select * from job_category");

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  // Fetch the user's profile picture from the database
  $stmt = $conn->prepare("SELECT profile_picture FROM admin_login WHERE admin_email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (!empty($row['profile_picture'])) {
          $profile_picture = $row['profile_picture'];
      }
  }
  $stmt->close();
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobPortal - Free Bootstrap 4 Template by Colorlib</title>
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
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
             <?php if (isset($_SESSION['email'])) { ?>
              <li class="nav-item cta mr-md-2">
                  <span class="nav-link">
                      <?php echo htmlspecialchars($_SESSION['email']); ?>
                  </span>
              </li>
              <li class="nav-item dropdown">
                  <img src="<?php echo htmlspecialchars($profile_picture); ?>"
                      class="img-circle dropdown-toggle"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      alt="Profile Picture"
                      width="50"
                      height="50"
                      style="border-radius: 50%; cursor: pointer;">
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="my_profile.php">My Profile</a>
                      <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
              </li>
            <?php } else { ?>
              <li class="nav-item cta mr-md-2">
                  <a href="job-post.php" class="nav-link">Login</a>
              </li>
            <?php } ?>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great job offers you deserve!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

						<div class="ftco-search">
							<div class="row"> 
		            <div class="col-md-12 nav-link-wrap">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

			              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a>

			            </div>
			          </div>
			          <div class="col-md-12 tab-wrap">
			            
			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="index.php" method="post" class="search-job">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" name="key" id="key" class="form-control" placeholder="eg. Graphic. Web Developer">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="category" id="category" class="form-control">
                                  <option value="">Category</option>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['category'] . "</option>";
                                }
                                ?>

						                
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              	
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
                                <button type="submit" value="search" name="search" id="search" class="form-control btn btn-primary">Search</button>
								            
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>

			              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                    <form action="index.php" method="post" class="search-candidate">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-user"></span></div>
								                <input type="text" class="form-control" placeholder="eg. Adam Scott">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="" id="" class="form-control">
						                      	<option value="">Category</option>
                                    <?php
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['category'] . "</option>";
                                }
                                ?>
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              		
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit"   value="search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>
			            </div>
			          </div>
			        </div>
		        </div>
          </div>
        </div>
      </div>
    </div>

    <?php
include("connection/db.php");

// Get the current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Number of jobs per page
$offset = ($page - 1) * $limit;

// Get search parameters from POST or URL
$keyword = isset($_POST['key']) ? $_POST['key'] : (isset($_GET['key']) ? $_GET['key'] : '');
$category = isset($_POST['category']) ? $_POST['category'] : (isset($_GET['category']) ? $_GET['category'] : '');

// Build the query based on whether a keyword or category is provided
if (!empty($keyword) || !empty($category)) {
    $sql = mysqli_query($conn, "SELECT * FROM all_jobs 
                                LEFT JOIN company ON all_jobs.customer_email = company.admin 
                                WHERE (keyword LIKE '%$keyword%' OR category = '$category') 
                                LIMIT $limit OFFSET $offset");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM all_jobs LIMIT $limit OFFSET $offset");
}
?>


 


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Recently Added Jobs</span>
            <h2 class="mb-4"><span>Recent</span> Jobs</h2>
          </div>
        </div>
				<div class="row h-50">
        <?php
// Loop through the results and display them
while ($row = mysqli_fetch_array($sql)) { ?>
    <div class="col-md-12 h-50 ftco-animate">
        <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
            <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                    <h2 class="mr-3 text-black h4"><?php echo $row['job_title']; ?></h2>
                    <div class="badge-wrap">
                        <span class="bg-warning text-white badge py-2 px-3"><?php echo $row['city']; ?></span>
                    </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                    <div class="mr-3">
                        <span class="icon-layers"></span> 
                        <a href="#"> </a><?php echo $row['des']; ?>
                    </div>
                    <div>
                        <span class="icon-my_location"></span> 
                        <span><?php echo $row['country']; ?>, <?php echo $row['state']; ?>,<?php echo $row['city']; ?></span>
                    </div>
                </div>
            </div>

            <div class="ml-auto d-flex">
                <a href="blog-single.php?id=<?php echo $row['job_id']; ?>" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-danger rounded-circle btn-favorite d-flex align-items-center">
                    <span class="icon-heart"></span>
                </a>
            </div>

        </div>
    </div><!-- end -->

<?php } ?>

<?php
// Pagination logic
// Count the total number of jobs
$total_jobs_sql = mysqli_query($conn, "SELECT COUNT(*) FROM all_jobs");
$total_jobs = mysqli_fetch_row($total_jobs_sql)[0];

// Calculate total pages
$total_pages = ceil($total_jobs / $limit);

// Pagination links with keyword and category included
echo '<div class="d-flex justify-content-center mt-4" style="width: 100%;">';
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<a href="?page=' . $i . '&key=' . urlencode($keyword) . '&category=' . urlencode($category) . '" class="btn btn-success rounded-circle ' . ($i == $page ? 'active' : '') . ' mx-2">' . $i . '</a>';
}
echo '</div>';

?>


				</div>
		</section>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-collaboration"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-promotions"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employee"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Categories work wating for you</span>
            <h2 class="mb-4"><span>Current</span> Job Posts</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">Web Development <span class="number" data-number="1000">0</span></a></li>
        			<li><a href="#">Graphic Designer <span class="number" data-number="1000">0</span></a></li>
        			<li><a href="#">Multimedia <span class="number" data-number="2000">0</span></a></li>
        			<li><a href="#">Advertising <span class="number" data-number="900">0</span></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">Education &amp; Training <span class="number" data-number="3500">0</span></a></li>
        			<li><a href="#">English <span class="number" data-number="1560">0</span></a></li>
        			<li><a href="#">Social Media <span class="number" data-number="1000">0</span></a></li>
        			<li><a href="#">Writing <span class="number" data-number="2500">0</span></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">PHP Programming <span class="number" data-number="5500">0</span></a></li>
        			<li><a href="#">Project Management <span class="number" data-number="2000">0</span></a></li>
        			<li><a href="#">Finance Management <span class="number" data-number="800">0</span></a></li>
        			<li><a href="#">Office &amp; Admin <span class="number" data-number="7000">0</span></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">Web Designer <span><span class="number" data-number="8000">0</span></span></a></li>
        			<li><a href="#">Customer Service <span class="number" data-number="4000">0</span></a></li>
        			<li><a href="#">Marketing &amp; Sales <span class="number" data-number="3300">0</span></a></li>
        			<li><a href="#">Software Development <span class="number" data-number="1356">0</span></a></li>
        		</ul>
        	</div>
        </div>
    	</div>
    </section>

	
   
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1350000">0</strong>
		                <span>Jobs</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="40000">0</strong>
		                <span>Members</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="30000">0</strong>
		                <span>Resume</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10500">0</strong>
		                <span>Company</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


    <section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Testimonial</span>
        <h2 class="mb-4"><span>Happy</span> Clients</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
        <?php
// Ensure the query is executed before the loop
$query = "SELECT * FROM reviews";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through the results and display each testimonial
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="item">';
        echo '<div class="testimony-wrap py-4 pb-5">';
        
        // Fetch the image URL, if available
        if (!empty($row['image_path'])) {
            echo '<div class="user-img mb-4" style="background-image: url(' . htmlspecialchars($row['image_path']) . ')">';
        } else {
            // Default image if no image path is available
            echo '<div class="user-img mb-4" style="background-image: url(images/default_image.jpg)">';
        }
        
        echo '<span class="quote d-flex align-items-center justify-content-center">';
        echo '<i class="icon-quote-left"></i>';
        echo '</span>';
        echo '</div>';
        
        echo '<p class="name">' . htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) . '</p>';
        // Display the review text
        echo '<div class="text">';
        echo '<p class="mb-4">' . htmlspecialchars($row['review']) . '</p>';
        
        // Concatenate first name and last name
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>No testimonials found</p>";
}
?>
        </div>
      </div>
    </div>
  </div>
</section>


    <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2><span>Recent</span> Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php
            include("connection/db.php");

            // Fetch the blog data from the database
            $sql = "SELECT * FROM blogs"; // SQL query to fetch all blogs
            $result = mysqli_query($conn, $sql); // Execute the query

            // Check if there are results
            if ($result && mysqli_num_rows($result) > 0) {
                // Output data for each blog
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display each blog in a card
                    echo '<div class="col-md-3 d-flex ftco-animate">';
                    echo '<div class="blog-entry align-self-stretch">';
                    echo '<a href="#" class="block-20" style="background-image: url(' . htmlspecialchars($row['image_path']) . ');"></a>';
                    echo '<div class="text mt-3">';
                    echo '<div class="meta mb-2">';
                    echo '<div><a href="#">' . date('F j, Y', strtotime($row['date'])) . '</a></div>';
                    echo '<div><a href="#">Admin</a></div>';
                    echo '<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>';
                    echo '</div>';
                    echo '<h3 class="heading"><a href="#" class="blog-title" data-id="' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a></h3>';
                    echo '<p>' . htmlspecialchars($row['description']) . '</p>';

                    // Hidden content to be revealed on click
                    echo '<div id="blog-content-' . $row['id'] . '" class="blog-content" style="display:none;">';
                    echo '<p>' . nl2br(htmlspecialchars($row['full_content'])) . '</p>';
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No blogs found</p>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php 
include('include/footer.php');
?>