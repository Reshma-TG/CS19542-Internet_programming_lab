<?php
include 'db.php'; // Include the database connection

// Fetch employee details
$result = $conn->query("SELECT * FROM EMPDETAILS");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Employee Details</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Salary</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['EMPID']; ?></td>
                <td><?php echo $row['ENAME']; ?></td>
                <td><?php echo $row['DESIG']; ?></td>
                <td><?php echo $row['DEPT']; ?></td>
                <td><?php echo $row['DOJ']; ?></td>
                <td><?php echo $row['SALARY']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No employee records found.</p>
    <?php endif; ?>

</div>

<div class="footer">
    &copy; 2024 Employee Management System
</div>

</body>
</html>

<?php $conn->close(); ?>
