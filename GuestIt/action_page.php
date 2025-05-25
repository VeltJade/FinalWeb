<?php
session_start(); // Start a session to track the user

include 'connect.php';

$username = $_POST['uname'];
$password = $_POST['psw'];

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM registration WHERE userName = ? AND user_psw = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // User found — login successful
    $_SESSION['username'] = $username; // You can store more user info if needed
    header("Location: dashboard.php"); // Redirect to dashboard or home page
    exit();
} else {

}

?>
