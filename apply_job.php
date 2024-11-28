<?php
include("connection/db.php");

if (isset($_POST['submit'])) {
   
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
    $tmp_name = $_FILES['file']['tmp_name'];
    $id_job = mysqli_real_escape_string($conn, $_POST['id_job']);
    $job_seeker = mysqli_real_escape_string($conn, $_POST['job_seeker']);

    $upload_dir = "uploads/";

    // Ensure the uploads directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
    }

    // Create a unique file name to avoid overwriting
    $target_file = $upload_dir . basename($file);

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($tmp_name, $target_file)) {
        // Insert data into the database with properly quoted variables
        $query = "INSERT INTO job_apply (first_name, last_name, dob, file, id_job, job_seeker) 
                  VALUES ('$first_name', '$last_name', '$dob', '$file', '$id_job', '$job_seeker')";

        // Execute the query
        if (mysqli_query($conn, $query)) { // Fix: actually execute the query here
            echo '<div><div class="alert alert-warning">
                  <strong>Success!</strong> Your Form Successfully Added
                </div></div>';
        } else {
            echo '<div><div class="alert alert-danger">
                  <strong>Error!</strong> Form submission failed. ' . mysqli_error($conn) . '
                </div></div>';
        }
    } else {
        echo "File upload failed. Please check the file directory permissions.";
    }
}
?>

<p class="lead" style="margin-left: 40%;">
    <a href="index.php" class="btn btn-lg btn-secondary">Back</a>
</p>
