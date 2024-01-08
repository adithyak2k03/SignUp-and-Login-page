<?php
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select a database
$database = $mongoClient->selectDatabase('guvi_task_mongo');

// Select a collection
$collection = $database->userprofile;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    
    $filter = ['username' => $username];

    $data = [
     'age' => $age,
     'dob' => $dob,
     'contact' => $contact,
     'firstname' => $firstname,
     'lastname' => $lastname,
     // Add more fields as needed
    ];
 
    $update = ['$set' => $data];

    $result = $collection->updateOne($filter,$update);
     // Add more fields as needed
 }


// Example MongoDB query
$query = [];
$cursor = $collection->find($query);

foreach ($cursor as $document) {
    echo "ID: " . $document['_id'] . " - Name: " . $document['name'] . "<br>";
}


?>