<?php
$host = "localhost"; // Change this to your MySQL host
$username = "yourusername"; // Change this to your MySQL username
$password = "yourpassword"; // Change this to your MySQL password
$database = "themoontalk"; // Change this to your database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>