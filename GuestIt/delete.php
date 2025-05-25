<?php
if (isset($_GET["apnt_id"])) {
    $apnt_id = $_GET["apnt_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "guest_it";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM appointments WHERE apnt_id = $apnt_id";
    $connection->query($sql);
}

header("Location: /GuestIt/appoint.php");
exit;
?>  