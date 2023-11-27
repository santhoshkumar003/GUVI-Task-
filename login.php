<?php
<?php
// Include your database connection file
include_once("db_connect.php");

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL statement
$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($userId, $dbUsername, $dbPassword);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $dbPassword)) {
        // Password is correct, set session or local storage
        echo json_encode(['status' => 'success', 'userId' => $userId]);
    } else {
        // Invalid password
        echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
    }
} else {
    // User not found
    echo json_encode(['status' => 'error', 'message' => 'User not found']);
}

$stmt->close();
$mysqli->close();
?>

?>
