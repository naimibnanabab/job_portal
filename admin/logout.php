<?php 

session_start();  
session_unset();  
session_destroy(); 
header('Location: admin_login.php');  
exit();



// include('connection/db.php');


// $query=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}' and admin_type='2'");
// if($query){
// 	header('location:http://localhost/Job_Portal/');
// }else{
// 	header('location:admin_login.php');
// }


 ?>