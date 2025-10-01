<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurance_company";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, phone, email, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone, $email, $subject, $message);

    if ($stmt->execute()) {
        header('Location: contact.html'); // Redirect after success
        exit();
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
