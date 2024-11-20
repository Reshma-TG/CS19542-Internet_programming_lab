<?php
$host = 'localhost';
$dbname = 'bankingdb';
$username = 'root'; // Change this as necessary
$password = 'ShyamSeenu10'; // Change this as necessary

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully to $dbname";
// ?>
