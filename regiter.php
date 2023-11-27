<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include your database connection code here
    // For example, using PDO for MySQL
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Validate and sanitize user inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // Prepare and execute the SQL query using prepared statements
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);

    // Execute the statement
    try {
        $stmt->execute();
        echo "Registration successful!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
