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
  </head>

  <body class="text-center">
    <form class="form-signin" action="sign_up.php" method="post">
      <img class="mb-4" src="https://media.discordapp.net/attachments/1312377146076827679/1312468131209412689/NextHire-01.png?ex=674c9ab2&is=674b4932&hm=e4f5299d5e48c7b0ab3fa6e675e61a59caed232953938bbeee1e75f873e0f278&=&format=webp&quality=lossless" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <label for="inputEmail" class="sr-only">First Name</label>
      <input type="first_name" id="first_name" class="form-control" name="first_name" placeholder="Enter Your First Name" required autofocus>

      <label for="inputEmail" class="sr-only">Last Name</label>
      <input type="last_name" id="last_name" class="form-control" name="last_name" placeholder="Enter Your Last Name" required autofocus>

      <label for="inputEmail" class="sr-only">Mobile Number</label>
      <input type="Number" id="mobile_number" class="form-control" name="mobile_number" placeholder="Enter Your Mobile Number" required autofocus>

      <label for="inputEmail" class="sr-only">Date of Birth</label>
      <input type="date" id="dob" class="form-control" name="dob" placeholder="Enter Your Date of Birth" required autofocus>

    
      <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign up">
      <a href="job-post.php">Already Account</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2024-2025</p>
    </form>
  </body>
</html>

<?php 
include('connection/db.php');
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $mobile_number=$_POST['mobile_number'];

    $query=mysqli_query($conn,"insert into jobskeer(email,password,first_name,last_name,dob,mobile_number) values('$email','$password','$first_name','$last_name','$dob','$mobile_number')");
    var_dump($query);
    if($query){
        echo "<script> alert('Now You Can Login') </script>";
        header('location:job-post.php');
    }else{
         echo "<script> alert('Some Error!! Please try again.') </script>";
    }
}



?>