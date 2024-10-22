<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $route_name = $_GET['route_name'];
    $pass_type = $_GET['pass_type'];
    $duration = $_GET['duration'];

    // Fetch the base fare from the bus_route table
    $stmt = $conn->prepare("SELECT total_fare FROM bus_route WHERE route_name = ?");
    $stmt->execute([$route_name]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $base_fare = (int)$result['total_fare'];
        $amount = 0;

        // Logic to calculate fare based on duration
        switch ($duration) {
            case '1 week':
                $amount = $base_fare * 7; // 7 days for 1 week
                break;
            case '2 weeks':
                $amount = $base_fare * 14; // 14 days for 2 weeks
                break;
            case '1 month':
                $amount = $base_fare * 30; // 30 days for 1 month
                break;
            case '3 months':
                $amount = $base_fare * 90; // 90 days for 3 months
                break;
            case '6 months':
                $amount = $base_fare * 180; // 180 days for 6 months
                break;
            case '1 year':
                $amount = $base_fare * 365; // 365 days for 1 year
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid duration.']);
                exit();
        }

        // Apply discounts based on pass type (case-insensitive)
        switch (strtolower($pass_type)) {
            case 'students':
                $amount *= 0.5; // 50% discount for students
                break;
            case 'differently_abled':
                $amount *= 0.4; // 60% discount for differently abled
                break;
            case 'senior_citizen':
                $amount *= 0.6; // 40% discount for senior citizens
                break;
            case 'government_staff':
                $amount *= 0.75; // 25% discount for government staff
                break;
            // No discount for other types
            default:
                // No change in amount
                break;
        }

        // Return the calculated amount
        echo json_encode(['success' => true, 'amount' => round($amount, 2)]); // Round to 2 decimal places
    } else {
        echo json_encode(['success' => false, 'message' => 'Route not found.']);
    }
}

$conn = null; // Close the database connection
?>
