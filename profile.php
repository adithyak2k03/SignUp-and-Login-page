<?php
// Establish your MongoDB connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values from the AJAX request
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    // Retrieve other profile information similarly

    // Assuming MongoDB is used for storing user profiles
    // You'd have to implement the MongoDB logic here to update the user profile

    // Example MongoDB update query
    $collection = $mongoDB->selectCollection('profiles');
    $updateResult = $collection->updateOne(
        ['user_id' => $_SESSION['user_id']], // Assuming 'user_id' identifies the user
        ['$set' => [
            'age' => $age,
            'dob' => $dob,
            'contact' => $contact
            // Set other profile fields similarly
        ]]
    );

    if ($updateResult->getModifiedCount() > 0) {
        // Profile update successful
        echo json_encode(array("success" => true, "message" => "Profile updated successfully"));
    } else {
        // Profile update failed
        echo json_encode(array("success" => false, "message" => "Profile update failed"));
    }
} else {
    // Handle if it's not a POST request
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
