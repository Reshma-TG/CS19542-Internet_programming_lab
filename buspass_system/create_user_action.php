<?php
include 'db.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form inputs
    $mobile_number = $_POST['mobile_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Validate mobile number format (assuming 10 digits)
    if (!preg_match('/^\d{10}$/', $mobile_number)) {
        echo 'invalid_mobile'; // Invalid mobile number response
        exit();
    }

    // Prepare the statement to insert the user
    $stmt = $conn->prepare("INSERT INTO users (mobile_number, password) VALUES (?, ?)");
    
    try {
        $stmt->execute([$mobile_number, $password]);
        echo 'success'; // User creation successful
    } catch (PDOException $e) {
        echo 'error'; // Error during user creation
    }
}
?>
