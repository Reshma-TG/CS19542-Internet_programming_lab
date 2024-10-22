<?php
session_start();
include 'db.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the user ID from session
$userId = $_SESSION['user_id'];

// Prepare the SQL statement to fetch bus passes for the logged-in user
$stmt = $conn->prepare("SELECT * FROM bus_pass WHERE user_id = ?");
$stmt->execute([$userId]);

// Fetch all bus pass records
$busPasses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the user has any bus passes
if (!$busPasses) {
    $message = "No bus passes found.";
} else {
    $message = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bus Passes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .bus-pass {
            border: 1px solid #007bff;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        .bus-pass-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .bus-pass-footer {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Your Bus Passes</h2>
        
        <?php if ($message): ?>
            <div class="alert alert-info"><?= $message; ?></div>
        <?php else: ?>
            <?php foreach ($busPasses as $pass): ?>
                <div class="bus-pass">
                    <div class="bus-pass-header">
                        <h5>Bus Pass ID: <?= htmlspecialchars($pass['pass_id']); ?></h5>
                    </div>
                    <p><strong>Pass Type:</strong> <?= htmlspecialchars($pass['pass_type']); ?></p>
                    <p><strong>Duration:</strong> <?= htmlspecialchars($pass['duration']); ?></p>
                    <p><strong>Starting From:</strong> <?= htmlspecialchars($pass['starting_from']); ?></p>
                    <p><strong>Destination:</strong> <?= htmlspecialchars($pass['destination']); ?></p>
                    <p><strong>Start Date:</strong> <?= htmlspecialchars($pass['start_date']); ?></p>
                    <p><strong>End Date:</strong> <?= htmlspecialchars($pass['end_date']); ?></p>
                    <div class="bus-pass-footer">
                        <strong>Price:</strong> ₹<?= htmlspecialchars($pass['price']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
