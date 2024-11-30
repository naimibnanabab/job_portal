<?php
include('include/header.php');
// Start session
session_start();
include('connection/db.php');

// Check if the user is logged in
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location:admin_login.php');
    exit;
}

// Fetch user details from the database
$email = $_SESSION['email'];
$query = "SELECT first_name, last_name, profile_picture, dob, mobile_number FROM admin_login WHERE admin_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $dob = $row['dob'] ?? ''; // Safe fallback for null values
    $mobile_number = $row['mobile_number'] ?? ''; // Safe fallback for null values
    $profile_picture = !empty($row['profile_picture']) ? $row['profile_picture'] : "https://img.freepik.com/free-vector/user-circles-set_78370-4704.jpg";
} else {
    $first_name = "Unknown";
    $last_name = "User";
    $dob = "";
    $mobile_number = ""; // Default value for mobile number
    $profile_picture = "https://img.freepik.com/free-vector/user-circles-set_78370-4704.jpg";
}

// Handle profile updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_details'])) {
    $new_first_name = $_POST['first_name'];
    $new_last_name = $_POST['last_name'];
    $new_password = $_POST['password'];
    $new_dob = $_POST['dob'];
    $new_mobile_number = $_POST['mobile_number'];

    $update_query = "UPDATE admin_login SET first_name = ?, last_name = ?, admin_pass = ?, dob = ?, mobile_number = ? WHERE admin_email = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssssss", $new_first_name, $new_last_name, $new_password, $new_dob, $new_mobile_number, $email);

    if ($update_stmt->execute()) {
        $success_message = "Profile details updated successfully.";
        $first_name = $new_first_name;
        $last_name = $new_last_name;
        $dob = $new_dob;
        $mobile_number = $new_mobile_number;
    } else {
        $error_message = "Failed to update profile details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        .profile-container {
            margin-top: 20px;
        }
        .profile-card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: url('<?php echo $profile_picture; ?>') no-repeat center center/cover;
            margin: 0 auto 15px;
            border: 5px solid #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand mb-0 h1" href="#"><?php echo htmlspecialchars($_SESSION['email']); ?></a>
            <ul class="navbar-nav">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="logout.php">Sign out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Profile Section -->
    <div class="container profile-container">
        <div class="row">
            <!-- Profile Picture -->
            <div class="col-md-6">
                <div class="card profile-card">
                    <div class="card-body">
                        <div class="profile-picture"></div>
                        <h5 class="card-title">
                        <?php 
                        // Assuming $row contains the data for first_name and last_name
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        echo htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name);
                        ?>
                    </h5>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="profile_picture">Upload Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Upload</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update Details -->
            <div class="col-md-6">
                <div class="card profile-card">
                    <div class="card-body">
                        <h5 class="card-title">Update Profile</h5>
                        <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
                        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($last_name); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Birth Date</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo htmlspecialchars($dob); ?>">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="text" name="mobile_number" class="form-control" value="<?php echo htmlspecialchars($mobile_number); ?>" required>
                            </div>
                            <button type="submit" name="update_details" class="btn btn-success btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include('include/footer.php'); ?>
