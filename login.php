<?php
// Establish your MySQL connection here

// Include the database connection file
require_once 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values from the AJAX request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password (consider using bcrypt or a strong hashing algorithm)
    $hashedPassword = hash('sha256', $password); // Example hashing, replace with a secure method

    // Prepare your SQL statement to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Login successful
        $user = $result->fetch_assoc();
        // Start the session or manage user login state using browser local storage
        // For example: $_SESSION['user'] = $user;
        echo json_encode(array("success" => true, "message" => "Login successful"));
    } else {
        // Login failed
        echo json_encode(array("success" => false, "message" => "Invalid credentials"));
    }
} else {
    // Handle if it's not a POST request
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
