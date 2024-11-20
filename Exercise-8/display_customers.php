<?php
include 'db.php';

$stmt = $conn->query("SELECT * FROM CUSTOMER");
$customers = $stmt->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Customers</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Customers</h2>
        <?php if ($customers): ?>
            <?php foreach ($customers as $customer): ?>
                <p>ID: <?php echo $customer['CID']; ?> - Name: <?php echo $customer['CNAME']; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No customers found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
