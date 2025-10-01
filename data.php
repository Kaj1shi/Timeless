<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

$username = $_POST["name"];
$email = $_POST["email"];
$comment = $_POST["comment"];


$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO comments (username, email, comment)
  VALUES ('$username', '$email', '$comment')";

if ($conn->query($sql) === TRUE) { 
  header('Location: index.html');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
 