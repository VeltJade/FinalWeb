<?php
// Step 1: Set your database connection details
$servername = "localhost";  // Change if your DB is hosted elsewhere
$username = "root";         // Default username for localhost
$password = "";             // Default password is usually empty
$database = "guest_it";  // Replace with your actual database name

// Step 2: Create the connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Step 3: Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully!";
?>