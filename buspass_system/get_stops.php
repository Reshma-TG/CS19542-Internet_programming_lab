<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "bus_pass_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected route name from the AJAX request
$route_name = $_GET['route_name'];

// Fetch stops (stop1 to stop10) for the selected route
$stop_query = "SELECT stop1, stop2, stop3, stop4, stop5, stop6, stop7, stop8, stop9, stop10 FROM bus_route WHERE route_name = ?";
$stmt = $conn->prepare($stop_query);
$stmt->bind_param("s", $route_name);
$stmt->execute();
$stop_result = $stmt->get_result();

$stops = [];
if ($stop_result->num_rows > 0) {
    while ($row = $stop_result->fetch_assoc()) {
        foreach ($row as $stop) {
            if (!empty($stop)) {
                $stops[] = $stop; // Add stops to array
            }
        }
    }
}

// Return stops as JSON
echo json_encode($stops);

$stmt->close();
$conn->close();
?>
