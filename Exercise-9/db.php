<?php
$host = 'localhost';
$dbname = 'employeeDB'; // Use the name of the database you created
$username = 'root'; // Change if necessary
$password = 'ShyamSeenu10'; // Change if necessary (leave blank for XAMPP)

$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
