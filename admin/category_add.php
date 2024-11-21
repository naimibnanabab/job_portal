<?php 

include('connection/db.php');

 $category= $_POST['category'];
 $Description= $_POST['Description'];


$query = mysqli_query($conn,"insert into job_category(category,des)values('$category','$Description')");

//var_dump($query);

if($query){

    echo "Data Has Been Successfully Insert";
}else{
    echo "Some error!! Pleast try again";
}

?>