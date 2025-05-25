<?php
include 'connect.php';

$email = $_POST['email'];
$userName = $_POST['userName'];
$psw = $_POST['psw'];

$stmt = $conn->prepare("INSERT INTO registration (email, userName, user_psw) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $userName, $psw);

if ($stmt->execute()) {
    header("Location: index.html?registered=true");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
