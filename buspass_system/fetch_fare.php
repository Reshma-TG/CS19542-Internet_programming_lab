<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "bus_pass_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$startingFrom = $_GET['start'];
$destination = $_GET['dest'];

// Get the fare from the bus_price table based on the selected stops
$query = "SELECT $startingFrom AS fare FROM bus_price"; // Adjust according to your table structure
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['fare']; // Return the fare for the starting stop
} else {
    echo "0"; // If no fare found, return 0
}

$conn->close();
?>
