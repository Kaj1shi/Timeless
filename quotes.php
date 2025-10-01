<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurance_company";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $insurance_type = $_POST["insurance_type"];
    $coverage = $_POST["coverage"];
    $details = $_POST["details"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = ("INSERT INTO quotes (name, email, phone, insurance_type, coverage, details) 
    VALUES ('$name', '$email', '$phone', '$insurance_type', '$coverage', '$details')");

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Quote request submitted successfully!</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote</title>
    <link rel="stylesheet" href="nav.css">
</head>

<body>


    <div class="container1" style="margin-bottom: -100px;">
        <div class="centered" style="color: rgb(206, 0, 0);">Quote Request Received</div>

        <?php
        // Display the data (for testing purposes)
        echo "<p><strong>Full Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone Number:</strong> $phone</p>";
        echo "<p><strong>Insurance Type:</strong> $insurance_type</p>";
        echo "<p><strong>Coverage Amount:</strong> $coverage</p>";
        echo "<p><strong>Additional Details:</strong> $details</p>";
        ?>

        <form method="POST" style="margin-top: -100px;" action="">
            <button type="home" name="home_button">GO HOME</button>
        </form>

        <?php
        if (isset($_POST['home_button'])) {
            header('Location: index.html');
        }
        
        ?>

    </div>

</body>

</html>