<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .form-signin {
            max-width: 330px;
            padding: 15px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-signin img {
            margin-bottom: 15px;
            border-radius: 50%;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
  </head>

  <body class="text-center">
    <form class="form-signin" action="job-post.php" method="post">
        <!-- Logo -->
        <img class="mb-4" src="https://media.discordapp.net/attachments/1312377146076827679/1312468131209412689/NextHire-01.png?ex=674c9ab2&is=674b4932&hm=e4f5299d5e48c7b0ab3fa6e675e61a59caed232953938bbeee1e75f873e0f278&=&format=webp&quality=lossless" alt="Bootstrap Logo" width="72" height="72">

        <!-- Title -->
        <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>

        <!-- Email Input -->
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        </div>

        <!-- Submit Button -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>

        <!-- Link to Sign Up -->
        <div class="mt-3">
            <a href="sign_up.php" class="text-muted">Create an Account</a>
        </div>

        <!-- Footer -->
        <p class="mt-5 mb-3 text-muted">&copy; 2024-2025</p>
    </form>

    <!-- Bootstrap JS (Optional for interactive features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php 
include('connection/db.php');



if (isset($_POST['submit'])) {

  $email=$_POST['email'];
  $password=$_POST['password'];
  
$query=mysqli_query($conn,"select * from jobskeer where email='$email' and password='$password' ");

// var_dump($query);
  if ($query) {
 
if (mysqli_num_rows($query)>0) {
    
  $_SESSION['email']= $email;
  header('location:index.php');

}else{
  echo "<script>alert('Email or password is  incorrect ,Please try again')</script>";
}
}
}


 ?>