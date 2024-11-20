<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = trim($_POST['cname']);
    
    // Validate input
    if (!empty($cname)) {
        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO CUSTOMER (CNAME) VALUES (?)");
        $stmt->bind_param("s", $cname); 

        if ($stmt->execute()) {
            $message = "<div class='success'>Customer added successfully!</div>";
        } else {
            $message = "<div class='error'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='error'>Please enter a valid name.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Customer</h2>
        <form method="post">
            <label for="cname">Customer Name:</label>
            <input type="text" name="cname" required>
            <input type="submit" value="Add Customer">
        </form>
        <?php if (isset($message)) echo $message; ?>
    </div>
</body>
</html>
