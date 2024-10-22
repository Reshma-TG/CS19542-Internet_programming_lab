<?php
include 'db.php'; // Include your database connection

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $aadhaar_number = filter_input(INPUT_POST, 'aadhaar_number', FILTER_SANITIZE_STRING);
    $mobile_number = filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_STRING);
    $pincode = filter_input(INPUT_POST, 'pincode', FILTER_SANITIZE_STRING);
    try {
        // Prepare SQL statement to insert data into user_details table
        $stmt = $conn->prepare("INSERT INTO user_details (email, name, address, city, state, aadhaar_number, mobile_number, pincode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      
        // Execute the statement with an array of parameters
        if ($stmt->execute([$email, $name, $address, $city, $state, $aadhaar_number, $mobile_number, $pincode])) {
            echo '<div class="alert alert-success">Registration successful!</div>';
        } else {
            echo '<div class="alert alert-danger">Registration failed. Please try again.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Registration failed: ' . $e->getMessage() . '</div>';
    }

    // Close connection
    $conn = null; // Close the connection
} else {
    echo '<div class="alert alert-danger">Invalid request method.</div>';
}
?>
