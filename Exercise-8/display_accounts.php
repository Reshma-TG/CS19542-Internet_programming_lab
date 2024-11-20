<?php
include 'db.php';

$stmt = $conn->query("SELECT * FROM ACCOUNT");
$accounts = $stmt->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Accounts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Accounts</h2>
        <?php if ($accounts): ?>
            <?php foreach ($accounts as $account): ?>
                <p>Account No: <?php echo $account['ANO']; ?> - Type: <?php echo $account['ATYPE']; ?> - Balance: <?php echo $account['BALANCE']; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No accounts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
