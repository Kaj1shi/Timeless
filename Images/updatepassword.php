<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "insurance_company";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get raw input values (no sanitization or hashing)
    $username = $_POST["username"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Basic validation
    if (empty($username) || empty($newPassword) || empty($confirmPassword)) {
        echo "All fields are required.";
        exit();
    }

    if (strlen($newPassword) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }

    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Connect to database
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        exit();
    }

    // Direct SQL without hashing or prepared statements
    $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            header("Location:login.html"); 
        } else {
            echo "No user found with the provided username.";
        }
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $conn->close();
}
?>
