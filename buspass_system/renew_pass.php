<?php
session_start();
include 'db.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id']; // Get user ID from session

// Fetch existing bus pass details
$stmt = $conn->prepare("SELECT * FROM bus_pass WHERE user_id = ? AND end_date > NOW()");
$stmt->execute([$userId]);
$busPass = $stmt->fetch();

if (!$busPass) {
    echo "<script>alert('No active bus pass found.'); window.location.href='bus_pass.php';</script>";
    exit();
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passType = $_POST['pass_type'];
    $duration = $_POST['duration'];
    $startingFrom = $_POST['starting_from'];
    $destination = $_POST['destination'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $price = $_POST['hidden_price']; // Use the hidden price value

    // Update the bus pass in the database
    $stmt = $conn->prepare("UPDATE bus_pass SET pass_type = ?, duration = ?, starting_from = ?, destination = ?, start_date = ?, end_date = ?, price = ? WHERE id = ?");
    $stmt->execute([$passType, $duration, $startingFrom, $destination, $startDate, $endDate, $price, $busPass['id']]);

    // Check if the update was successful
    if ($stmt) {
        echo "<script>alert('Bus pass renewed successfully!'); window.location.href='bus_pass.php';</script>";
    } else {
        echo "<script>alert('Error renewing bus pass. Please try again.'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renew Bus Pass</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Renew Bus Pass</h2>
    <form method="POST" action="renew_pass.php">
        <div class="form-group">
            <label for="pass_type">Pass Type</label>
            <input type="text" class="form-control" id="pass_type" name="pass_type" value="<?php echo $busPass['pass_type']; ?>" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $busPass['duration']; ?>" required>
        </div>
        <div class="form-group">
            <label for="starting_from">Starting From</label>
            <input type="text" class="form-control" id="starting_from" name="starting_from" value="<?php echo $busPass['starting_from']; ?>" required>
        </div>
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $busPass['destination']; ?>" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $busPass['start_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $busPass['end_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="" readonly>
            <input type="hidden" id="hidden_price" name="hidden_price" value="">
        </div>
        <button type="submit" class="btn btn-primary">Renew Bus Pass</button>
    </form>
</div>

<script>
    // Example to set the hidden price based on some logic or a predefined value
    // You can implement your price calculation logic here
    const examplePrice = 100; // Placeholder for the calculated price
    document.getElementById('price').value = "₹" + examplePrice.toFixed(2);
    document.getElementById('hidden_price').value = examplePrice.toFixed(2);
</script>

</body>
</html>
