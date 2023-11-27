<?php
// profile.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Assuming you have a function to get user details from the database
$userDetails = getUserDetails($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>User Profile</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Username:</strong> <?php echo $userDetails['username']; ?></p>
                        <p><strong>Email:</strong> <?php echo $userDetails['email']; ?></p>
                        <!-- Add more details as needed -->

                        <form id="profile-form">
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo $userDetails['age']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $userDetails['dob']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $userDetails['contact']; ?>">
                            </div>
                            <button type="button" class="btn btn-primary" id="update-profile-btn">Update Profile</button>
                            <p class="mt-3"><a href="logout.php">Logout</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="script.js"></script>
    <script src="profile.js"></script>
</body>
</html>
