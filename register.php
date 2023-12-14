<?php
// Establish your MySQL connection here
session_start();
// Include the database connection file
// require_once 'db_connection.php';

// Replace these variables with your actual database credentials
$hostname = "127.0.0.1"; // or your database host
$username = "root"; // your database username
$password = "Password@123"; // your database password
$database = "userdata"; // your database name

// Create a connection to MySQL
// $mysqli = new mysqli($hostname, $username, $password, $database);

// // Check connection
// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }

$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL! Please contact the admin.";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values from the AJAX request
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password (consider using bcrypt or a strong hashing algorithm)
    $hashedPassword = hash('sha256', $password); // Example hashing, replace with a secure method

    // Prepare your SQL statement to prevent SQL injection
    $stmt = $mysqli->prepare("INSERT INTO users (fullName, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullName, $email, $hashedPassword);
    
    if ($stmt->execute()) {
        // Registration successful
        echo json_encode(array("success" => true, "message" => "Registration successful"));
    } else {
        // Registration failed
        echo json_encode(array("success" => false, "message" => "Registration failed"));
    }
} else {
    // Handle if it's not a POST request
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
