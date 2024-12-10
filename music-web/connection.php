
<?php
// Database connection parameters
$servername = "localhost"; // Replace with your server name if different
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$database = "BootcampDec";   // Replace with your database name


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email_or_phone = $_POST['email_or_phone'];
$password = $_POST['password'];


$email_or_phone = $conn->real_escape_string($email_or_phone);
$password = $conn->real_escape_string($password);

$sql = "SELECT * FROM users WHERE (email = '$email_or_phone' OR phone = '$email_or_phone') AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<a href=\"index.html\"> Welcome to the music App !</a>";
} else {

    echo "<h1>Invalid credentials. Please try again.</h1>";
}

$conn->close();
?>
