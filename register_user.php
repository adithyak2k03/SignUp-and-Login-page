<?php

require 'vendor/autoload.php';

// Connection to the database
$servername = "localhost";
$dbname = "guvi_task";
$username = "root";
$password = "";
// $firstname = "";
// $lastname = "";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  

//MONGOOOOO

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select a database
$database = $mongoClient->selectDatabase('guvi_task_mongo');

// Select a collection
$collection = $database->userprofile;

// echo implode(" ",$_POST);
// Retrieve user input
// if (isset($yourArray['firstname'])) {
$firstname = $_POST['firstname'];
// }
// if (isset($yourArray['lastname'])) {
$lastname = $_POST['lastname'];
// }

$username = $_POST['username'];
$password = $_POST['password'];

// Insert user data into the database
$sql = "INSERT INTO userdata (firstname,lastname,username,password) VALUES ('$firstname','$lastname','$username', '$password')";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    

    $data = [
     'username' => $username,
     'firstname' => $firstname,
     'lastname' => $lastname,
     // Add more fields as needed
    ];
 
 
    $result = $collection->insertOne($data);
     // Add more fields as needed
 }

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
