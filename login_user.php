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
    $response = array('status' => 'success');
    // header("Location: profile.html");
} 
else {
    // echo "Invalid username or password!";
    $response = array('status' => 'error');

    // header("Location: index.html");
}

// echo '<span style="display: none;">This text will be hidden on the webpage</span>';
echo json_encode($response);
$conn->close();
?>
