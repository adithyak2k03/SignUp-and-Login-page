<?php
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select a database
$database = $mongoClient->selectDatabase('guvi_task_mongo');

// Select a collection
$collection = $database->userprofile;


$username = $_POST["username"];

// echo implode(" ",$_POST);

// Example MongoDB query
$query = ['username' => $username];
$cursor = $collection->find($query);

$resultString = '';
foreach ($cursor as $document) {
    $resultString .= json_encode($document) . "\n";
}
echo $resultString;
// $id = $cursor['_id'];
// $username = $cursor['username'];
// echo $username;
// echo $id;
?>