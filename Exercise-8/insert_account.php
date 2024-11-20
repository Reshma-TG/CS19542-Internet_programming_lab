<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atype = trim($_POST['atype']);
    $balance = trim($_POST['balance']);
    $cid = trim($_POST['cid']);

    // Validate input
    if (($atype == 'S' || $atype == 'C') && is_numeric($balance) && $balance >= 0 && is_numeric($cid)) {
        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $atype, $balance, $cid);

        if ($stmt->execute()) {
            $message = "<div class='success'>Account added successfully!</div>";
        } else {
            $message = "<div class='error'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='error'>Please enter valid account details.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Account</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Account</h2>
        <form method="post">
            <label for="atype">Account Type:</label>
            <select name="atype" required>
                <option value="S">Savings</option>
                <option value="C">Current</option>
            </select>
            <label for="balance">Balance:</label>
            <input type="number" name="balance" required>
            <label for="cid">Customer ID:</label>
            <input type="number" name="cid" required>
            <input type="submit" value="Add Account">
        </form>
        <?php if (isset($message)) echo $message; ?>
    </div>
</body>
</html>
