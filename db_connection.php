<?php
// Replace these variables with your actual database credentials
$hostname = "127.0.0.1"; // or your database host
$username = "root"; // your database username
$password = "Password@123"; // your database password
$database = "userdata"; // your database name

// Create a connection to MySQL
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

