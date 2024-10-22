<?php
session_start();
include 'db.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session
    $pass_type = $_POST['pass_type'];
    $duration = $_POST['duration'];
    $starting_from = $_POST['starting_from'];
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['price'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO bus_pass (user_id, pass_type, duration, starting_from, destination, start_date, end_date, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Execute the statement
    if ($stmt->execute([$user_id, $pass_type, $duration, $starting_from, $destination, $start_date, $end_date, $price])) {
        // Success message
        $_SESSION['success_message'] = "Bus pass applied successfully!";
        header("Location: bus_pass.php"); // Redirect to bus_pass.php
        exit();
    } else {
        // Error message
        $_SESSION['error_message'] = "Error applying for bus pass. Please try again.";
    }
}
?>
