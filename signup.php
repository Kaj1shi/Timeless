<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "insurance_company";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if both fields are set
  if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the database
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Insert data
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
      header('Location: login.html');
      exit();
    } else {
      echo "user exists " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    echo "Username and password are required.";
  }
} else {
  echo "Invalid request.";
}
