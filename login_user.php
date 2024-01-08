<?php
session_start();

// Connection to the database
$servername = "localhost";
$dbname = "guvi_task";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$username = $_POST['username'];
$password = $_POST['password'];

// Check if user exists in the database
$sql = "SELECT * FROM userdata WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// echo implode(" ",$result);


if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    // header("Location: profile.html");
    return true;
} 
else {
    echo "Invalid username or password!";
    return false;
}

$conn->close();
?>
