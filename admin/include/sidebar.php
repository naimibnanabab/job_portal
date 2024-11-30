<?php 

$conn = mysqli_connect("127.0.0.1", "root", "", "job_portal");

$query = mysqli_query($conn, "select * from admin_login where admin_email='{$_SESSION['email']}' and admin_type='1'");

if (mysqli_num_rows($query) > 0) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Dashboard</title>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active fs-5 fw-bold" href="../index.php">
              <img src="https://media.discordapp.net/attachments/1312377146076827679/1312468131209412689/NextHire-01.png?ex=674c9ab2&is=674b4932&hm=e4f5299d5e48c7b0ab3fa6e675e61a59caed232953938bbeee1e75f873e0f278&=&format=webp&quality=lossless"
              >
               
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5 fw-bold" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="Customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="Job_create.php">
              <span data-feather="bar-chart-2"></span>
              Job Create
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="create_company.php">
              <span data-feather="layers"></span>
              Company
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted fs-6 fw-bold">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="category.php">
              <span data-feather="file-text"></span>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>
<?php
} else {
?>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active fs-5 fw-bold" href="../index.php">
            <img class="mb-4" src="https://media.discordapp.net/attachments/1312377146076827679/1312468131209412689/NextHire-01.png?ex=674c9ab2&is=674b4932&hm=e4f5299d5e48c7b0ab3fa6e675e61a59caed232953938bbeee1e75f873e0f278&=&format=webp&quality=lossless" alt="" width="72" height="72"> 
            <span style="font-weight: extra-bold; font-size: 3rem;">
              Next-Hire
              </span> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5 fw-bold" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="Job_create.php">
              <span data-feather="bar-chart-2"></span>
              Job Create
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="apply_jobs.php">
              <span data-feather="layers"></span>
              Apply Jobs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="/job_portal/index.php">
              <span data-feather="home"></span>
             Home
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted fs-6 fw-bold">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
        </ul>
      </div>
    </nav>
<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
