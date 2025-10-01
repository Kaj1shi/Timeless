<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quotes";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contact_messages (name, phone, email, subject, message) 
            VALUES ('$name', '$phone', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
